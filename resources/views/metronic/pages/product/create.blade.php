<x-admin-app-layout :title="'Product Add'">
    <style>
        /* Change active tab color */
        .nav-tabs .nav-link.active {
            background-color: #0d6efd !important;
            /* Bootstrap primary */
            color: #fff !important;
        }

        /* Optional: keep default spacing/padding for vertical tabs */
        .nav-tabs .nav-link {
            margin-bottom: 4px;
        }
    </style>
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
        <div class="px-2 pt-0 card-body">
            <div class="row gx-0">
                <div class="col-lg-2" style="border-right: 1px solid #eee;">
                    <ul class="px-4 mt-5 border-0 nav nav-tabs flex-column" id="myTabs" role="tablist">
                        <li class="mb-2 nav-item" role="presentation">
                            <button class="py-4 w-100 rounded-0 nav-link bg-light text-dark text-start active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1"
                                type="button" role="tab" aria-controls="tab1" aria-selected="true">
                                Basic Information
                            </button>
                        </li>
                        <li class="mb-2 nav-item" role="presentation">
                            <button class="py-4 w-100 rounded-0 nav-link text-start bg-light text-dark" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2"
                                type="button" role="tab" aria-controls="tab2" aria-selected="false">
                                Description
                            </button>
                        </li>
                        <li class="mb-2 nav-item" role="presentation">
                            <button class="py-4 w-100 rounded-0 nav-link text-start bg-light text-dark" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3"
                                type="button" role="tab" aria-controls="tab3" aria-selected="false">
                                Source Details
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-10">
                    <div class="p-4">
                        <form id="myForm" method="post" action="{{ route('product-sourcing.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="p-4 bg-white tab-content" id="myTabContent">
                                <!-- First Tab -->
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                    <div class="row g-3 align-items-center"> <!-- use g-3 for spacing between inputs -->
                                        {{-- Product Name --}}
                                        <div class="col-lg-4 col-md-6">
                                            <label for="product_name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                            <textarea class="form-control form-control-solid" name="name" id="product_name" rows="1"
                                                placeholder="Product Name" required style="font-size: 12px; font-weight: 600;"></textarea>
                                        </div>

                                        {{-- SKU Code --}}
                                        <div class="col-lg-4 col-md-6">
                                            <label for="sku_code" class="form-label">SKU Code <span class="text-danger">*</span></label>
                                            <input type="text" name="sku_code" id="sku_code" class="form-control form-control-solid"
                                                placeholder="Enter SKU Code" style="font-size: 12px; font-weight: 500;" required>
                                        </div>

                                        {{-- Manufacturing Code --}}
                                        <div class="col-lg-4 col-md-6">
                                            <label for="mf_code" class="form-label">Manufacturing Code</label>
                                            <input type="text" name="mf_code" id="mf_code" class="form-control form-control-solid"
                                                placeholder="Manufacturing Code" style="font-size: 12px; font-weight: 500;">
                                        </div>

                                        {{-- Product Tags --}}
                                        <!-- <div class="col-lg-4 col-md-6">
                                            <label for="tags" class="form-label">Product Tags</label>
                                            <input type="text" name="tags" class="form-control visually-hidden" data-role="tagsinput"
                                                placeholder="Product Tags">
                                        </div> -->

                                        {{-- Product Sizes --}}
                                        <!-- <div class="col-lg-4 col-md-6">
                                            <label for="size" class="form-label">Product Sizes</label>
                                            <input type="text" name="size" class="form-control visually-hidden" data-role="tagsinput"
                                                placeholder="Product Sizes">
                                        </div> -->

                                        {{-- Product Colors --}}
                                        <!-- <div class="col-lg-4 col-md-6">
                                            <label for="color" class="form-label">Product Colors</label>
                                            <input type="text" name="color" class="form-control visually-hidden" data-role="tagsinput"
                                                placeholder="Product Colors">
                                        </div> -->

                                        {{-- Product Code --}}
                                        <div class="col-lg-4 col-md-6">
                                            <label for="product_code" class="form-label">Product Code</label>
                                            <input type="text" name="product_code" id="product_code" class="form-control form-control-solid" placeholder="Product Code">
                                        </div>

                                        {{-- Weight --}}
                                        <div class="col-lg-4 col-md-6">
                                            <label for="weight" class="form-label">Weight (KG)</label>
                                            <input type="text" name="weight" id="weight" class="form-control form-control-solid" placeholder="0.1kg,0.5kg,1kg,2kg">
                                        </div>

                                        {{-- Product Type --}}
                                        <div class="col-lg-4 col-md-6">
                                            <label for="product_type" class="form-label">Product Type <span class="text-danger">*</span></label>
                                            <select name="product_type" id="product_type" class="form-select form-select-solid" required>
                                                <option value="" disabled selected>Select Product Type</option>
                                                <option value="hardware">Hardware</option>
                                                <option value="software">Software</option>
                                                <option value="training">Training</option>
                                                <option value="book">Book</option>
                                            </select>
                                        </div>

                                        {{-- Stock --}}
                                        <div class="col-lg-4 col-md-6">
                                            <label for="stock" class="form-label">Stock <span class="text-danger">*</span></label>
                                            <select class="form-select form-select-solid stock_select" data-control="select2" data-allow-clear="true" data-placeholder="Select an option" name="stock" required>
                                                <option value="" disabled selected>Select Stock Option</option>
                                                <option value="available">Available</option>
                                                <option value="limited">Limited</option>
                                                <option value="unlimited">Unlimited</option>
                                                <option value="stock_out">Out of Stock</option>
                                            </select>
                                        </div>

                                        {{-- Quantity (shown dynamically) --}}
                                        <div class="col-lg-4 col-md-6 qty_display d-none">
                                            <label for="qty" class="form-label">Quantity</label>
                                            <input type="text" name="qty" id="qty" class="form-control qty_required" placeholder="Quantity(10,50,100)">
                                        </div>

                                        {{-- Solutions --}}
                                        <div class="col-lg-4 col-md-6">
                                            <label for="solution_id" class="form-label">Solution <span class="text-danger">*</span></label>
                                            <select name="solution_id[]" data-control="select2" data-allow-clear="true" data-placeholder="Select an option" class="form-select form-select-solid" multiple="multiple" multiple required>
                                                @foreach ($solutions as $solutionDetail)
                                                <option value="{{ $solutionDetail->id }}">{{ $solutionDetail->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- Checkboxes --}}
                                        <div class="col-lg-2 col-md-6">
                                            <div class="pt-10 form-check">
                                                <input class="form-check-input" type="checkbox" name="refurbished" id="refurbished" value="1">
                                                <label class="form-check-label" for="refurbished">Refurbished</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-6">
                                            <div class="pt-10 form-check">
                                                <input class="border form-check-input" type="checkbox" id="dealId">
                                                <label class="form-check-label " for="dealId">Deals</label>
                                            </div>
                                        </div>


                                        <div class="col-lg-4 col-md-6" id="dealExpand" style="display:none">
                                            <input type="text" name="deal" class="form-control form-control-solid" placeholder="Enter Deals">
                                        </div>

                                        {{-- Thumbnail --}}
                                        <div class="col-lg-6">
                                            <label class="mt-3 form-label">Main Thumbnail <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control form-control-solid" name="thumbnail" id="formFile" required onchange="mainThamUrl(this)">
                                            <img id="mainThmb" class="p-1 mt-2 bg-light" />
                                        </div>

                                        {{-- Multiple Images --}}
                                        <div class="col-lg-6">
                                            <label class="mt-0 form-label">Multiple Images</label>
                                            <input type="file" class="form-control form-control-solid" name="multi_img[]" id="multiImg" multiple>
                                            <div class="mt-2" id="preview_img"></div>
                                        </div>

                                        {{-- Brand --}}
                                        <div class="col-lg-4 col-md-6">
                                            <label for="brand_id" class="form-label">Brand</label>
                                            <select name="brand_id" class="form-select form-select-solid" data-control="select2" data-allow-clear="true" data-placeholder="Select an option">
                                                <option value="" disabled selected>Select Brand</option>
                                                @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Category --}}
                                        <div class="col-lg-4 col-md-6">
                                            <label for="cat_id" class="form-label">Category <span class="text-danger">*</span></label>
                                            <select name="cat_id" data-control="select2" data-allow-clear="true" data-placeholder="Select an option" class="form-select form-select-solid" required>
                                                <option value="" disabled selected>Select Category</option>
                                                @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Sub Category --}}
                                        <div class="col-lg-4 col-md-6">
                                            <label for="sub_cat_id" class="form-label">Sub Category</label>
                                            <select name="sub_cat_id" data-control="select2" data-allow-clear="true" data-placeholder="Select an option" class="form-select form-select-solid">
                                                <option value="" disabled selected>Select Sub Category</option>
                                                @foreach ($sub_cats as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Sub Sub Category --}}
                                        <div class="col-lg-3 col-md-6">
                                            <label for="sub_sub_cat_id" class="form-label">Sub Sub Category</label>
                                            <select name="sub_sub_cat_id" data-control="select2" data-allow-clear="true" data-placeholder="Select an option" class="form-select form-select-solid">
                                                <option value="" disabled selected>Select Sub Sub Category</option>
                                                @foreach ($sub_sub_cats as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Sub Sub Sub Category --}}
                                        <div class="col-lg-3 col-md-6">
                                            <label for="sub_sub_sub_cat_id" class="form-label">Sub Sub Sub Category</label>
                                            <select name="sub_sub_sub_cat_id" data-control="select2" data-allow-clear="true" data-placeholder="Select an option" class="form-select form-select-solid">
                                                <option value="" disabled selected>Select Sub Sub Sub Category</option>
                                                @foreach ($sub_sub_sub_cats as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- Notification Days --}}
                                        <div class="col-lg-3 col-md-6">
                                            <label for="notification_days" class="form-label">Notification Day <span class="text-danger">*</span></label>
                                            <input type="text" name="notification_days" class="form-control form-control-solid" placeholder="Notification Day" required>
                                        </div>



                                        {{-- Industries --}}
                                        <div class="col-lg-3 col-md-6">
                                            <label for="industry_id" class="form-label">Industry <span class="text-danger">*</span></label>
                                            <select name="industry_id[]" data-control="select2" data-allow-clear="true" data-placeholder="Select an option" class="form-select form-select-solid" pla multiple="multiple" multiple required>
                                                @foreach ($industrys as $industrie)
                                                <option value="{{ $industrie->id }}">{{ $industrie->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Warranty --}}
                                        <div class="col-12">
                                            <label for="warranty" class="form-label">Product Warranty</label>
                                            <textarea class="form-control form-control-solid" name="warranty" rows="5" placeholder="Product Warranty" style="font-size: 12px; font-weight: 500;"></textarea>
                                        </div>



                                        {{-- Submit & Next --}}
                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-success" name="action" id="submitbtn" value="save">Save <i class="fas fa-download"></i></button>
                                            <a href="javascript:void(0);" class="btn btn-info" id="nextTabButton">Next <i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Second Tab -->
                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                    <div class="p-2 mb-3 row gx-0">
                                        <div class="px-0 mb-1 row gx-1">
                                            <div class="col-lg-12">
                                                <div class="mb-2 form-group">
                                                    <label for="warranty" class="form-label">Short Description</label>
                                                    <textarea name="short_desc" class="form-control form-control-solid ckeditor_classic" placeholder="Product Short Description" id="short_desc" rows="4"
                                                        style=" font-size: 12px; font-weight: 500;"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-2">
                                                    <label for="warranty" class="form-label">Overview</label>
                                                    <textarea class="form-control form-control-solid ckeditor_classic" placeholder="Product Overview" name="overview" id="overview" rows="4" style=" font-size: 12px; font-weight: 500;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-0 row gx-1">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="mb-2">
                                                    <label for="warranty" class="form-label">Specification</label>
                                                    <textarea class="form-control form-control-solid ckeditor_classic" placeholder="Product Specification" name="specification" id="specification" rows="4" style=" font-size: 12px; font-weight: 500;"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="mb-2">
                                                    <label for="warranty" class="form-label">Accessories</label>
                                                    <textarea class="form-control form-control-solid ckeditor_classic" placeholder="Product Accessories" name="accessories" id="accessories" rows="4" style=" font-size: 12px; font-weight: 500;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-end">
                                            <button type="submit" class="btn btn-success" name="action" id="submitbtn"
                                                value="save">Save<i class="fas fa-download"></i></button>
                                            <a href="javascript:void(0);" class="btn btn-info rounded-0"
                                                id="nextTabButton2">Next
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>


                                </div>
                                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                    <div class="px-2 mb-5 row gx-5">
                                        <div class="col-lg-6 col-sm-6">
                                            <label class="ms-1" for="price_status">Price Status <span
                                                    class="text-danger">*</span></label>
                                            <select name="price_status" id="price_status"
                                                class="form-select form-select-solid price_select" required data-control="select2" data-close-on-select="false" data-placeholder="Select Product Price Status" data-allow-clear="true">
                                                <option></option>
                                                <option class="form-control form-control-solid" value="rfq">
                                                    Rfq</option>
                                                <option class="form-control form-control-solid" value="price">
                                                    Price</option>
                                                <option class="form-control form-control-solid" value="offer_price">
                                                    Offer price</option>

                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="ms-1" for="price_status">Source Type <span
                                                    class="text-danger">*</span></label>
                                            <select name="source_type"
                                                data-placeholder="Select Source Type.."
                                                class="form-select form-select-solid" data-control="select2" data-close-on-select="false" data-placeholder="Select an option" data-allow-clear="true">
                                                <option></option>
                                                <option class="form-control form-control-solid"
                                                    value="principal">
                                                    Principal</option>
                                                <option class="form-control form-control-solid"
                                                    value="distributor">
                                                    Distributor</option>
                                                <option class="form-control form-control-solid" value="supplier">
                                                    Supplier</option>
                                                <option class="form-control form-control-solid" value="retailer">
                                                    Retailer</option>
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
                                    <div class="px-2 mb-5 row gx-5">
                                        <div class="col-lg-12">
                                            <div class="border table-responsive rounded-2">
                                                <table class="table mb-0 table-hover table-bordered">
                                                    <thead>
                                                        <tr class="bg-light">
                                                            <th width="15%" class="ps-3">Source Name</th>
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
                                                            <td class="ps-3">
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
                                                            <td class="pe-3">
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
                                                            <td class="ps-3">
                                                                <input class="form-control form-control-sm"
                                                                    type="text" name="source_two_name"
                                                                    id="">
                                                            </td>
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
                                                            <td class="pe-3"><input
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
                                    <div class="px-2 mb-5 row gx-5">
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="border table-responsive rounded-2">
                                                <table class="table mb-0 table-hover table-bordered">
                                                    <thead>
                                                        <tr class="bg-light">
                                                            <th width="35%" class="ps-3" style="font-size: 12px;">
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
                                                            <td class="ps-3"><input class="form-control form-control-sm"
                                                                    type="text" name="competetor_one_name">
                                                            </td>
                                                            <td><input class="form-control form-control-sm"
                                                                    type="text" name="competetor_one_link"
                                                                    maxlength="255">
                                                            </td>
                                                            <td class="pe-3"><input
                                                                    class="form-control form-control-sm allow_decimal"
                                                                    type="text" name="competetor_one_price">
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="ps-3"><input class="form-control form-control-sm"
                                                                    type="text" name="competetor_two_name">
                                                            </td>
                                                            <td><input class="form-control form-control-sm"
                                                                    type="text" name="competetor_two_link"
                                                                    maxlength="255">
                                                            </td>
                                                            <td class="pe-3"><input
                                                                    class="form-control form-control-sm allow_decimal"
                                                                    type="text" name="competetor_two_price">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <div class="shadow-none card">
                                                <div class="border card-body rounded-2">
                                                    <div class="col-sm-12">
                                                        <h6 class="mb-0 text-info"> Source Contact Details</h6>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="py-2 form-group rounded-3">
                                                            <textarea name="source_contact" id="" class="form-control form-control-solid"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-sm-12">
                                            <div class="border table-responsive rounded-2">
                                                <table class="table mb-0 table-hover table-bordered">
                                                    <thead>
                                                        <tr class="bg-light">
                                                            <th style="font-size: 12px;" class="ps-3">
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
                                                            <td class="ps-3">Is this solid source? ( Y/N )
                                                            </td>
                                                            <td><input class="margin-right:0.5rem" type="radio"
                                                                    name="solid_source" value="yes"
                                                                    id="">&nbsp; Yes
                                                            </td>
                                                            <td class="pe-3"><input class="margin-right:0.5rem" type="radio"
                                                                    name="solid_source" value="no"
                                                                    id="">&nbsp; No
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="ps-3">Is this direct Principal ? ( Y/N
                                                                )
                                                            </td>
                                                            <td><input class="margin-right:0.5rem" type="radio"
                                                                    name="direct_principal" value="yes"
                                                                    id="">&nbsp;
                                                                Yes
                                                            </td>
                                                            <td class="pe-3"><input class="margin-right:0.5rem" type="radio"
                                                                    name="direct_principal" value="no"
                                                                    id="">&nbsp;
                                                                No
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="ps-3">Does it have Agreement ? ( Y/N )
                                                            </td>
                                                            <td><input class="margin-right:0.5rem" type="radio"
                                                                    name="agreement" value="yes"
                                                                    id="">&nbsp; Yes
                                                            </td>
                                                            <td class="pe-3"><input class="margin-right:0.5rem" type="radio"
                                                                    name="agreement" value="no"
                                                                    id="">&nbsp; No</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-2 mb-3 row gx-5 text-end">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-8">
                                            <button type="submit" class="btn btn-success save_btn"
                                                name="action" value="save">Save<i
                                                    class="mx-2 fas fa-download"></i></button>

                                            <button type="submit" class="btn btn-primary save_btn"
                                                name="action" id="submitbtn" value="approval">Send For
                                                SAS<i class="mx-2 fas fa-download"></i></button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
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
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Select all elements with this class
        const editors = document.querySelectorAll(".ckeditor_classic");

        // Loop through and initialize each editor
        editors.forEach((element) => {
            ClassicEditor
                .create(element)
                .then(editor => {
                    console.log("Editor initialized for:", element);
                })
                .catch(error => {
                    console.error("Error initializing editor for:", element, error);
                });
        });
    });
</script>
    @endpush
</x-admin-app-layout>