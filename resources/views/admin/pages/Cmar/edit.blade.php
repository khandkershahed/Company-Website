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
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('cmar.index') }}" class="breadcrumb-item">CMAR Management</a>
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
        <div class="content pt-2 w-75 mx-auto">
            <div class="text-center">
                <div class="text-start">
                    <div class="row main_bg py-1 rounded-1 d-flex align-items-center gx-0 px-2">

                        <div class="col-lg-4 col-sm-12">
                            <div>
                                <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                                    href="{{ route('cmar.index') }}">
                                    <i class="fa-solid fa-arrow-left main_color"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 d-flex justify-content-center">
                            <p class="text-white p-0 m-0 fw-bold"> Edit CMAR </p>
                        </div>

                        <div class="col-lg-4 col-sm-12 d-flex justify-content-end">
                            <a href="{{ route('admin.row.index') }}" class="btn navigation_btn">
                                <div class="d-flex align-items-center ">
                                    <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                                    <span>Row</span>
                                </div>
                            </a>
                            <a href="{{ route('solution.index') }}" class="btn navigation_btn ms-2">
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
                <form id="myform" method="post" action="{{ route('cmar.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!--Banner Section-->
                    <div class="container">
                        <div class="row g-2 p-1">
                            <div class="col-lg-4 col-sm-12">
                                <div class="px-2 py-2 rounded bg-light mt-2">
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Year</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="year" class="form-control form-select-sm select"
                                                data-container-css-class="select-sm" data-placeholder="Chose Type" required>
                                                <option value="opt1">2023</option>
                                                <option value="opt1">Select Year</option>
                                                <option value="opt2">2023</option>
                                                <option value="opt3">2022</option>
                                                <option value="opt4">2021</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Month</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="month" class="form-control form-select-sm select"
                                                data-container-css-class="select-sm" data-placeholder="Chose Category Name"
                                                required>
                                                <option value="opt1">Select Month</option>
                                                <option value="opt2">January</option>
                                                <option value="opt3">February</option>
                                                <option value="opt4">March</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Week</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="week" class="form-control form-select-sm select"
                                                data-container-css-class="select-sm"
                                                data-placeholder="Chose Industries Name" required>
                                                <option value="opt1">Select Week</option>
                                                <option value="opt2">Saturday</option>
                                                <option value="opt3">Sunday</option>
                                                <option value="opt4">Monday</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Product ID</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="quarter" class="form-control form-select-sm select"
                                                data-container-css-class="select-sm" data-placeholder="Chose Brands Name"
                                                required>
                                                <option value="opt1">Select quarter</option>
                                                <option value="opt2">q1</option>
                                                <option value="opt3">q2</option>
                                                <option value="opt4">q3</option>
                                                <option value="opt4">q4</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Solution Id</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="solution_id" class="form-control form-select-sm select"
                                                data-placeholder="Chose Solution Id" required>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Manager ID</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="marketing_manager_id" class="form-control form-select-sm select"
                                                data-placeholder="Chose Manager ID" required>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Target</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text" name="target"
                                                maxlength="100" placeholder="Enter Target" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Work Order</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="number"
                                                placeholder="Work Order" name="workorder" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Revenue</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Revenue" name="revenue" maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Description</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <textarea rows="1" cols="3" class="form-control" name="description" placeholder="Default textarea"
                                                required></textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Sector Smb</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Sector Smb" name="sector_smb" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Sector Epg</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Sector Epg" name="sector_epg" maxlength="50" required />
                                        </div>
                                    </div>
                                    
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Quote</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="quote" name="quote" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Quote Links</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="quote Links" name="quote_links" maxlength="50" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="px-2 py-2 rounded bg-light mt-2">
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Sector Fmg</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Sector Fmg" name="sector_fmg" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Sector Govt</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Sector Govt" name="sector_govt" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Sector Edu</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Sector Edu" name="sector_edu" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Email</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="email"
                                                placeholder="Email" name="email" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Email Links</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Email Links" name="email_links" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Social</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Social" name="social" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Social Links</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Social Links" name="social_links" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Call</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="number" placeholder="Call"
                                                name="call" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Call Links</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Call Links" name="call_links" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Press</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Press" name="press" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Press Links</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Press Links" name="press_links" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Presentation</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Presentation" name="presentation" maxlength="50" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="px-2 py-2 rounded bg-light mt-2">
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Presentation Links</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Presentation Links" name="presentation_links" maxlength="50"
                                                required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Boost</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Boost" name="boost" maxlength="50" required />
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Boost Links</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Boost Links" name="boost_links" maxlength="50" required />
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Blog</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text" placeholder="Blog"
                                                name="blog" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Blog</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Blog Links" name="blog_links" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Negotiation</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Negotiation" name="negotiation" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Negotiation Links</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Negotiation Links" name="negotiation_links" maxlength="50"
                                                required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Deal Closing</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Deal Closing" name="deal_closing" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Deal Closing Links</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Deal Closing Links" name="deal_closing_links" maxlength="50"
                                                required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Follow up</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Follow up" name="followup" maxlength="50" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Follow up Links</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Follow up Links" name="followup_links" maxlength="50"
                                                required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pb-2 pe-3">
                        <button type="submit" class="submit_btn from-prevent-multiple-submits"
                            style="padding: 4px 9px;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /content area -->
        <!-- /inner content -->

    </div>
@endsection
