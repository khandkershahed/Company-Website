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
                        <a href="{{ route('knowledge.index') }}" class="breadcrumb-item">Marketing Dmar Management</a>
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
                                    href="{{ route('solutionDetails.index') }}">
                                    <i class="fa-solid fa-arrow-left main_color"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 d-flex justify-content-center">
                            <p class="text-white p-0 m-0 fw-bold"> Edit Marketing Dmar Form</p>
                        </div>

                        <div class="col-lg-4 col-sm-12 d-flex justify-content-end">
                            <a href="{{ route('admin.row.index') }}" class="btn navigation_btn">
                                <div class="d-flex align-items-center ">
                                    <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                                    <span>Row</span>
                                </div>
                            </a>
                            <a href="{{ route('purchase.index') }}" class="btn navigation_btn ms-2">
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
                <form method="post" action="{{ route('marketing-dmar.update', $MarketingDmar->id) }}">
                    @csrf
                    @method('PUT')
                    <!--Banner Section-->
                    <div class="container">
                        <div class="row g-2 p-1">
                            <div class="col-lg-6 col-sm-12">
                                <div class="px-2 py-2 rounded bg-light mt-2">
                                    {{--  --}}
                                    <div class="row mb-1 d-flex align-items-center">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Marketing Manager</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="marketing_manager_id" class="form-control form-select-sm select"
                                                data-container-css-class="select-sm"
                                                data-placeholder="Chose Marketing Manager" required>
                                                @foreach ($users as $user)
                                                    <option @selected($MarketingDmar->marketing_manager_id == $user->id) value="{{ $user->id }}">
                                                        {{ $user->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1 d-flex align-items-center">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Status</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="status" class="form-control form-select-sm select"
                                                data-container-css-class="select-sm" data-placeholder="Chose Status"
                                                required>
                                                <option @selected($MarketingDmar->status == 'missed') value="missed">Missed </option>
                                                <option @selected($MarketingDmar->status == 'appointed') value="appointed">Appointed </option>
                                                <option @selected($MarketingDmar->status == 'not_done') value="not_done">Not Done </option>
                                                <option @selected($MarketingDmar->status == 'done') value="done">Done </option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1 d-flex align-items-center">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Area</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="area" class="form-control form-control-sm"
                                                maxlength="100" value="{{ $MarketingDmar->area }}" placeholder="Inter Area"
                                                required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1 d-flex align-items-center">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Quarter</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="quarter" class="form-control form-select-sm select"
                                                data-container-css-class="select-sm" data-placeholder="Chose Quarter"
                                                required>
                                                <option @selected($MarketingDmar->quarter == 'q1') value="q1">q1 </option>
                                                <option @selected($MarketingDmar->quarter == 'q2') value="q2">q2 </option>
                                                <option @selected($MarketingDmar->quarter == 'q3') value="q3">q3 </option>
                                                <option @selected($MarketingDmar->quarter == 'q4') value="q4">q4 </option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    @php
                                        for ($m = 1; $m <= 12; $m++) {
                                            $months[] = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
                                        }
                                    @endphp
                                    <div class="row mb-1 d-flex align-items-center">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Month</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="month" class="form-control form-control-sm select"
                                                data-placeholder="Chose month ">
                                                @foreach ($months as $month)
                                                    <option @selected($MarketingDmar->month == Str::lower($month)) value="{{ Str::lower($month) }}">
                                                        {{ $month }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1 d-flex align-items-center">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Week</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="week" class="form-control form-control-sm select"
                                                data-placeholder="Chose week ">
                                                <option @selected($MarketingDmar->week == 'w1') value="w1">w1 </option>
                                                <option @selected($MarketingDmar->week == 'w2') value="w2">w2 </option>
                                                <option @selected($MarketingDmar->week == 'w3') value="w3">w3 </option>
                                                <option @selected($MarketingDmar->week == 'w4') value="w4">w4 </option>
                                                <option @selected($MarketingDmar->week == 'w5') value="w5">w5 </option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1 d-flex align-items-center">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Date</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="date" name="date" class="form-control form-control-sm"
                                                maxlength="100" value="{{ $MarketingDmar->date }}" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1 d-flex align-items-center">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Client Type</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="client_type" class="form-control form-control-sm select"
                                                data-placeholder="Chose Client Type ">
                                                <option @selected($MarketingDmar->client_type == 'new') value="new">new </option>
                                                <option @selected($MarketingDmar->client_type == 'existing') value="existing">existing </option>
                                                <option @selected($MarketingDmar->client_type == 'old') value="old">old </option>
                                                <option @selected($MarketingDmar->client_type == 'lost') value="lost">lost </option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1 d-flex align-items-center">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Sector</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="sector" class="form-control form-control-sm select"
                                                data-placeholder="Chose Client Type ">
                                                <option @selected($MarketingDmar->sector == 'psc') value="psc">psc </option>
                                                    <option @selected($MarketingDmar->sector == 'mnc') value="mnc">mnc </option>
                                                    <option @selected($MarketingDmar->sector == 'edu') value="edu">edu </option>
                                                    <option @selected($MarketingDmar->sector == 'epg') value="epg">epg </option>
                                                    <option @selected($MarketingDmar->sector == 'smb') value="smb">smb </option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Company Name</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="company_name"
                                            value="{{ $MarketingDmar->company_name }}"
                                                class="form-control form-control-sm maxlength" maxlength="100" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="px-2 py-2 rounded bg-light mt-2">

                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Activity</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="activity" class="form-control form-control-sm select"
                                                data-placeholder="Chose activity ">
                                                <option value="new_visit">New Visit </option>
                                                    <option value="new_call">New Call </option>
                                                    <option value="new_email">New Email </option>
                                                    <option value="followup_visit">Followup Visit </option>
                                                    <option value="followup_call">Followup Call </option>
                                                    <option value="followup_email">Followup Email </option>
                                                    <option value="followup_renewal">Followup Renewal </option>
                                                    <option value="1st_marketing_visit">1st Marketing Visit </option>
                                                    <option value="2nd_marketing_visit">2nd Marketing Visit </option>
                                                    <option value="1st_marketing_call">1st Marketing Call </option>
                                                    <option value="2nd_marketing_call">2nd Marketing Call </option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Current Status</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="current_status" class="form-control form-control-sm select"
                                                data-placeholder="Chose activity ">
                                                <option value="potential">Potential </option>
                                                    <option value="tor_stage">TOR Stage </option>
                                                    <option value="rfq_stage">RFQ Stage </option>
                                                    <option value="poc_stage">PoC Stage </option>
                                                    <option value="presentation_stage">Presentation Stage </option>
                                                    <option value="no_next_opportunity">NO - Next Opportunity </option>
                                                    <option value="sold">Sold </option>
                                                    <option value="lost">Lost </option>
                                                    <option value="no_result">No Result </option>
                                                    <option value="introduced">Introduced </option>
                                                    <option value="less_potential">Less Potential </option>
                                                    <option value="initially_interested">Initially Interested </option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Solution</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="solution" class="form-control form-control-sm select"
                                                data-placeholder="Chose activity ">
                                                <option value="services">Services </option>
                                                    <option value="training">Training </option>
                                                    <option value="system_integration">System Integration </option>
                                                    <option value="hardware">Hardware </option>
                                                    <option value="software">Software </option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Product</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="product" value="{{ $MarketingDmar->product }}"
                                                class="form-control form-control-sm maxlength" maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Phone</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="number" name="phone" value="{{ $MarketingDmar->phone }}"
                                                class="form-control form-control-sm maxlength" maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Contact</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="number" name="contact" value="{{ $MarketingDmar->contact }}"
                                                class="form-control form-control-sm maxlength" maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Comments By Sales</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="number" name="comments_by_sales" value="{{ $MarketingDmar->comments_by_sales }}"
                                                class="form-control form-control-sm maxlength" maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Comments By Ceo</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="number" name="comments_by_ceo" value="{{ $MarketingDmar->comments_by_ceo }}"
                                                class="form-control form-control-sm maxlength" maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Action On Fail</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="number" name="action_on_fail" value="{{ $MarketingDmar->action_on_fail }}"
                                                class="form-control form-control-sm maxlength" maxlength="100" required />
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
