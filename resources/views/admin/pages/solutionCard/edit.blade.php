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
                        <a href="{{ route('solutionCard.index') }}" class="breadcrumb-item">Solution Card Management</a>
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
        <div class="content pt-5 w-50 mx-auto">
            <div class="text-start">
                <div class="d-flex align-items-center justify-content-start main_bg py-1">
                    <div class="ms-2">
                        <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                            href="{{ route('solutionCard.index') }}">
                            <i class="fa-solid fa-arrow-left main_color"></i>
                        </a>
                    </div>
                    <div class="me-2 text-center" style="margin-left: 13rem;">
                        <p class="text-white p-0 m-0 fw-bold text-center"> Add Solution Card Details </p>
                    </div>
                </div>
            </div>
            <form method="post" action="{{ route('solutionCard.update', $solutionCard->id) }}"
                enctype="multipart/form-data" id="myform">
                @csrf
                @method('PUT')
                <div class="card">
                    <!--Banner Section-->
                    <div class="container">
                        <div class="row g-2 p-1">
                            <div class="col">

                                <div class="px-2 py-2 rounded bg-light">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Card
                                            Title</label>
                                        <div class="input-group">
                                            <input name="title" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Solution Card Title"
                                                value="{{ $solutionCard->title }}" required>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Solution
                                            Card Image</label>
                                        <div class="d-flex">
                                            <div class="" style="width: 90%">
                                                <input name="image" id="image" accept="image/*" type="file"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Solution Card Image">
                                            </div>
                                                <div class=" ms-2" style="width: 10%">
                                                    {{-- <img id="showImage" src="{{ asset('storage/' . $solutionCard->image) }}"
                                                        alt="" height="87px" width="157px"> --}}
                                                    <img class="img-fluid rounded-circle" id="showImage" src="https://t4.ftcdn.net/jpg/03/17/25/45/360_F_317254576_lKDALRrvGoBr7gQSa1k4kJBx7O2D15dc.jpg"
                                                        alt="" style="width: 30px;
                                                        height: 30px; margin-left: 2.5rem;">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Short
                                            Description</label>
                                        <div class="input-group">
                                            <textarea class="form-control" name="short_des" rows="5"
                                                placeholder="Enter Solution Short Description" required>{{ $solutionCard->short_des }}</textarea>
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
        <!-- /inner content -->

    </div>
@endsection
