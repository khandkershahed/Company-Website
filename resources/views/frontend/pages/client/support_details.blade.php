@extends('frontend.master')
@section('content')
    <style>
        .page-wrapper .page-content {
            display: inline-block;
            width: 100%;
        }

        p {
            font-size: 14px;
            font-family: system-ui;
        }

        .badge-text {
            font-size: 14px;
            font-weight: bold !important;
        }

        .crate-case_btn {
            background-color: #ae0a46 !important;
            color: white !important;
            padding: 5px !important;
            border-radius: 5px !important;
        }

        .crate-case_btn:hover {
            transition: 0.5s all ease-in-out;
            background-color: #ae0a46 !important;
            color: white !important;
            padding: 5px;
            border-radius: 10px;
        }

        .accordion-button:not(.collapsed) {
            color: #ae0a46 !important;
            background-color: #ae0a4600 !important;
            box-shadow: inset 0 calc(-1 * var(--bs-accordion-border-width)) 0 var(--bs-accordion-border-color);
        }

        .accordion-button:.collapsed {
            color: #ae0a46 !important;
            background-color: #ae0a4600 !important;
            box-shadow: inset 0 calc(-1 * var(--bs-accordion-border-width)) 0 var(--bs-accordion-border-color);
        }

        .accordion-button.collapsed::after {
            color: #ae0a46 !important;
        }

        .support_title_triger {
            font-family: system-ui;
            font-size: 14px !important;
        }

        th {
            font-size: 14px !important;
        }

        .panel-title>a {
            color: #ae0a46 !important;
        }

        .panel-title>a:before {
            color: #ae0a46 !important;
            float: right !important;
            font-family: FontAwesome;
            content: "\f068";
            padding-right: 5px;
        }

        .panel-title>a.collapsed:before {
            float: right !important;
            content: "\f067";
        }

        .panel-title>a:hover,
        .panel-title>a:active,
        .panel-title>a:focus {
            text-decoration: none;
        }

        .panel-default {
            border: 1px solid #dddee1;
            align-items: center;
            padding: 16px 10px 0px;
        }

        .panel-body {
            border: 1px solid #eee;
        }

        .available_case_btn {
            /* padding: 16px 10px 0px !important; */
        }

        .collapsed:hover {
            color: #ae0a46 !important;
        }
    </style>
    <!--=========Content Wrapper=============-->
    <section class="content_wrapper">
        <div class="page-wrapper chiller-theme toggled">
            @include('frontend.pages.client.partials.sidebar')
            <main class="page-content">
                <div class="content_wrapper">
                    <div class="container dashboard-container">
                        <div class="section_wrapper">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="my-3">
                                        <div class="profile_title pb-3">
                                            <h3>Good Day,
                                                <strong class="main_color">
                                                    {{ Auth::guard('client')->user()->name }}
                                                </strong>
                                            </h3>
                                        </div>
                                        <div class="menu-items d-flex justify-content-between"
                                            style="border-bottom: 1px solid #c0c0c0">
                                            <ul class="d-flex profile-menu mb-0">
                                                <li class=""><a href="{{ route('client.project.overview') }}"
                                                        class="pt-1">Overview</a>
                                                </li>
                                                <li class="mx-3 pb-2"><a href="{{ route('client.project') }}"
                                                        class="pt-1">Projects</a>
                                                </li>
                                                <li class="mx-3 pb-2"><a href="{{ route('client.support') }}">Support</a>
                                                </li>
                                                <li class="mx-3 pb-2"><a href="javascript:void(0);"
                                                        class="pt-1 menu-active">Support Details</a>
                                                </li>
                                                <li class="mx-3 pb-2"><a href="{{ route('client.case') }}">Support Cases</a>
                                                </li>
                                            </ul>
                                            <ul class="d-flex profile-menu mb-0">
                                                <li class="mx-3 pb-2 text-end text-black">
                                                    <a href="javascript:void(0);" title="Create Support Case"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#supportModal{{ $support->id }}"><strong>+ Create
                                                            Cases</strong>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">

                                {{-- Support Details --}}
                                <div class="col-lg-12">
                                    <div class="card rounded-0 client_card border">
                                        <div class="card-header rounded-0 border-0 p-2 card_main_support">
                                            <div class="px-3 p-2 d-flex justify-content-between">
                                                <h5 class="m-0 text-center text-white px-3 py-1 upper_title">Support Details
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row my-1">
                                                <div class="col-lg-12">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center border-bottom shadow-sm p-2 main_table_start">
                                                        <div class="d-flex ">
                                                            <p class="p-0 m-0 fw-bold main_color">Support Id</p>
                                                            <p class="p-0 m-0">:</p>
                                                            <p class="p-0 m-0 ms-2">
                                                                {{ $support->support_id }}</p>
                                                        </div>
                                                        <div class="d-flex ">
                                                            <p class="p-0 m-0 fw-bold main_color">Support Title</p>
                                                            <p class="p-0 m-0">:</p>
                                                            <p class="p-0 m-0 ms-2">
                                                                {{ $support->support_title }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-1">
                                                    <div class="row gx-1 pb-2">
                                                        <div class="col-lg-4">
                                                            <div class="rounded-0 p-0">
                                                                <div class="table-responsive border-0">
                                                                    <table class="table border-0 mb-0">
                                                                        <tbody class="border-0">
                                                                            <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1 px-2">
                                                                                    Support Type</th>
                                                                                <th width="10%"
                                                                                    class="border-0 p-1 px-2">
                                                                                    :
                                                                                </th>
                                                                                <th width="50%"
                                                                                    class="border-0 p-1 px-2">
                                                                                    @if ($support->support_type == 'amc_support')
                                                                                        <span
                                                                                            class="text-info badge-text rounded-1">
                                                                                            AMC Support
                                                                                        </span>
                                                                                    @elseif($support->support_type == 'implementation_support')
                                                                                        <span
                                                                                            class="fw-bold badge-text text-info rounded-1">
                                                                                            Implementation Support
                                                                                        </span>
                                                                                    @else
                                                                                        <span
                                                                                            class="fw-bold badge-text text-info rounded-1">
                                                                                            Others Support
                                                                                        </span>
                                                                                    @endif
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1 px-2">
                                                                                    Support Tier</th>
                                                                                <th width="10%"
                                                                                    class="border-0 p-1 px-2">
                                                                                    :
                                                                                </th>
                                                                                <th width="50%"
                                                                                    class="border-0 p-1 px-2">
                                                                                    <span
                                                                                        class="fw-bold badge-text text-black rounded-1">
                                                                                        {{ ucfirst($support->support_tier) }}
                                                                                    </span>
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1 px-2">
                                                                                    Status
                                                                                </th>
                                                                                <th width="10%"
                                                                                    class="border-0 p-1 px-2">
                                                                                    :
                                                                                </th>
                                                                                <th width="50%"
                                                                                    class="border-0 p-1 px-2">
                                                                                    @if ($support->status == 'pending')
                                                                                        <p
                                                                                            class="fw-bolder support_title_triger mb-0 badge-text text-warning">
                                                                                            Pending</p>
                                                                                    @elseif($support->status == 'on_going')
                                                                                        <p
                                                                                            class="fw-bolder support_title_triger mb-0 badge-text text-success">
                                                                                            On Going</p>
                                                                                    @else
                                                                                        <p
                                                                                            class="fw-bolder support_title_triger mb-0 badge-text text-danger">
                                                                                            Closed</p>
                                                                                    @endif
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1 px-2">
                                                                                    Support Duration</th>
                                                                                <th width="10%"
                                                                                    class="border-0 p-1 px-2">
                                                                                    :
                                                                                </th>
                                                                                <th width="50%"
                                                                                    class="border-0 p-1 px-2">
                                                                                    {{ $support->support_duration }}
                                                                                </th>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="rounded-0 p-0">
                                                                <div class="table-responsive border-0">
                                                                    <table class="table border-0 mb-0">
                                                                        <tbody class="border-0">
                                                                            <tr>
                                                                                <th width=25"
                                                                                    class="main_color border-0 p-1 px-2">
                                                                                    Scope Of Work</th>
                                                                                <th width="5%"
                                                                                    class="border-0 p-1 px-2">
                                                                                    :
                                                                                </th>
                                                                                <th width="70%"
                                                                                    class="border-0 p-1 px-2">
                                                                                    {!! $support->scope_work !!}
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="25%"
                                                                                    class="main_color border-0 p-1 px-2">
                                                                                    Support Tier Description</th>
                                                                                <th width="5%"
                                                                                    class="border-0 p-1 px-2">
                                                                                    :
                                                                                </th>
                                                                                <th width="70%"
                                                                                    class="border-0 p-1 px-2">
                                                                                    {!! $support->support_tier_description !!}
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="25%"
                                                                                    class="main_color border-0 p-1 px-2">
                                                                                    Status Description</th>
                                                                                <th width="5%"
                                                                                    class="border-0 p-1 px-2">
                                                                                    :
                                                                                </th>
                                                                                <th width="70%"
                                                                                    class="border-0 p-1 px-2">
                                                                                    {!! $support->status_description !!}
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="25%"
                                                                                    class="main_color border-0 p-1 px-2">
                                                                                    Attachments</th>
                                                                                <th width="5%"
                                                                                    class="border-0 p-1 px-2">
                                                                                    :
                                                                                </th>
                                                                                <th width="70%"
                                                                                    class="border-0 p-1 px-2">
                                                                                    @if (!empty($support->attachment))
                                                                                        <a href="{{ asset('storage/files/' . $support->attachment) }}" target="blank"
                                                                                            class="border-bottom-link text-primary">
                                                                                            <i class="fa-solid fa-file-arrow-down"></i>
                                                                                        </a>
                                                                                    @else
                                                                                        No File
                                                                                    @endif
                                                                                </th>
                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Support Details --}}


                                {{-- Support Cases --}}
                                <div class="col-lg-12">
                                    <div class="card rounded-0 client_card border">
                                        <div class="card-header rounded-0 border-0 p-2 card_main_support">
                                            <div class="px-3 p-2 d-flex justify-content-between">
                                                <h5 class="m-0 text-center text-white px-3 py-1 upper_title">
                                                    Available Support Cases
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row my-1">
                                                <div class="table-responsive px-3">
                                                    <table id="example" class="table text-center">
                                                        <thead style="background-color:#24729759 !important">
                                                            <tr>
                                                                <th width="20%" class="p-2" scope="col">Case
                                                                    ID</th>
                                                                <th width="60%" class="p-2" scope="col">
                                                                    Case Subject</th>
                                                                <th width="20%" class="p-2" scope="col">
                                                                    Created At
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($support->cases)
                                                                @foreach ($support->cases as $item)
                                                                    <tr class="clickable-row"
                                                                        onclick="window.location='{{ route('client.case.details', $item->code) }}'">
                                                                        <td>
                                                                            <span
                                                                                class="border-bottom-link">{{ $item->code }}</span>
                                                                        </td>
                                                                        <td>
                                                                            <span
                                                                                class="border-bottom-link">{{ $item->subject }}</span>
                                                                        </td>
                                                                        <td>
                                                                            <span class="border-bottom-link">
                                                                                {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                                            </span>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Support Cases --}}

                                {{-- Project Details --}}
                                <div class="col-lg-12">
                                    <div class="card rounded-0 client_card border">
                                        <div class="card-header rounded-0 border-0 p-2 card_main_support">
                                            <div class="px-3 p-2 d-flex justify-content-between">
                                                <h5 class="m-0 text-center text-white px-3 py-1 upper_title">
                                                    Associated Project Details
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row my-1">
                                                <div class="col-lg-12">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center border-bottom shadow-sm p-2 main_table_start">
                                                        <div class="d-flex ">
                                                            <p class="p-0 m-0 fw-bold main_color">Project Id</p>
                                                            <p class="p-0 m-0">:</p>
                                                            <p class="p-0 m-0 ms-2">
                                                                {{ $support->project->project_code }}</p>
                                                        </div>
                                                        <div class="d-flex ">
                                                            <p class="p-0 m-0 fw-bold main_color">Project Title</p>
                                                            <p class="p-0 m-0">:</p>
                                                            <p class="p-0 m-0 ms-2">
                                                                {{ $support->project->project_title }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-1">
                                                    <div class="row gx-1 pb-2">
                                                        <div class="col-lg-4">
                                                            <div class="rounded-0 p-0">
                                                                <div class="table-responsive border-0">
                                                                    <table class="table border-0 mb-0">
                                                                        <tbody class="border-0">
                                                                            <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1">
                                                                                    Client Name</th>
                                                                                <th width="2%" class="border-0 p-1">
                                                                                    :
                                                                                </th>
                                                                                <th width="58%" class="border-0 p-1">
                                                                                    {{ $support->project->client_name }}
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1">
                                                                                    Client Code</th>
                                                                                <th width="2%" class="border-0 p-1">
                                                                                    :
                                                                                </th>
                                                                                <th width="58%" class="border-0 p-1">
                                                                                    {{ $support->project->client_code }}
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1">
                                                                                    Duration
                                                                                </th>
                                                                                <th width="2%" class="border-0 p-1">
                                                                                    :
                                                                                </th>
                                                                                <th width="58%" class="border-0 p-1">
                                                                                    {{ $support->project->project_duration }}
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1">
                                                                                    Contact Agreement</th>
                                                                                <th width="2%" class="border-0 p-1">
                                                                                    :
                                                                                </th>
                                                                                <th width="58%" class="border-0 p-1">
                                                                                    @if (!empty($support->project->contact_agreement))
                                                                                        <a href="{{ asset('storage/files/' . $support->project->contact_agreement) }}"
                                                                                            class="main_color mx-2" title="Open File">
                                                                                            {{-- <i class="fa fa-xl fa-download me-2"></i> --}}
                                                                                            <span class="text-primary border-bottom-link">Download</span>
                                                                                        </a>
                                                                                    @else
                                                                                        <strong class="site_color">No File</strong>
                                                                                    @endif
                                                                                </th>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="rounded-0 p-0">
                                                                <div class="table-responsive border-0">
                                                                    <table class="table border-0 mb-0">
                                                                        <tbody class="border-0">
                                                                            <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1">
                                                                                    Partner Name</th>
                                                                                <th width="2%" class="border-0 p-1">
                                                                                    :
                                                                                </th>
                                                                                <th width="58%" class="border-0 p-1">
                                                                                    {{ $support->project->partner_name }}
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1">
                                                                                    Start Date</th>
                                                                                <th width="2%" class="border-0 p-1">
                                                                                    :
                                                                                </th>
                                                                                <th width="58%" class="border-0 p-1">
                                                                                    {{ $support->project->create_time }}
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1">
                                                                                    Team Membar</th>
                                                                                <th width="2%" class="border-0 p-1">
                                                                                    :
                                                                                </th>
                                                                                <th width="58%" class="border-0 p-1">
                                                                                    {{ $support->project->team_member }}
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1">
                                                                                    Order Number</th>
                                                                                <th width="2%" class="border-0 p-1">
                                                                                    :
                                                                                </th>
                                                                                <th width="58%" class="border-0 p-1">
                                                                                    {{ $support->project->order_id }}
                                                                                </th>
                                                                            </tr>
                                                                            {{-- <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1"
                                                                                    title="Partner Primary Contact">Partner
                                                                                </th>
                                                                                <th width="2%" class="border-0 p-1">:
                                                                                </th>
                                                                                <th width="58%" class="border-0 p-1">
                                                                                    01568565</th>
                                                                            </tr> --}}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4"
                                                            style="border-left: border-left: 2px solid #d0cece;">
                                                            <div class="rounded-0 p-0">
                                                                <div class="table-responsive border-0">
                                                                    <table class="table border-0 mb-0">
                                                                        <tbody class="border-0">
                                                                            <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1">
                                                                                    Industry Name</th>
                                                                                <th width="2%" class="border-0 p-1">:
                                                                                </th>
                                                                                <th width="58%" class="border-0 p-1">
                                                                                    {{ $support->project->industry->title }}
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1">
                                                                                    End Date</th>
                                                                                <th width="2%" class="border-0 p-1">:
                                                                                </th>
                                                                                <th width="58%" class="border-0 p-1">
                                                                                    {{ $support->project->closed_time }}
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1">
                                                                                    Order Date</th>
                                                                                <th width="2%" class="border-0 p-1">:
                                                                                </th>
                                                                                <th width="58%" class="border-0 p-1">
                                                                                    {{ $support->project->order_date }}
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="40%"
                                                                                    class="main_color border-0 p-1">
                                                                                    Status
                                                                                </th>
                                                                                <th width="2%" class="border-0 p-1">:
                                                                                </th>
                                                                                <th width="58%" class="border-0 p-1">
                                                                                    <span class="fw-bold badge-text text-success">
                                                                                        {{ ucfirst($support->project->status) }}
                                                                                    </span>
                                                                                </th>
                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Project Details --}}



                                {{-- <div class="card rounded-0 my-4 py-4"
                                    style="border: 1px solid #eee;box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; ">
                                    <div class="card-body m-lg-1 m-sm-0 bg-transparent">
                                        <div class="row shadow-lg bg-white" style="">
                                            <div class="col-lg-10">
                                                <div class="area-container mb-1 ">
                                                    <p class="fw-bold bg-dark p-1 text-white text-center"
                                                        style="width:10rem; margin-top: -26px">
                                                        History</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 table-responsive">
                                                <div class="row">
                                                    <div class="col-lg-12 pb-3">
                                                        <div class="panel-group" id="accordion" role="tablist"
                                                            aria-multiselectable="true">
                                                            <div class="panel panel-default mb-2">
                                                                <div class="panel-heading" role="tab"
                                                                    id="headingTwo">
                                                                    <p class="panel-title">
                                                                        <a class="collapsed" data-toggle="collapse"
                                                                            data-parent="#accordion" href="#collapseTwo"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapseTwo">
                                                                            Previous Supports
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                                <div id="collapseTwo" class="panel-collapse collapse"
                                                                    role="tabpanel" aria-labelledby="headingTwo">
                                                                    <div class="panel-body mb-2">
                                                                        <div
                                                                            class="d-flex justify-content-center align-items-center">
                                                                            <p class="p-2 m-0"> <i
                                                                                    class="fa-regular fa-face-smile me-2 main_color"></i>
                                                                                No Data Available</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading" role="tab"
                                                                    id="headingTwo">
                                                                    <p class="panel-title">
                                                                        <a class="collapsed" data-toggle="collapse"
                                                                            data-parent="#accordion" href="#collapsethree"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapsethree">
                                                                            Previous Support Cases
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                                <div id="collapsethree" class="panel-collapse collapse"
                                                                    role="tabpanel" aria-labelledby="headingTwo">
                                                                    <div class="panel-body mb-2">
                                                                        <div
                                                                            class="d-flex justify-content-center align-items-center">
                                                                            <p class="p-2 m-0"> <i
                                                                                    class="fa-regular fa-face-smile me-2 main_color"></i>
                                                                                No Data Available</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            {{-- @include('frontend.pages.client.partials.case_modal') --}}
                        </div>
                    </div>
                </div>
            </main>

            <div id="supportModal{{ $support->id }}" class="modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content rounded-0">
                        <form class="needs-validation" method="POST" action="{{ route('client.case.store') }}"
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="modal-header py-1 border-bottom shadow-sm pe-4">
                                <h5 class="modal-title text-center">Create Support Case</h5>
                                <button type="button" class="close" data-bs-dismiss="modal">
                                    <i class="fa-solid fa-xmark main_color fs-3"></i>
                                </button>
                            </div>
                            <div class="modal-body px-5">
                                <div class="row mb-2 gx-1">
                                    <div class="col-lg-6">
                                        <label for="validationCustom02" class="form-label">
                                            Support Title:
                                        </label>
                                        <p class="support_title_triger fw-bold" style="font-size: 12px !important;">
                                            {{ $support->support_title }}</p>

                                        <input type="hidden" name="client_id"
                                            value="{{ Auth::guard('client')->user()->id }}">
                                        <input type="hidden" name="support_id" value="{{ $support->id }}">
                                        {{-- <input type="hidden" name="country" value="{{ $project->country->country_name }}"> --}}
                                        <input type="hidden" name="name"
                                            value="{{ Auth::guard('client')->user()->name }}">
                                        <input type="hidden" name="email"
                                            value="{{ Auth::guard('client')->user()->email }}">
                                        <input type="hidden" name="phone"
                                            value="{{ Auth::guard('client')->user()->phone }}">
                                        <input type="hidden" name="company"
                                            value="{{ Auth::guard('client')->user()->company_name }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="validationCustom01" class="form-label">
                                            Support Category
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select form-select-sm border" id="validationCustom01"
                                            name="msg_category" data-placeholder="Select Support Category"
                                            data-allow-clear="true" required>
                                            <option></option>
                                            <option value="web">Web</option>
                                            <option value="apps">Apps</option>
                                            <option value="domain">Domain</option>
                                            <option value="hosting">Hosting</option>
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide a valid Category.
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="validationCustom02" class="form-label">
                                            Problem Type <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select form-select-sm border" id="validationCustom02"
                                            data-placeholder="Select Problem Type" data-allow-clear="true"
                                            name="msg_type"required>
                                            <option></option>
                                            <option value="bug_fixing">Bug Fixing</option>
                                            <option value="design_issue">Design Issue</option>
                                            <option value="additional_development">Additional Development</option>
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide a valid Problem Type.
                                        </div>
                                    </div>

                                    <div class="col-lg-1 my-2">
                                        <label for="validationCustom02" class="form-label mt-3">
                                            Sub <span class="text-danger">*</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-5 my-2 pt-2">
                                        <input type="text" class="form-control form-control-sm border-0"
                                            style="border-bottom: 1px solid #999898 !important;"
                                            placeholder="Case Subject" id="validationCustom03" name="subject" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide a Subject.
                                        </div>
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <div class="d-flex align-items-center ms-2"
                                            style="border-bottom: 1px solid #999898 !important;margin-top: 16px;">
                                            <p class="p-0 m-0">CC :</p>
                                            @php
                                                $teams = App\Models\Client\ClientTeam::where('client_id', Auth::guard('client')->user()->id)->get();
                                            @endphp
                                            <div class="d-flex">
                                                @foreach ($teams as $team)
                                                    <div class="form-check form-check-inline mx-2 my-2">
                                                        <input class="form-check-input" type="checkbox"
                                                            style="left: 30px; top:5px;"  name="mail_cc[]"
                                                            id="inlineCheckbox{{ $team->id }}"
                                                            value="{{ $team->email }}">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox{{ $team->id }}">{{ $team->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row align-items-center mb-3">
                                    <div class="col-lg-12">
                                        <label for="validationCustom04">Message <span class="text-danger">*</span></label>
                                        <br>
                                        <textarea name="message" class="form-control border-0" id="" rows="3" id="validationCustom04"
                                            required style="border-bottom: 1px solid #999898 !important;"></textarea>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide a Message.
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3 gx-1">
                                    <div class="col-lg-2">
                                        <label for="validationCustom05" class="form-label">
                                            Attachment
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="file" class="form-control" id="validationCustom05"
                                            multiple="multiple" name="attachment[]">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn-color">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-wrapper" -->
    </section>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#exampleProject').DataTable();
            $('#exampleSupport').DataTable();
        });
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')
            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
@endsection
