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
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i>
                            Home</a>
                        <a href="{{ route('knowledge.index') }}" class="breadcrumb-item">Partner Account</a>
                        <a href="" class="breadcrumb-item">Edit</a>
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
        <div class="content pt-2 w-100 mx-auto mt-3">
            <div class="text-center">
                <div class="text-start">
                    <div class="row main_bg py-1 rounded-1 d-flex align-items-center gx-0 px-2">

                        <div class="col-lg-4 col-sm-12">
                            <div>
                                <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                                    href="{{ route('partner-account.index') }}">
                                    <i class="fa-solid fa-arrow-left main_color"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 d-flex justify-content-center">
                            <p class="text-white p-0 m-0 fw-bold"> Edit Partner Form </p>
                        </div>

                        <div class="col-lg-4 col-sm-12 d-flex justify-content-end">
                            <a href="{{ route('admin.row.index') }}" class="btn navigation_btn">
                                <div class="d-flex align-items-center ">
                                    <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                                    <span>Row</span>
                                </div>
                            </a>
                            <a href="" class="btn navigation_btn ms-2">
                                <div class="d-flex align-items-center ">
                                    <i class="fa-solid fa-money-check-dollar-pen me-1" style="font-size: 10px;"></i>
                                    <span>Solution</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <form method="post" action="{{ route('partner-account.update', $partner->id) }}"
                    enctype="multipart/form-data" id="myform">
                    @csrf
                    @method('PUT')
                    <!--Banner Section-->
                    <div class="container-fluid">
                        <div class="row g-2 p-1">
                            <div class="col-lg-4 col-sm-12">
                                <div class="px-2 py-2 rounded bg-light mt-2">
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Partner {{ ucfirst('name') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="name" value="{{ $partner->name }}"
                                                class=" form-control form-control-sm maxlength" placeholder="Partner Name"
                                                maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('company name') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="company_name"
                                                value="{{ $partner->company_name }}"
                                                class=" form-control form-control-sm maxlength" placeholder="Company name"
                                                maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-2">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('company site name') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="company_site_name"
                                                value="{{ $partner->company_site_name }}"
                                                class=" form-control form-control-sm maxlength"
                                                placeholder="Company site name" maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-2">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('company address') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="company_address"
                                                value="{{ $partner->company_address }}"
                                                class=" form-control form-control-sm maxlength"
                                                placeholder="Company address" maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('company email address') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="email" name="company_email_address"
                                                value="{{ $partner->company_email_address }}"
                                                class=" form-control form-control-sm maxlength"
                                                placeholder="Company email address" maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('primary email address') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="email" name="primary_email_address"
                                                value="{{ $partner->primary_email_address }}"
                                                class=" form-control form-control-sm maxlength"
                                                placeholder="Primary email address" maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="px-2 py-2 rounded bg-light mt-2">
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('phone number') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="phone_number"
                                                value="{{ $partner->phone_number }}"
                                                class=" form-control form-control-sm maxlength" placeholder="Phone Number"
                                                maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-2">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('company number') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="company_number"
                                                value="{{ $partner->company_number }}"
                                                class=" form-control form-control-sm maxlength"
                                                placeholder="Company Number" maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('company trade license') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="company_trade_license"
                                                value="{{ $partner->company_trade_license }}"
                                                class=" form-control form-control-sm maxlength"
                                                placeholder="Company Trade License" maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('company tin number') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="company_tin_number"
                                                value="{{ $partner->company_tin_number }}"
                                                class=" form-control form-control-sm maxlength"
                                                placeholder="Company Tin Number" maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-2">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('company vat') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="company_vat" value="{{ $partner->company_vat }}"
                                                class=" form-control form-control-sm maxlength" placeholder="Company Vat"
                                                maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('business type') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="business_type"
                                                value="{{ $partner->business_type }}"
                                                class=" form-control form-control-sm maxlength"
                                                placeholder="Business Type" maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}

                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="px-2 py-2 rounded bg-light mt-2">

                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('business since') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="business_since"
                                                value="{{ $partner->business_since }}"
                                                class=" form-control form-control-sm maxlength"
                                                placeholder="Business Since" maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('Partner Image ') }}</span>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="file" name="logo" class=" form-control form-control-sm"
                                                value="{{ $partner->logo }}" id="image" accept="image/*"
                                                placeholder="Partner Image " />
                                        </div>
                                        <div class="col-lg-2 col-sm-12">
                                            <img class="img-fluid ronded-circle" id="showImage"
                                                src="{{ asset('storage/' . $partner->logo) }}" alt=""
                                                style="width: 30px; height: 30px; border-radius: 50%;">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('city') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="city" value="{{ $partner->city }}"
                                                class=" form-control form-control-sm maxlength" placeholder="City"
                                                maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('country') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="country" value="{{ $partner->country }}"
                                                class=" form-control form-control-sm maxlength" placeholder="Country"
                                                maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('postal') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="postal" value="{{ $partner->postal }}"
                                                class=" form-control form-control-sm maxlength" placeholder="Postal"
                                                maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('status') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="status" class=" form-control form-control-sm select"
                                                data-placeholder="Status">
                                                <option @selected($partner->status == 'active') value="active">Active</option>
                                            <option @selected($partner->status == 'inactive') value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>{{ ucfirst('password') }}</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="password" name="password"
                                                class=" form-control form-control-sm maxlength" placeholder="password"
                                                maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pb-2 pe-3">
                        <button type="submit" class="submit_btn from-prevent-multiple-submits" style="padding: 4px 9px;"
                            id="submitbtn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /content area -->
        <!-- /inner content -->

    </div>
@endsection
