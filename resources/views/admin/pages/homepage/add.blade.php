@extends('admin.master')
@section('content')
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content pt-2 w-75 mx-auto">
            <div class="text-start">
                <div class="d-flex align-items-center justify-content-start main_bg py-1 rounded-1">
                    <div class="ms-2">
                        <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                            href="{{ route('homepage.index') }}">
                            <i class="fa-solid fa-arrow-left main_color"></i>
                        </a>
                    </div>
                    <div class="me-2" style="margin-left: 17rem;">
                        <p class="text-white p-0 m-0 fw-bold">Home Page Builder</p>
                    </div>
                    <div style="margin-left: 14rem;">
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
            <form action="{{ route('homepage.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <!--Banner Section-->
                    <div class="container">
                        <div class="row g-2 p-1">
                            <div class="col">
                                <span class="mt-1 fw-bold text-info">Banner One Section</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Image One</label>
                                        <div class="d-flex">
                                            <div class="" style="width: 70%">
                                                <input name="branner1" id="image" accept="image/*" type="file"
                                                    class="form-control form-control-sm"
                                                    placeholder="Enter Banner Image One">
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
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Title One</label>
                                        <div class="input-group">
                                            <input name="banner1_title" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Banner Title One"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">One
                                            ShortDescription</label>
                                        <div class="input-group">
                                            <input name="banner1_short_description" type="text"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Banner One ShortDescription" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            One Button Name</label>
                                        <div class="input-group">
                                            <input name="banner1_button_name" type="text" maxlength="255"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Banner One Button Name" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            One Button Link</label>
                                        <div class="input-group">
                                            <input name="banner1_button_link" maxlength="255" type="url"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Banner One Button Name" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>

                                <span class="mt-1 fw-bold text-info">Banner Two Section</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Image Two</label>
                                        <div class="d-flex">
                                            <div class="" style="width: 70%">
                                                <input name="branner2" id="image" accept="image/*" type="file"
                                                    class="form-control form-control-sm"
                                                    placeholder="Enter Banner Image Two">
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
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Title Two</label>
                                        <div class="input-group">
                                            <input name="banner2_title" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Banner Title Two"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Two
                                            ShortDescription</label>
                                        <div class="input-group">
                                            <input name="banner2_short_description" type="text"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Banner Two ShortDescription" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Two Button Name</label>
                                        <div class="input-group">
                                            <input name="banner2_button_name" type="text" maxlength="255"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Banner Two Button Name" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Two Button Link</label>
                                        <div class="input-group">
                                            <input name="banner2_button_link" maxlength="255" type="url"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Banner Two Button Name" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>

                                <span class="mt-1 fw-bold text-info">Banner Three Section</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Image Three</label>
                                        <div class="d-flex">
                                            <div class="" style="width: 70%">
                                                <input name="branner3" id="image" accept="image/*" type="file"
                                                    class="form-control form-control-sm"
                                                    placeholder="Enter Banner Image Three">
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
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Title Three</label>
                                        <div class="input-group">
                                            <input name="banner3_title" maxlength="255" type="text"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Banner Title Three" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Three
                                            ShortDescription</label>
                                        <div class="input-group">
                                            <input name="banner3_short_description" type="text"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Banner Three ShortDescription" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Three Button Name</label>
                                        <div class="input-group">
                                            <input name="banner3_button_name" type="text" maxlength="255"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Banner Three Button Name" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Three Button Link</label>
                                        <div class="input-group">
                                            <input name="banner3_button_link" maxlength="255" type="url"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Banner Three Button Name" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>


                            </div>
                            <div class="col">
                                <span class="mt-1 fw-bold text-info">Client Success Row</span>
                                <div class="px-2 py-2 rounded bg-light d-flex align-items-center mt-1">
                                    <div class=" pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Client
                                            Success One</label>
                                        <div class="input-group" style="width: 130px;">
                                            <select name="success1_id" class="form-control form-control-sm select"
                                                id="select10">
                                                <option>Choose Client Success One</option>
                                                @foreach ($techglossys as $item)
                                                    <option class="form-control" value="{{ $item->id }}">
                                                        {{ $item->badge }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Client
                                            Success Two</label>
                                        <div class="input-group" style="width: 130px;">
                                            <select name="success2_id" class="form-control form-control-sm select"
                                                id="select11">
                                                <option>Choose Client Success Two</option>
                                                @foreach ($techglossys as $item)
                                                    <option class="form-control" value="{{ $item->id }}">
                                                        {{ $item->badge }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Client
                                            Success Three</label>
                                        <div class="input-group" style="width: 130px;">
                                            <select name="success3_id" class="form-control form-control-sm select"
                                                id="select12">
                                                <option>Choose Client Success Three</option>
                                                @foreach ($techglossys as $item)
                                                    <option class="form-control" value="{{ $item->id }}">
                                                        {{ $item->badge }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <span class="mt-1 fw-bold text-info">Double Button One Section</span>
                                <div class="px-2 py-2 rounded bg-light mb-2">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Button
                                            One Title </label>
                                        <div class="input-group">
                                            <input name="btn1_title" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Button One Title"
                                                required>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Button
                                            One Name </label>
                                        <div class="input-group">
                                            <input name="btn1_name" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Button One Name"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Button
                                            One Link </label>
                                        <div class="input-group">
                                            <input name="btn1_link" maxlength="255" type="url"
                                                class="form-control form-control-sm" placeholder="Enter Button One Link"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <span class="mt-1 fw-bold text-info">Double Button Two Section</span>
                                <div class="px-2 py-2 rounded bg-light mb-2">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Button
                                            Two Title </label>
                                        <div class="input-group">
                                            <input name="btn2_title" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Button Two Title"
                                                required>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Button
                                            Two Name </label>
                                        <div class="input-group">
                                            <input name="btn2_name" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Button Two Name"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Button
                                            Two Link </label>
                                        <div class="input-group">
                                            <input name="btn2_link" maxlength="255" type="url"
                                                class="form-control form-control-sm" placeholder="Enter Button Two Link"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <span class="mt-1 fw-bold text-info">Features Section</span>
                                <div class="px-2 py-2 rounded bg-light d-flex align-items-center mt-1">
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-6 col-sm-12">
                                            <label>Header 1 <span class="text-danger">*</span></label>
                                            <input type="text" name="header1" class="form-control form-control-sm"
                                                placeholder="Write Something..." required>
                                        </div>

                                        <div class="form-group col-lg-12 col-md-6 col-sm-12">
                                            <label>Header 2 <span class="text-danger">*</span></label>
                                            <input type="text" name="header2" class="form-control form-control-sm"
                                                placeholder="Write Something..." required>
                                        </div>

                                    </div>

                                </div>
                                <div class="px-2 py-2 rounded bg-light mb-2">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Feature
                                            One</label>
                                        <div class="input-group">
                                            <select name="story1_id" class="form-control form-control-sm select"
                                                id="select1" placeholder="Choose iTEM">
                                                <option>Choose Features One</option>
                                                @foreach ($client_experiences as $item)
                                                    <option class="col-8" value="{{ $item->id }}">
                                                        {{ $item->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Feature
                                            Two</label>
                                        <div class="input-group">
                                            <select name="story2_id" class="form-control form-control-sm select"
                                                id="select2">
                                                <option>Choose Features Two</option>
                                                @foreach ($client_experiences as $item)
                                                    <option class="col-8" value="{{ $item->id }}">
                                                        {{ $item->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Feature
                                            Three</label>
                                        <div class="input-group">
                                            <select name="story3_id" class="form-control form-control-sm select"
                                                id="select3">
                                                <option>Choose Features Three</option>
                                                @foreach ($client_experiences as $item)
                                                    <option class="col-8" value="{{ $item->id }}">
                                                        {{ $item->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Feature
                                            Four</label>
                                        <div class="input-group">
                                            <select name="story4_id" class="form-control form-control-sm select"
                                                id="select4">
                                                <option>Choose Features Four</option>
                                                @foreach ($client_experiences as $item)
                                                    <option class="col-8" value="{{ $item->id }}">
                                                        {{ $item->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Feature
                                            Five</label>
                                        <div class="input-group">
                                            <select name="story5_id" class="form-control form-control-sm select"
                                                id="select5">
                                                <option>Choose Features Five</option>
                                                @foreach ($client_experiences as $item)
                                                    <option class="col-8" value="{{ $item->id }}">
                                                        {{ $item->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <span class="mt-1 fw-bold text-info">Client Stories Row</span>
                                <div class="px-2 py-2 rounded bg-light mb-1">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Client
                                            Story One</label>
                                        <div class="input-group">
                                            <select name="solution1_id" class="form-control form-control-sm select"
                                                id="select">
                                                <option>Choose Client Story One</option>
                                                @foreach ($storys as $item)
                                                    <option class="col-8" value="{{ $item->id }}">
                                                        {{ $item->badge }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Client
                                            Story Two</label>
                                        <div class="input-group">
                                            <select name="solution2_id" class="form-control form-control-sm select"
                                                id="select7">
                                                <option>Choose Client Story Two</option>
                                                @foreach ($storys as $item)
                                                    <option class="col-8" value="{{ $item->id }}">
                                                        {{ $item->badge }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Client
                                            Story Three</label>
                                        <div class="input-group">
                                            <select name="solution3_id" class="form-control form-control-sm select"
                                                id="select8">
                                                <option>Choose Client Story Three</option>
                                                @foreach ($storys as $item)
                                                    <option class="col-8" value="{{ $item->id }}">
                                                        {{ $item->badge }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Client
                                            Story Four</label>
                                        <div class="input-group">
                                            <select name="solution4_id" class="form-control form-control-sm select"
                                                id="select9">
                                                <option>Choose Client Story Four</option>
                                                @foreach ($storys as $item)
                                                    <option class="col-8" value="{{ $item->id }}">
                                                        {{ $item->badge }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <span class="mt-1 fw-bold text-info">Single Tech Glosy Row</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Sigle
                                            Tech Glossy</label>
                                        <div class="input-group">
                                            <select name="techglossy_id" class="form-control form-control-sm select">
                                                <option>Choose Sigle Tech Glossy</option>
                                                @foreach ($techglossys as $item)
                                                    <option class="form-control" value="{{ $item->id }}">
                                                        {{ $item->badge }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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

    </div>
@endsection
