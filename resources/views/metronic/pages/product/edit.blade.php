<x-admin-app-layout :title="'Product Edit'">
    <div class="card card-flash">

        <div class="card-header">
            <div class="card-title">Product Edit</div>
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
                    <ul class="nav nav-tabs flex-column" id="myTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1"
                                type="button" role="tab" aria-controls="tab1" aria-selected="true">Basic
                                Information</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2"
                                type="button" role="tab" aria-controls="tab2" aria-selected="false">Image
                                Section</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3"
                                type="button" role="tab" aria-controls="tab3"
                                aria-selected="false">Descripton</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4"
                                type="button" role="tab" aria-controls="tab4" aria-selected="false">Source
                                Details</button>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-10">
                    <form id="myForm" method="post" action="{{ route('product-sourcing.update', $products->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="tab-content bg-white p-2 pt-0" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                                aria-labelledby="tab1-tab">
                                <h6 class="mb-0 text-info">Basic Information</h6>
                                <div class="row mb-3 gx-0 border border-secondary bg-light">
                                    <div class="col-lg-7 p-2">
                                        <div class="row mb-2">
                                            <div class="col-lg-6 col-sm-12">
                                                <label for="product_name" class="form-label mb-0">Product Name <span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control" name="name" id="product_name" cols="350" rows="1"
                                                    style="font-size: 12px; font-weight: 600;" placeholder="Product Name" required>{!! $products->name !!}</textarea>
                                            </div>
                                            <div class="col-lg-3 col-sm-12">
                                                <label for="sku_code" class="form-label mb-0">SKU Code <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="sku_code"
                                                    value="{{ $products->sku_code }}"
                                                    class="form-control form-control-sm" id="sku_code"
                                                    placeholder="Enter SKU Code"
                                                    style=" font-size: 12px; font-weight: 500;" required>
                                            </div>
                                            <div class="col-lg-3 col-sm-12">
                                                <label for="mf_code" class="form-label mb-0">Manufacturing
                                                    Code</label>
                                                <input type="text" name="mf_code" value="{{ $products->mf_code }}"
                                                    class="form-control form-control-sm" id="mf_code"
                                                    placeholder="Manufacturing Code"
                                                    style=" font-size: 12px; font-weight: 500;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-12">
                                                <label for="tags" class="form-label mb-0">Product Tags
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" name="tags" value="{{ $products->tags }}"
                                                    class="form-control form-control-sm visually-hidden"
                                                    data-role="tagsinput" placeholder="Product Tags">
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="size" class="form-label mb-0">Product
                                                    Sizes</label>
                                                <input type="text" name="size" value="{{ $products->size }}"
                                                    class="form-control form-control-sm visually-hidden"
                                                    data-role="tagsinput" placeholder="Product Sizes">
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="color" class="form-label mb-0">Product
                                                    Colors</label>
                                                <input type="text" name="color" value="{{ $products->color }}"
                                                    class="form-control form-control-sm visually-hidden"
                                                    data-role="tagsinput" placeholder="Product Color">
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="product_code" class="form-label mb-0">Product
                                                    Code</label>
                                                <input type="text" name="product_code"
                                                    value="{{ $products->product_code }}"
                                                    class="form-control form-control-sm" id="product_code"
                                                    placeholder="product code">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="weight" class="form-label mb-0">Weight (KG)</label>
                                                <input type="text" name="weight" value="{{ $products->weight }}"
                                                    class="form-control form-control-sm" id="weight"
                                                    placeholder="0.1kg,0.5kg,1kg,2kg">
                                            </div>
                                            <div class="form-group col-lg-3 basic-form">
                                                <label for="product_type" class="form-label mb-0">Product
                                                    Type</label>
                                                <select name="product_type" data-placeholder="Select Product Type.."
                                                    id="product_type" class="form-control select" required>
                                                    <option></option>
                                                    <option class="form-control" value="hardware"
                                                        @selected($products->product_type == 'hardware')>
                                                        Hardware</option>
                                                    <option class="form-control" value="software"
                                                        @selected($products->product_type == 'software')>
                                                        Software</option>
                                                    <option class="form-control" value="training"
                                                        @selected($products->product_type == 'training')>
                                                        Training</option>
                                                    <option class="form-control" value="book"
                                                        @selected($products->product_type == 'book')>
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
                                                                <option class="form-select" value="available"
                                                                    @selected($products->stock == 'available')>
                                                                    Available
                                                                </option>
                                                                <option class="form-select" value="limited"
                                                                    @selected($products->stock == 'limited')>
                                                                    Limited</option>
                                                                <option class="form-select" value="unlimited"
                                                                    @selected($products->stock == 'unlimited')>
                                                                    UnLimited</option>
                                                                <option class="form-select" value="stock_out"
                                                                    @selected($products->stock == 'stock_out')>
                                                                    Out of Stock</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 qty_display d-none">
                                                        <label for="qty" class="form-label mb-0">Quantity
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text" name="qty"
                                                            value="{{ $products->qty }}"
                                                            class="form-control form-control-sm qty_required"
                                                            id="qty" placeholder="Quantity(10,50,100,200,500)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3 mb-2">
                                            <div class="col-lg-4">
                                                <div class="form-check">
                                                    <label class="form-check-label checkbox_label"
                                                        for="refurbished">Refurbished</label>
                                                    <input class="form-check-input" name="refurbished"
                                                        type="checkbox" value="1" id="refurbished"
                                                        @checked($products->refurbished == '1')>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check">
                                                    <label class="form-check-label checkbox_label" for="dealId">
                                                        Deals</label>
                                                    <input class="form-check-input" type="checkbox" id="dealId"
                                                        @checked(!empty($products->deal))>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-4" id="dealExpand" style="display:none">
                                                <input type="text" name="deal" value="{{ $products->deal }}"
                                                    class="form-control form-control-sm" placeholder="Enter Deals"
                                                    style=" font-size: 12px; font-weight: 500;">
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-lg-12">
                                                <div class="mb-1">
                                                    <label for="weight" class="form-label mb-0">Product
                                                        Warrenty</label>
                                                    <textarea class="form-control" name="warranty" rows="2" style=" font-size: 12px; font-weight: 500;"
                                                        placeholder="Product Warrenty"></textarea>
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
                                                    value="{{ $products->notification_days }}"
                                                    placeholder="Notification Day" required>
                                            </div>
                                            <div class="form-group col-md-6 basic-form">
                                                <label for="weight" class="form-label mb-0">Brand
                                                </label>
                                                <select class="form-control select" name="brand_id"
                                                    data-placeholder="Select Brand...">
                                                    <option></option>
                                                    @foreach ($brands as $brand)
                                                        <option class="form-control select"
                                                            value="{{ $brand->id }}" @selected($products->brand_id == $brand->id)>
                                                            {{ $brand->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="form-group col-md-6 basic-form">
                                                <label for="weight" class="form-label mb-0">Category
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control select" name="cat_id"
                                                    data-allow-clear="true" data-placeholder="Select Category..."
                                                    required>
                                                    <option></option>
                                                    @foreach ($categories as $cat)
                                                        <option class="form-control" value="{{ $cat->id }}"
                                                            @selected($products->cat_id == $cat->id)>
                                                            {{ $cat->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 basic-form">
                                                <label for="weight" class="form-label mb-0">Sub Category</label>
                                                <select class="form-control select" name="sub_cat_id"
                                                    data-allow-clear="true" data-placeholder="Select Sub Category...">
                                                    <option></option>
                                                    @foreach ($sub_cats as $item)
                                                        <option class="form-control" value="{{ $item->id }}"
                                                            @selected($products->sub_cat_id == $item->id)>
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
                                                    data-allow-clear="true"
                                                    data-placeholder="Select Sub Sub Category...">
                                                    <option></option>
                                                    @foreach ($sub_sub_cats as $item)
                                                        <option class="form-control" value="{{ $item->id }}"
                                                            @selected($products->sub_sub_cat_id == $item->id)>
                                                            {{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 basic-form">
                                                <label for="weight" class="form-label mb-0">Sub Sub Sub
                                                    Category</label>
                                                <select name="sub_sub_sub_cat_id" class="form-control select"
                                                    data-allow-clear="true" id="inputCollection"
                                                    data-placeholder="Select Sub Sub Sub Category...">
                                                    <option></option>
                                                    @foreach ($sub_sub_sub_cats as $item)
                                                        <option class="form-control" value="{{ $item->id }}"
                                                            @selected($products->sub_sub_sub_cat_id == $item->id)>
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
                                                    @foreach ($solutions as $solutionDetail)
                                                        <option value="{{ $solutionDetail->id }}"
                                                            @if (in_array($solutionDetail->id, $selectedSolutions)) selected @endif>
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
                                                    @foreach ($industrys as $industrie)
                                                        <option value="{{ $industrie->id }}"
                                                            @if (in_array($industrie->id, $selectedIndustries)) selected @endif>
                                                            {{ $industrie->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-end">
                                        <button type="submit" class="btn btn-success" name="action" id="submitbtn"
                                            value="save">Save<i class="ph-paper-plane-tilt"></i></button>
                                        <a href="javascript:void(0);" class="btn btn-info rounded-0 p-2 px-2"
                                            id="nextTabButton">Next
                                            <i class="ph-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                <h6 class="mb-0 text-info">Product Description</h6>
                                <div class="row  gx-0 pt-2 border border-secondary bg-light">
                                    <div class="row px-2 gx-1">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <textarea name="short_desc" class="form-control form-control-solid ckeditor" id="short_desc" rows="3"
                                                    style=" font-size: 12px; font-weight: 500;">{!! $products->short_desc !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-2">
                                                <textarea class="form-control form-control-solid ckeditor" name="overview" id="overview" style=" font-size: 12px; font-weight: 500;">{!! $products->overview !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row px-2 gx-1">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-2">
                                                <textarea class="form-control form-control-solid ckeditor" rows="8" name="specification" id="specification"
                                                    style=" font-size: 12px; font-weight: 500; height:20rem;">{!! $products->specification !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-2">
                                                <textarea class="form-control form-control-solid ckeditor" name="accessories" id="accessories" style=" font-size: 12px; font-weight: 500;">{!! $products->accessories !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-end">
                                        <button type="submit" class="btn btn-success" name="action" id="submitbtn"
                                            value="save">Save<i class="ph-paper-plane-tilt"></i></button>
                                        <a href="javascript:void(0);" class="btn btn-info rounded-0 p-2 px-2"
                                            id="nextTabButton3">Next
                                            <i class="ph-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                                {{-- <h5>Tab 3 Content</h5> --}}
                                <h6 class="ms-1 mb-0 text-info">Source Details</h6>
                                <div class="row mb-3 gx-0 border border-secondary bg-light">
                                    <div class="m-1 p-1">
                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-sm-6">
                                                <label for="weight" class="form-label mb-0"> Product
                                                    Price</label>
                                                <select name="price_status"
                                                    data-placeholder="Select Product Price Status"
                                                    class="form-control select price_select" required>
                                                    <option></option>
                                                    <option class="form-control" value="rfq"
                                                        @selected($products->price_status == 'rfq')>
                                                        Rfq</option>
                                                    <option class="form-control" value="price"
                                                        @selected($products->price_status == 'price')>
                                                        Price</option>
                                                    <option class="form-control" value="offer_price"
                                                        @selected($products->price_status == 'offer_price')>
                                                        Offer price</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <label for="weight" class="form-label mb-0">Price For
                                                    SAS</label>
                                                <div class="">
                                                    <input class="form-control form-control-sm" type="text"
                                                        name="sas_price" placeholder="Sas Price"
                                                        value="{{ $products->sas_price }}">
                                                </div>
                                                {{-- <div class="rfq_price price offer_price d-none">
                                                            <input class="form-control form-control-sm" type="text"
                                                                name="sas_price" placeholder="Sas Price"
                                                                value="{{ $products->sas_price }}">
                                                        </div> --}}
                                                {{-- <div class="price d-none">
                                                            <input class="form-control form-control-sm" type="text"
                                                                name="sas_price" placeholder="Price for Sas"
                                                                value="{{ $products->sas_price }}">
                                                        </div>
                                                        <div class="offer_price d-none">
                                                            <input class="form-control form-control-sm" type="text"
                                                                name="sas_price" placeholder="Starting Price for Sas"
                                                                value="{{ $products->sas_price }}">
                                                        </div> --}}
                                            </div>
                                        </div>
                                        <div class="row ">
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
                                                                        value="{{ $products->source_one_name }}"
                                                                        id="">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control form-control-sm"
                                                                        type="text" name="source_one_link"
                                                                        value="{{ $products->source_one_link }}"
                                                                        id="" maxlength="255">
                                                                </td>
                                                                <td>
                                                                    <input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_one_price"
                                                                        value="{{ $products->source_one_price }}"
                                                                        id="">
                                                                </td>
                                                                <td>
                                                                    <input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_one_estimate_time"
                                                                        value="{{ $products->source_one_estimate_time }}"
                                                                        id="">
                                                                </td>
                                                                <td>
                                                                    <input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text"
                                                                        name="source_one_principal_time"
                                                                        value="{{ $products->source_one_principal_time }}"
                                                                        id="">
                                                                </td>
                                                                <td>
                                                                    <input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_one_shipping_time"
                                                                        value="{{ $products->source_one_shipping_time }}"
                                                                        id="">
                                                                </td>
                                                                <td>
                                                                    <input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_one_location"
                                                                        value="{{ $products->source_one_location }}"
                                                                        id="">
                                                                </td>
                                                                <td>
                                                                    <input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_one_country"
                                                                        value="{{ $products->source_one_country }}"
                                                                        id="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control form-control-sm"
                                                                        type="text" name="source_two_name"
                                                                        value="{{ $products->source_two_name }}"
                                                                        id=""></td>
                                                                <td><input class="form-control form-control-sm"
                                                                        type="text" name="source_two_link"
                                                                        value="{{ $products->source_two_link }}"
                                                                        id="" maxlength="255">
                                                                </td>
                                                                <td><input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_two_price"
                                                                        value="{{ $products->source_two_price }}"
                                                                        id="">
                                                                </td>
                                                                <td><input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text"
                                                                        name=" source_two_estimate_time"
                                                                        value="{{ $products->source_two_estimate_time }}"
                                                                        id=""></td>
                                                                <td><input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text"
                                                                        name="source_two_principal_time"
                                                                        value="{{ $products->source_two_principal_time }}"
                                                                        id=""></td>
                                                                <td><input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_two_shipping_time"
                                                                        value="{{ $products->source_two_shipping_time }}"
                                                                        id=""></td>
                                                                <td><input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_two_location"
                                                                        value="{{ $products->source_two_location }}"
                                                                        id="">
                                                                </td>
                                                                <td><input
                                                                        class="form-control form-control-sm allow_decimal"
                                                                        type="text" name="source_two_country"
                                                                        value="{{ $products->source_two_country }}"
                                                                        id="">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2 gx-1">
                                            <div class="col-lg-5 col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th width="35%" style="font-size: 12px;">
                                                                    Competetor Name</th>
                                                                <th width="35%" style="font-size: 12px;">
                                                                    Competetor Link</th>
                                                                <th width="30%" style="font-size: 12px;">Price
                                                                </th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input class="form-control" type="text"
                                                                        name="competetor_one_name"
                                                                        value="{{ $products->competetor_one_name }}">
                                                                </td>
                                                                <td><input class="form-control" type="text"
                                                                        name="competetor_one_link"
                                                                        value="{{ $products->competetor_one_link }}">
                                                                </td>
                                                                <td><input class="form-control allow_decimal"
                                                                        type="text" name="competetor_one_price"
                                                                        value="{{ $products->competetor_one_price }}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control" type="text"
                                                                        name="competetor_two_name"
                                                                        value="{{ $products->competetor_two_name }}">
                                                                </td>
                                                                <td><input class="form-control" type="text"
                                                                        name="competetor_two_link"
                                                                        value="{{ $products->competetor_two_link }}">
                                                                </td>
                                                                <td><input class="form-control allow_decimal"
                                                                        type="text" name="competetor_two_price"
                                                                        value="{{ $products->competetor_two_price }}">
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
                                                                <textarea name="source_contact" id="" class="form-control">{!! $products->source_contact !!}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th width="70%" style="font-size: 12px;">
                                                                Details
                                                            </th>
                                                            <th width="15%" style="font-size: 12px;">
                                                                Status
                                                            </th>
                                                            <th width="15%" style="font-size: 12px;">Status
                                                            </th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Is this solid source? ( Y/N )</td>
                                                            <td><input class="margin-right:0.5rem" type="radio"
                                                                    name="solid_source" value="yes" id=""
                                                                    {{ $products->solid_source == 'yes' ? 'checked' : '' }}>&nbsp;
                                                                Yes
                                                            </td>
                                                            <td><input class="margin-right:0.5rem" type="radio"
                                                                    name="solid_source" value="no" id=""
                                                                    {{ $products->solid_source == 'no' ? 'checked' : '' }}>&nbsp;
                                                                No
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="68%">Is this direct Principal ? ( Y/N )
                                                            </td>
                                                            <td width="15%"><input class="margin-right:0.5rem"
                                                                    type="radio" name="direct_principal"
                                                                    value="yes" id=""
                                                                    {{ $products->direct_principal == 'yes' ? 'checked' : '' }}>&nbsp;
                                                                Yes
                                                            </td>
                                                            <td width="15%"><input class="margin-right:0.5rem"
                                                                    type="radio" name="direct_principal"
                                                                    value="no" id=""
                                                                    {{ $products->direct_principal == 'no' ? 'checked' : '' }}>&nbsp;
                                                                No
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="68%">Does it have Agreement ? ( Y/N )
                                                            </td>
                                                            <td width="15%"><input class="margin-right:0.5rem"
                                                                    type="radio" name="agreement" value="yes"
                                                                    id=""
                                                                    {{ $products->agreement == 'yes' ? 'checked' : '' }}>&nbsp;
                                                                Yes
                                                            </td>
                                                            <td width="15%"><input class="margin-right:0.5rem"
                                                                    type="radio" name="agreement" value="no"
                                                                    id=""
                                                                    {{ $products->agreement == 'no' ? 'checked' : '' }}>&nbsp;
                                                                No</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="66%">Source Type :</td>
                                                            <td width="34%" colspan="2">
                                                                <select name="source_type"
                                                                    data-placeholder="Select Source Type.."
                                                                    class="form-control select">
                                                                    <option></option>
                                                                    <option class="form-control" value="principal"
                                                                        {{ $products->source_type == 'principal' ? 'selected' : '' }}>
                                                                        Principal</option>
                                                                    <option class="form-control" value="distributor"
                                                                        {{ $products->source_type == 'distributor' ? 'selected' : '' }}>
                                                                        Distributor</option>
                                                                    <option class="form-control" value="supplier"
                                                                        {{ $products->source_type == 'supplier' ? 'selected' : '' }}>
                                                                        Supplier</option>
                                                                    <option class="form-control" value="retailer"
                                                                        {{ $products->source_type == 'retailer' ? 'selected' : '' }}>
                                                                        Retailer</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="row mt-5 text-end">
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-8">
                                                <button type="submit" class="btn btn-success" name="action"
                                                    id="submitbtn" value="save">Save<i
                                                        class="ph-paper-plane-tilt"></i></button>
                                                <button type="submit" class="btn btn-primary mx-3" name="action"
                                                    id="submitbtn" value="approval"> Submit
                                                    <i class="ph-paper-plane-tilt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                        <h6 class="ms-1 mb-0 text-info">Product Image Section</h6>
                        <div class="row mb-3 p-3 mx-1 border border-secondary bg-light">
                            <div class="col-lg-6">
                                <h5 class="mb-0 text-uppercase text-center">Update Thumbnail Image
                                </h5>
                                <form method="post" action="{{ route('update.product.thambnail') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="bg-white p-2">
                                        <input type="hidden" name="id" value="{{ $products->id }}">
                                        <input type="hidden" name="thumbnail" value="{{ $products->thumbnail }}">
                                        <div class="row">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Choose Thumbnail
                                                    Image
                                                </label>
                                                <input name="thumbnail" class="form-control form-control-sm"
                                                    type="file" id="image">
                                            </div>
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label"> </label>
                                                <img id="showImage" class="img-fluid"
                                                    style="height: 141px;width: 200px;"
                                                    src="{{ asset($products->thumbnail) }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg">
                                                <button class="btn btn-primary rounded-0 px-1" type="submit">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <h5 class="mb-0 text-uppercase text-center">Update Multi Image
                                </h5>
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="d-flex flex-row align-items-center" style="cursor:pointer"
                                            onclick="$('#multiImg').click()">
                                            <div>
                                                <h5 class="mb-0">Multiple Images</h5>
                                            </div>
                                            <div class="text-success ms-2" style="margin-top: -3px;">
                                                <i class="ph ph-plus-circle"></i>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row">
                                            <input class="form-control form-control-sm" name="multi_img[]"
                                                type="file" id="multiImg" multiple="" style="display:none">
                                            <div class="col" id="preview_img"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#Sl</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col" class="text-center">Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($multiImgs as $key => $img)
                                                    <tr>
                                                        <th scope="row">{{ $key + 1 }}
                                                        </th>
                                                        <td> <img src="{{ asset($img->photo) }}"
                                                                style="width:70; height: 40px;">
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="javascript:void(0);"
                                                                class="btn text-primary px-1" data-bs-toggle="modal"
                                                                data-bs-target="#update_multi_img_{{ $img->id }}">
                                                                <i class="icon-pencil"></i></a>
                                                            <a href="{{ route('product.multiimg.delete', [$img->id]) }}"
                                                                class="btn text-danger delete px-1">
                                                                <i class="delete icon-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <div id="update_multi_img_{{ $img->id }}" class="modal fade"
                                                        tabindex="-1" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-center">
                                                                        Multi Image
                                                                        Update</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                @php
                                                                    $img = App\Models\Admin\MultiImage::where(
                                                                        'id',
                                                                        $img->id,
                                                                    )->first();
                                                                @endphp
                                                                <form method="post"
                                                                    action="{{ route('update.product.multiimage') }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="img_id"
                                                                        value="{{ $img->id }}">
                                                                    <input type="hidden" name="old_img"
                                                                        value="{{ $img->photo }}">
                                                                    <div class="modal-body">
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-3">
                                                                                <h6 class="mb-0">
                                                                                    Image </h6>
                                                                            </div>
                                                                            <div class="col-sm-9 text-secondary">
                                                                                <input type="file" name="photo"
                                                                                    class="form-control"
                                                                                    id="image2" accept="image/*"
                                                                                    value="{{ asset($img->photo) }}" />
                                                                                <div class="form-text">
                                                                                    Accepts only
                                                                                    png, jpg, jpeg
                                                                                    images</div>
                                                                                <img class="mt-2" id="showImage2"
                                                                                    height="100px" width="100px"
                                                                                    src="{{ asset($img->photo) }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                            </div>
                                                                            <div class="col-sm-3 text-secondary">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Update</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-link"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="row gx-2">
                                <div class="col-md-5">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
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
                    </div>
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
                        $('#mainThmb').attr('src', e.target.result).width(80).height(80);
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
                                                e.target.result).width(100)
                                            .height(80); //create image element
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
                var stock_value = $('.stock_select').find(":selected").val();
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
            $(document).ready(function() {
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
        <script>
            // Get the next tab button for Tab 1
            const nextTabButton = document.getElementById('nextTabButton');
            // Add a click event listener to the button
            nextTabButton.addEventListener('click', function() {
                // Activate Tab 2
                const tab2Button = document.getElementById('tab2-tab');
                tab2Button.classList.add('active');
                tab2Button.setAttribute('aria-selected', 'true');
                // Show Tab 2's content
                const tab2Content = document.getElementById('tab2');
                tab2Content.classList.add('active', 'show');
                // Deactivate Tab 1
                const tab1Button = document.getElementById('tab1-tab');
                tab1Button.classList.remove('active');
                tab1Button.setAttribute('aria-selected', 'false');
                // Hide Tab 1's content
                const tab1Content = document.getElementById('tab1');
                tab1Content.classList.remove('active', 'show');
            });
            // Get the next tab button for Tab 2
            const nextTabButton2 = document.getElementById('nextTabButton2');
            // Add a click event listener to the button
            nextTabButton2.addEventListener('click', function() {
                // Activate Tab 3
                const tab3Button = document.getElementById('tab3-tab');
                tab3Button.classList.add('active');
                tab3Button.setAttribute('aria-selected', 'true');
                // Show Tab 3's content
                const tab3Content = document.getElementById('tab3');
                tab3Content.classList.add('active', 'show');
                // Deactivate Tab 2
                const tab2Button = document.getElementById('tab2-tab');
                tab2Button.classList.remove('active');
                tab2Button.setAttribute('aria-selected', 'false');
                // Hide Tab 2's content
                const tab2Content = document.getElementById('tab2');
                tab2Content.classList.remove('active', 'show');
            });
            // Get the next tab button for Tab 3
            const nextTabButton3 = document.getElementById('nextTabButton3');
            // Add a click event listener to the button
            nextTabButton3.addEventListener('click', function() {
                // Activate Tab 4
                const tab4Button = document.getElementById('tab4-tab');
                tab4Button.classList.add('active');
                tab4Button.setAttribute('aria-selected', 'true');
                // Show Tab 4's content
                const tab4Content = document.getElementById('tab4');
                tab4Content.classList.add('active', 'show');
                // Deactivate Tab 3
                const tab3Button = document.getElementById('tab3-tab');
                tab3Button.classList.remove('active');
                tab3Button.setAttribute('aria-selected', 'false');
                // Hide Tab 3's content
                const tab3Content = document.getElementById('tab3');
                tab3Content.classList.remove('active', 'show');
            });
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
    @endpush
</x-admin-app-layout>
