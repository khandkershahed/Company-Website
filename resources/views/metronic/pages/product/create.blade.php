<x-admin-app-layout :title="'Product Add'">
    <div class="card card-flash">

        <div class="card-header">
            <div class="card-title">Product Add</div>
            <div class="card-toolbar">

                <a href="{{ route('product-sourcing.index') }}" class="btn btn-light-info">

                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                fill="currentColor" />
                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                fill="currentColor" />
                        </svg>
                    </span>

                    Back to the list
                </a>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="row gx-0">

                <div class="col-lg-2">
                    <ul class="nav nav-tabs flex-column border-0" id="myTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1"
                                type="button" role="tab" aria-controls="tab1" aria-selected="true">Basic
                                Information</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2"
                                type="button" role="tab" aria-controls="tab2"
                                aria-selected="false">Descripton</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3"
                                type="button" role="tab" aria-controls="tab3" aria-selected="false">Source
                                Details</button>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-10">
                    <form id="myForm" method="post" action="{{ route('product-sourcing.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content bg-white p-2 mt-0 pt-0" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                                aria-labelledby="tab1-tab">
                                <h6 class="mb-0 text-info">Basic Information</h6>
                                <div class="row mb-3 gx-0 border border-secondary bg-light">
                                    <div class="col-lg-7 p-2">
                                        <div class="row mb-2">
                                            <div class="col-lg-6 col-sm-12">
                                                <label for="product_name" class="form-label mb-0">Product
                                                    Name <span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="name" id="product_name" cols="350" rows="1"
                                                    style=" font-size: 12px; font-weight: 600;" placeholder="Product Name" required></textarea>
                                            </div>
                                            <div class="col-lg-3 col-sm-12">
                                                <label for="sku_code" class="form-label mb-0">SKU Code <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="sku_code"
                                                    class="form-control form-control-sm" id="sku_code"
                                                    placeholder="Enter SKU Code"
                                                    style=" font-size: 12px; font-weight: 500;" required>
                                            </div>
                                            <div class="col-lg-3 col-sm-12">
                                                <label for="mf_code" class="form-label mb-0">Manufacturing
                                                    Code</label>
                                                <input type="text" name="mf_code"
                                                    class="form-control form-control-sm" id="mf_code"
                                                    placeholder="Manufacturing Code"
                                                    style=" font-size: 12px; font-weight: 500;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-3">
                                                <label for="tags" class="form-label mb-0">Product Tags</label>
                                                <input type="text" name="tags"
                                                    class="form-control form-control-sm visually-hidden"
                                                    data-role="tagsinput" placeholder="Product Tags">
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="size" class="form-label mb-0">Product
                                                    Sizes</label>
                                                <input type="text" name="size"
                                                    class="form-control form-control-sm visually-hidden"
                                                    data-role="tagsinput" placeholder="Product Sizes">
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="color" class="form-label mb-0">Product
                                                    Colors</label>
                                                <input type="text" name="color"
                                                    class="form-control form-control-sm visually-hidden"
                                                    data-role="tagsinput" placeholder="Product Color">
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="product_code" class="form-label mb-0">Product
                                                    Code</label>
                                                <input type="text" name="product_code"
                                                    class="form-control form-control-sm" id="product_code"
                                                    placeholder="product code">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-3">
                                                <label for="weight" class="form-label mb-0">Weight (KG)</label>
                                                <input type="text" name="weight"
                                                    class="form-control form-control-sm" id="weight"
                                                    placeholder="0.1kg,0.5kg,1kg,2kg">
                                            </div>
                                            <div class="form-group col-lg-3 basic-form">
                                                <label for="product_type" class="form-label mb-0">Product
                                                    Type <span class="text-danger">*</span></label>
                                                <select name="product_type" data-allow-clear="true"
                                                    data-placeholder="Select Product Type.." id="product_type"
                                                    class="form-control select" required>
                                                    <option></option>
                                                    <option class="form-control" value="hardware">
                                                        Hardware</option>
                                                    <option class="form-control" value="software">
                                                        Software</option>
                                                    <option class="form-control" value="training">
                                                        Training</option>
                                                    <option class="form-control" value="book">
                                                        Book</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group basic-form">
                                                            <label class="form-label mb-0">Stock <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-control select stock_select"
                                                                name="stock"
                                                                data-placeholder="Select Stock Option..." required>
                                                                <option></option>
                                                                <option class="form-select" value="available">
                                                                    Available
                                                                </option>
                                                                <option class="form-select" value="limited">
                                                                    Limited</option>
                                                                <option class="form-select" value="unlimited">
                                                                    UnLimited</option>
                                                                <option class="form-select" value="stock_out">
                                                                    Out of Stock</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 qty_display d-none">
                                                        <label for="qty" class="form-label mb-0">Quantity</label>
                                                        <input type="text" name="qty"
                                                            class="form-control form-control-sm qty_required"
                                                            id="qty" placeholder="Quantity(10,50,100,200,500)">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-4">
                                                <div class="form-check">
                                                    <label class="form-check-label checkbox_label"
                                                        for="refurbished">Refurbished</label>
                                                    <input class="form-check-input" name="refurbished"
                                                        type="checkbox" value="1" id="refurbished">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check">
                                                    <label class="form-check-label checkbox_label" for="dealId">
                                                        Deals</label>
                                                    <input class="form-check-input" type="checkbox" id="dealId">
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-4" id="dealExpand" style="display:none">
                                                <input type="text" name="deal"
                                                    class="form-control form-control-sm" placeholder="Enter Deals"
                                                    style=" font-size: 12px; font-weight: 500;">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="form-group col-lg-5">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="d-flex align-items-center thumbnail"
                                                            style="cursor:pointer" onclick="$('#formFile').click()">
                                                            <p class="p-0 m-0">Main Thumbnail <span
                                                                    class="text-danger">*</span>
                                                            </p>
                                                            <div class="text-success ms-2" style="margin-top: -3px;">
                                                                <i class="ph ph-plus-circle"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row">
                                                        <input class="form-control form-control-sm" name="thumbnail"
                                                            type="file" id="formFile" multiple=""
                                                            style="display:none" onChange="mainThamUrl(this)"
                                                            required>
                                                        <img class="mt-1 bg-light p-1" src=""
                                                            id="mainThmb" />
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group col-lg-7">
                                                <div class="row ">
                                                    <div class="col-lg-12">
                                                        <div class="d-flex flex-row" style="cursor:pointer"
                                                            onclick="$('#multiImg').click()">
                                                            <div>Multiple Images</div>
                                                            <div class="text-success ms-2" style="margin-top: -3px;">
                                                                <i class="ph ph-plus-circle"></i>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row">
                                                            <input class="form-control form-control-sm"
                                                                name="multi_img[]" type="file" id="multiImg"
                                                                multiple="" style="display:none">
                                                            <div class="col" id="preview_img"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 p-2">
                                        <div class="row mb-2">
                                            <div class="form-group col-md-6 basic-form">
                                                <label for="weight" class="form-label mb-0">Notification
                                                    Day <span class="text-danger">*</span></label>
                                                <input class="form-control form-control-sm allow_decimal"
                                                    type="text" name="notification_days"
                                                    placeholder="Notification Day" required>
                                            </div>
                                            <div class="form-group col-md-6 basic-form">
                                                <label for="weight" class="form-label mb-0">Brand</label>
                                                <select class="form-control select" name="brand_id"
                                                    data-placeholder="Select Brand...">
                                                    <option></option>
                                                    @foreach ($brands as $brand)
                                                        <option class="form-control select"
                                                            value="{{ $brand->id }}">
                                                            {{ $brand->title }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="form-group col-md-6 basic-form">
                                                <label for="weight" class="form-label mb-0">Category <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select" name="cat_id"
                                                    data-placeholder="Select Category..." required>
                                                    <option></option>
                                                    @foreach ($categories as $cat)
                                                        <option class="form-control" value="{{ $cat->id }}">
                                                            {{ $cat->title }}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group col-md-6 basic-form">
                                                <label for="weight" class="form-label mb-0">Sub Category</label>
                                                <select class="form-control select" name="sub_cat_id"
                                                    data-placeholder="Select Sub Category..." data-allow-clear="true">
                                                    <option></option>
                                                    @foreach ($sub_cats as $item)
                                                        <option class="form-control" value="{{ $item->id }}">
                                                            {{ $item->title }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="form-group col-md-6 basic-form">
                                                <label for="weight" class="form-label mb-0">Sub Sub
                                                    Category</label>
                                                <select name="sub_sub_cat_id" class="form-control select"
                                                    data-placeholder="Select Sub Sub Category..."
                                                    data-allow-clear="true">
                                                    <option></option>
                                                    @foreach ($sub_sub_cats as $item)
                                                        <option class="form-control" value="{{ $item->id }}">
                                                            {{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 basic-form">
                                                <label for="weight" class="form-label mb-0">Sub Sub Sub
                                                    Category</label>
                                                <select name="sub_sub_sub_cat_id" class="form-control select"
                                                    id="inputCollection"
                                                    data-placeholder="Select Sub Sub Sub Category...">
                                                    <option></option>
                                                    @foreach ($sub_sub_sub_cats as $item)
                                                        <option class="form-control" value="{{ $item->id }}">
                                                            {{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="form-group col-md-6 basic-form">
                                                <label for="solution_id" class="form-label mb-0">Solution <span
                                                        class="text-danger">*</span></label>
                                                <select name="solution_id[]" data-control="select2"
                                                    data-allow-clear="true" data-enable-filtering="true"
                                                    class="form-select form-select-sm solution_multiselect"
                                                    id="solution_id" multiple data-placeholder="Select Solutions"
                                                    data-include-select-all-option="true" required>
                                                    <option></option>
                                                    @foreach ($solutions as $solutionDetail)
                                                        <option value="{{ $solutionDetail->id }}">
                                                            {{ $solutionDetail->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 basic-form">
                                                <label for="industry_id" class="form-label mb-0">Industry <span
                                                        class="text-danger">*</span></label>
                                                <select name="industry_id[]" data-control="select2"
                                                    data-allow-clear="true" data-enable-filtering="true"
                                                    class="form-select form-select-sm industry_multiselect"
                                                    id="industry_id" multiple data-placeholder="Select Industries"
                                                    data-include-select-all-option="true" required>
                                                    <option></option>
                                                    @foreach ($industrys as $industrie)
                                                        <option value="{{ $industrie->id }}">
                                                            {{ $industrie->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-lg-12">
                                                <div class="mb-1">
                                                    <label for="weight" class="form-label mb-0">Product
                                                        Warranty</label>
                                                    <textarea class="form-control" name="warranty" rows="2" style=" font-size: 12px; font-weight: 500;"
                                                        placeholder="Product Warrenty"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-end">
                                        <button type="submit" class="btn btn-success" name="action" id="submitbtn"
                                            value="save">Save<i class="ph-paper-plane-tilt "></i></button>
                                        <a href="javascript:void(0);" class="btn btn-info rounded-0 p-2 px-2"
                                            id="nextTabButton">Next
                                            <i class="ph-arrow-circle-right "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                <h6 class="ms-1 mb-0 text-info">Product Description</h6>
                                <div class="row mb-3 gx-0 border border-secondary bg-light p-2">
                                    <div class="mb-1 row px-0 gx-1">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <textarea name="short_desc" class="form-control" id="short_desc" rows="3"
                                                    style=" font-size: 12px; font-weight: 500;"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-2">
                                                <textarea class="form-control" name="overview" id="overview" style=" font-size: 12px; font-weight: 500;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-1 px-0">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-2">
                                                <textarea class="form-control" name="specification" id="specification" style=" font-size: 12px; font-weight: 500;"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-2">
                                                <textarea class="form-control" name="accessories" id="accessories" style=" font-size: 12px; font-weight: 500;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-end">
                                        <button type="submit" class="btn btn-success" name="action" id="submitbtn"
                                            value="save">Save<i class="ph-paper-plane-tilt"></i></button>
                                        <a href="javascript:void(0);" class="btn btn-info rounded-0 p-2 px-2"
                                            id="nextTabButton2">Next
                                            <i class="ph-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                {{-- <h5>Tab 3 Content</h5> --}}
                                <h6 class="ms-1 mb-0 text-info">Source Details</h6>
                                <div class="row mb-3 gx-0 border border-secondary p-2 mx-2">
                                    <div class="card-body m-1 p-1">
                                        <div class="row px-2 mb-3">
                                            {{-- <div class="col-lg-2">
                                                    <h6 class="mb-0">Price Status :</h6>
                                                </div> --}}
                                            <div class="col-lg-3 col-sm-6">
                                                <label class="ms-1" for="price_status">Price Status <span
                                                        class="text-danger">*</span></label>
                                                <select name="price_status" id="price_status"
                                                    data-placeholder="Select Product Price Status"
                                                    class="form-control select price_select" required>
                                                    <option></option>
                                                    <option class="form-control" value="rfq">
                                                        Rfq</option>
                                                    <option class="form-control" value="price">
                                                        Price</option>
                                                    <option class="form-control" value="offer_price">
                                                        Offer price</option>

                                                </select>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="rfq_price d-none">
                                                    <label class="ms-1" for="price_status">SAS Price <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control form-control-sm" type="text"
                                                        name="sas_price" placeholder="RFQ Price for Sas">
                                                </div>
                                                <div class="price d-none">
                                                    <label class="ms-1" for="price_status">SAS Price <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control form-control-sm" type="text"
                                                        name="sas_price" placeholder="Price for Sas">
                                                </div>
                                                <div class="offer_price d-none">
                                                    <label class="ms-1" for="price_status">SAS Price <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control form-control-sm" type="text"
                                                        name="sas_price" placeholder="Starting Price for Sas">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3 px-2 mb-3">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th width="15%">Source Name</th>
                                                                <th width="15%">Source Link</th>
                                                                <th width="10%">Price</th>
                                                                <th width="12%">Estimate Time</th>
                                                                <th width="12%">principal Time</th>
                                                                <th width="12%">Shipping Time</th>
                                                                <th width="8%">Location</th>
                                                                <th width="8%">Country</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input class="form-control form-control-sm"
                                                                        type="text" name="source_one_name"
                                                                        id="">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control form-control-sm"
                                                                        type="text" name="source_one_link"
                                                                        id="" maxlength="255">
                                                                </td>
                                                                <td>
                                                                    <input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_one_price"
                                                                        id="">
                                                                </td>

                                                                <td>
                                                                    <input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_one_estimate_time"
                                                                        id="">
                                                                </td>
                                                                <td>
                                                                    <input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text"
                                                                        name="source_one_principal_time"
                                                                        id="">
                                                                </td>
                                                                <td>
                                                                    <input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_one_shipping_time"
                                                                        id="">
                                                                </td>
                                                                <td>
                                                                    <input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_one_location"
                                                                        id="">
                                                                </td>
                                                                <td>
                                                                    <input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_one_country"
                                                                        id="">
                                                                </td>
                                                                {{-- <td class="text-center">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="source_approval" value="one">
                                                                    </td> --}}
                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control form-control-sm"
                                                                        type="text" name="source_two_name"
                                                                        id=""></td>
                                                                <td><input class="form-control form-control-sm"
                                                                        type="text" name="source_two_link"
                                                                        id="" maxlength="255">
                                                                </td>
                                                                <td><input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_two_price"
                                                                        id="">
                                                                </td>
                                                                <td><input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text"
                                                                        name=" source_two_estimate_time"
                                                                        id=""></td>
                                                                <td><input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text"
                                                                        name="source_two_principal_time"
                                                                        id=""></td>
                                                                <td><input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_two_shipping_time"
                                                                        id=""></td>
                                                                <td><input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_two_location"
                                                                        id="">
                                                                </td>
                                                                <td><input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_two_country"
                                                                        id="">
                                                                </td>
                                                                {{-- <td class="text-center"><input class="form-check-input"
                                                                            type="checkbox" name="source_approval" value="two"></td> --}}
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3 px-2 mb-3 gx-1">
                                            <div class="col-lg-4 col-sm-12">
                                                <div class="table-responsive">
                                                    <table class=" datatable table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th width="35%" style="font-size: 12px;">
                                                                    Competetor
                                                                    Name
                                                                </th>
                                                                <th width="35%" style="font-size: 12px;">
                                                                    Competetor
                                                                    Link
                                                                </th>
                                                                <th width="30%" style="font-size: 12px;">Price
                                                                </th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input class="form-control form-control-sm"
                                                                        type="text" name="competetor_one_name">
                                                                </td>
                                                                <td><input class="form-control form-control-sm"
                                                                        type="text" name="competetor_one_link"
                                                                        maxlength="255">
                                                                </td>
                                                                <td><input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="competetor_one_price">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control form-control-sm"
                                                                        type="text" name="competetor_two_name">
                                                                </td>
                                                                <td><input class="form-control form-control-sm"
                                                                        type="text" name="competetor_two_link"
                                                                        maxlength="255">
                                                                </td>
                                                                <td><input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="competetor_two_price">
                                                                </td>

                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-12">
                                                <div class="card shadow-none">
                                                    <div class="card-body border">
                                                        <div class="col-sm-12">
                                                            <h6 class="mb-0 text-info"> Source Contact Details</h6>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <textarea name="source_contact" id="" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th style="font-size: 12px;">
                                                                    Details
                                                                </th>
                                                                <th style="font-size: 12px;">
                                                                    Status
                                                                </th>
                                                                <th style="font-size: 12px;">Status
                                                                </th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Is this solid source? ( Y/N )
                                                                </td>
                                                                <td><input class="margin-right:0.5rem" type="radio"
                                                                        name="solid_source" value="yes"
                                                                        id="">&nbsp; Yes
                                                                </td>
                                                                <td><input class="margin-right:0.5rem" type="radio"
                                                                        name="solid_source" value="no"
                                                                        id="">&nbsp; No
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Is this direct Principal ? ( Y/N
                                                                    )
                                                                </td>
                                                                <td><input class="margin-right:0.5rem" type="radio"
                                                                        name="direct_principal" value="yes"
                                                                        id="">&nbsp;
                                                                    Yes
                                                                </td>
                                                                <td><input class="margin-right:0.5rem" type="radio"
                                                                        name="direct_principal" value="no"
                                                                        id="">&nbsp;
                                                                    No
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Does it have Agreement ? ( Y/N )
                                                                </td>
                                                                <td><input class="margin-right:0.5rem" type="radio"
                                                                        name="agreement" value="yes"
                                                                        id="">&nbsp; Yes
                                                                </td>
                                                                <td><input class="margin-right:0.5rem" type="radio"
                                                                        name="agreement" value="no"
                                                                        id="">&nbsp; No</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="66%">Source Type :</td>
                                                                <td width="34%" colspan="2">
                                                                    <select name="source_type"
                                                                        data-placeholder="Select Source Type.."
                                                                        class="form-control select">
                                                                        <option></option>
                                                                        <option class="form-control"
                                                                            value="principal">
                                                                            Principal</option>
                                                                        <option class="form-control"
                                                                            value="distributor">
                                                                            Distributor</option>
                                                                        <option class="form-control" value="supplier">
                                                                            Supplier</option>
                                                                        <option class="form-control" value="retailer">
                                                                            Retailer</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </tbody>

                                                    </table>

                                                </div>
                                            </div>


                                        </div>
                                        <div class="row mt-2 mb-3 text-end">
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-8">

                                                <button type="submit" class="btn btn-success save_btn"
                                                    name="action" value="save">Save<i
                                                        class="ph-paper-plane-tilt mx-2"></i></button>

                                                <button type="submit" class="btn btn-primary save_btn"
                                                    name="action" id="submitbtn" value="approval">Send For
                                                    SAS<i class="ph-paper-plane-tilt mx-2"></i></button>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            function mainThamUrl(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#mainThmb').attr('src', e.target.result).width(60).height(40);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>


        <script>
            $(document).ready(function() {
                $('#multiImg').on('change', function() { //on file input change
                    if (window.File && window.FileReader && window.FileList && window
                        .Blob) //check File API supported browser
                    {
                        var data = $(this)[0].files; //this file data

                        $.each(data, function(index, file) { //loop though each file
                            if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                                    .type)) { //check supported file type
                                var fRead = new FileReader(); //new filereader
                                fRead.onload = (function(file) { //trigger function on successful read
                                    return function(e) {
                                        var img = $('<img/>').addClass('thumb').attr('src',
                                                e.target.result).width(70)
                                            .height(50); //create image element
                                        $('#preview_img').append(
                                            img); //append image to output element
                                    };
                                })(file);
                                fRead.readAsDataURL(file); //URL representing the file's data.
                            }
                        });

                    } else {
                        alert("Your browser doesn't support File API!"); //if File API is absent
                    }
                });
            });
        </script>

        <script>
            //---------Sidebar list Show Hide----------

            $(document).ready(function() {

                $('#dealId').click(function() {
                    $("#dealExpand").toggle(this.checked);
                });

                $('#rfqId').click(function() {

                    $("#rfqExpand").toggle('slow');

                });


            });
        </script>
        <script>
            $(document).ready(function() {
                var isValid = true;
                $('#nextTabButton').on('click', function(event) {
                    var nameField = $('#product_name');
                    var sku_codeField = $('input[name="sku_code"]');
                    var notification_daysField = $('input[name="notification_days"]');
                    var product_typeField = $('select[name="product_type"]');
                    var stockField = $('.stock_select');
                    var thumbnailField = $('input[name="thumbnail"]');
                    // var brandField = $('[name="brand_id"]');
                    var cat_idField = $('[name="cat_id"]');
                    var solution_idField = $('.solution_multiselect');
                    var industry_idField = $('.industry_multiselect');
                    isValid = true;

                    if (nameField.val() === '') {
                        isValid = false;
                        nameField.css("border", "1px solid red");
                    }

                    if (sku_codeField.val() === '') {
                        isValid = false;
                        sku_codeField.css("border", "1px solid red");
                    }

                    if (notification_daysField.val() === '') {
                        isValid = false;
                        notification_daysField.css("border", "1px solid red");
                    }

                    if (product_typeField.val() === '') {
                        isValid = false;
                        product_typeField.next('.select2-container').css("border", "1px solid red");
                    }

                    if (stockField.val() === '') {
                        isValid = false;
                        stockField.next('.select2-container').css("border", "1px solid red");
                    }

                    if (thumbnailField.val() === '') {
                        isValid = false;
                        $('.thumbnail').css("border", "1px solid red");
                    }

                    // if (brandField.val() === '') {
                    //     isValid = false;
                    //     brandField.next('.select2-container').css("border", "1px solid red");
                    // }

                    if (cat_idField.val() === '') {
                        isValid = false;
                        cat_idField.next('.select2-container').css("border", "1px solid red");
                    }


                    if (solution_idField.val() == '') {
                        alert('Please Fill the solution select Box');
                        isValid = false;
                        solution_idField.next('.dropdown').css("border", "1px solid red !important");
                    }

                    if (industry_idField.val() == '') {
                        alert('Please Fill the Industry select Box');
                        isValid = false;
                        industry_idField.next('.dropdown').css("border", "1px solid red !important");
                    }
                    if (!isValid) {
                        event.preventDefault();
                        return;
                    }
                    const tab2Button = $('#tab2-tab');
                    tab2Button.addClass('active').attr('aria-selected', 'true');

                    // Show Tab 2's content
                    const tab2Content = $('#tab2');
                    tab2Content.addClass('active show');

                    // Deactivate Tab 1
                    const tab1Button = $('#tab1-tab');
                    tab1Button.removeClass('active').attr('aria-selected', 'false');

                    // Hide Tab 1's content
                    const tab1Content = $('#tab1');
                    tab1Content.removeClass('active show');
                });

                $(".save_btn").click(function() {
                    var price_selectField = $('.price_select');
                    isValid = true;
                    if (price_selectField.val() == '') {
                        isValid = false;
                        price_selectField.next('.select2-container').css("border", "1px solid red");
                    }
                    if (!isValid) {
                        event.preventDefault();
                        return;
                    }
                });



                // Get the next tab button for Tab 1
                // $('#nextTabButton').click(function() {
                //     if (!isValid) {
                //         event.preventDefault();
                //         return;
                //     }
                //     // Activate Tab 2

                // });

                $('#nextTabButton2').click(function() {
                    // Activate Tab 3
                    const tab3Button = $('#tab3-tab');
                    tab3Button.addClass('active').attr('aria-selected', 'true');

                    // Show Tab 3's content
                    const tab3Content = $('#tab3');
                    tab3Content.addClass('active show');

                    // Deactivate Tab 2
                    const tab2Button = $('#tab2-tab');
                    tab2Button.removeClass('active').attr('aria-selected', 'false');

                    // Hide Tab 2's content
                    const tab2Content = $('#tab2');
                    tab2Content.removeClass('active show');
                });
            });
        </script>
        <script>
            $('.stock_select').on('change', function() {

                var stock_value = $(this).find(":selected").val();

                if (stock_value == 'available') {
                    $(".qty_display").removeClass("d-none");
                    $(".qty_required").prop('required', true);
                } else if (stock_value == 'limited') {
                    $(".qty_display").removeClass("d-none");
                    $(".qty_required").prop('required', true);
                } else {
                    $(".qty_display").addClass("d-none");
                    $(".qty_required").prop('required', false);
                }

            });

            $('.price_select').on('change', function() {

                var price_value = $(this).find(":selected").val();
                if (price_value == 'rfq') {
                    // alert(price_value);
                    $(".rfq_price").removeClass("d-none");
                    $(".offer_price").addClass("d-none");
                    $(".price").addClass("d-none");
                } else if (price_value == 'offer_price') {
                    $(".offer_price").removeClass("d-none");
                    $(".rfq_price").addClass("d-none");
                    $(".price").addClass("d-none");
                } else {
                    $(".price").removeClass("d-none");
                    $(".offer_price").addClass("d-none");
                    $(".rfq_price").addClass("d-none");
                }

            });
        </script>
    @endpush
</x-admin-app-layout>
