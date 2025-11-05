<x-admin-app-layout :title="'Row Create'">
    <style>
        .nav-item .active {
            background: rgb(119, 5, 129);
            color: rgb(255, 255, 255) !important;
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="mt-4 border-0 shadow-sm card rounded-3">

                {{-- ===== Header Section ===== --}}
                <div class="p-8 border-0 card-header d-flex justify-content-between align-items-center bg-light">
                    <div>
                        <h4 class="mb-0 fw-bold text-dark">Add New Row</h4>
                    </div>
                    <div>
                        <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-8 border-0">
                            <li class="nav-item me-2 mb-0 bg-light-primary border"
                                style="border: 1px solid rgb(119, 5, 129)">
                                <a class="nav-link active" data-bs-toggle="tab" href="#row-with-image">Row
                                    With Image</a>
                            </li>
                            <li class="nav-item bg-light-primary border" style="border: 1px solid rgb(119, 5, 129)">
                                <a class="nav-link" data-bs-toggle="tab" href="#row-with-list">Row
                                    With List</a>
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('admin.row.index') }}" class="d-flex align-items-center btn btn-light-info fw-semibold">
                        <i class="fa-solid fa-arrow-left me-2"></i> Back to List
                    </a>
                </div>

                {{-- ===== Form Section ===== --}}


                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="row-with-image" role="tabpanel">
                            <form action="{{ route('admin.row.store') }}" class="needs-validation" method="POST"
                                novalidate enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <label for="validationCustom01" class="form-label mb-0">Badge
                                        </label>
                                        <input type="text" class="form-control form-control-solid form-control-solid"
                                            name="badge" value="{{ old('badge') }}" id="validationCustom01"
                                            placeholder="Enter Badge">
                                        <div class="invalid-feedback"> Please Enter Badge
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label for="validationCustom01" class="form-label required mb-0">Row
                                            Image
                                        </label>
                                        <input type="file" class="form-control form-control-solid form-control-solid"
                                            name="image" id="validationCustom01" placeholder="Enter Row Image"
                                            required>
                                        <div class="invalid-feedback"> Please Enter Row
                                            Image </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label for="validationCustom01" class="form-label mb-0">Button
                                            Name
                                        </label>
                                        <input type="text" class="form-control form-control-solid form-control-solid"
                                            name="btn_name" value="{{ old('btn_name') }}" id="validationCustom01"
                                            placeholder="Enter Button Name">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationCustom01" class="form-label required mb-0">Title
                                        </label>
                                        <input type="text" class="form-control form-control-solid form-control-solid"
                                            name="title" value="{{ old('title') }}" id="validationCustom01"
                                            placeholder="Enter Title" required>
                                        <div class="invalid-feedback"> Please Enter Title
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationCustom01" class="form-label mb-0">Link
                                        </label>
                                        <input type="url" class="form-control form-control-solid form-control-solid"
                                            name="link" value="{{ old('link') }}" id="validationCustom01"
                                            placeholder="Enter Row Link">
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="row">
                                            <div class="col-md-12 mb-1">
                                                <label for="validationCustom01" class="form-label required ">Description
                                                </label>
                                                <textarea class="form-control form-control-solid ckeditor" name="description" id="long_desc"
                                                    style=" font-size: 12px; font-weight: 500;" rows="2" cols="60">{!! old('description') !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary rounded-0 from-prevent-multiple-submits"
                                                style="padding: 6px 9px;" id="submitbtn">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="row-with-list" role="tabpanel">
                            <form action="{{ route('admin.row.store') }}" class="needs-validation" method="POST"
                                novalidate enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="validationCustom01" class="form-label ">Badge
                                        </label>
                                        <input type="text"
                                            class="form-control form-control-solid form-control-solid" name="badge"
                                            value="{{ old('badge') }}" id="validationCustom01"
                                            placeholder="Enter Badge">
                                        <div class="invalid-feedback"> Please Enter Badge
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationCustom01" class="form-label required ">Title
                                        </label>
                                        <input type="text"
                                            class="form-control form-control-solid form-control-solid" name="title"
                                            value="{{ old('title') }}" id="validationCustom01"
                                            placeholder="Enter Title" required>
                                        <div class="invalid-feedback"> Please Enter Title
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label for="validationCustom01" class="form-label required ">List
                                            Title
                                        </label>
                                        <input type="text"
                                            class="form-control form-control-solid form-control-solid"
                                            name="list_title" id="validationCustom01" placeholder="Enter Row Link"
                                            required value="{{ old('list_title') }}">
                                        <div class="invalid-feedback"> Please Enter Button
                                            Name
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label for="validationCustom01" class="form-label required ">List One
                                        </label>
                                        <input type="text"
                                            class="form-control form-control-solid form-control-solid" name="list_one"
                                            id="validationCustom01" placeholder="Enter Row Link" required
                                            value="{{ old('list_one') }}">
                                        <div class="invalid-feedback"> Please Enter Button
                                            Name
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label for="validationCustom01" class="form-label required ">List Two
                                        </label>
                                        <input type="text"
                                            class="form-control form-control-solid form-control-solid" name="list_two"
                                            id="validationCustom01" placeholder="Enter Row Link" required
                                            value="{{ old('list_two') }}">
                                        <div class="invalid-feedback"> Please Enter Button
                                            Name
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label for="validationCustom01" class="form-label required ">List
                                            Three
                                        </label>
                                        <input type="text"
                                            class="form-control form-control-solid form-control-solid"
                                            name="list_three" id="validationCustom01" placeholder="Enter Row Link"
                                            required value="{{ old('list_three') }}">
                                        <div class="invalid-feedback"> Please Enter Button
                                            Name
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label for="validationCustom01" class="form-label required ">List Four
                                        </label>
                                        <input type="text"
                                            class="form-control form-control-solid form-control-solid"
                                            name="list_four" id="validationCustom01" placeholder="Enter Row Link"
                                            required value="{{ old('list_four') }}">
                                        <div class="invalid-feedback"> Please Enter Button
                                            Name
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label for="validationCustom01" class="form-label required ">Description
                                        </label>
                                        <textarea class="form-control ckeditor" name="short_des" rows="30" id="common"
                                            style=" font-size: 12px; font-weight: 500;">{!! old('short_des') !!}</textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary rounded-0 from-prevent-multiple-submits"
                                                style="padding: 6px 9px;" id="submitbtn">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
