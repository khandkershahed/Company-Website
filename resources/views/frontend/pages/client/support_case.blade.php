@extends('frontend.master')
@section('content')
<style>
    /* NAVBAR */
    .navbar {
        padding: 15px 10px;
        background: #fff;
        border: none;
        border-radius: 0;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .navbar-btn {
        box-shadow: none;
        outline: none !important;
        border: none;
    }

    /* LINE */
    .line {
        width: 100%;
        height: 1px;
        border-bottom: 1px dashed #ddd;
        margin: 40px 0;
    }

    /* WRAPPER */
    .wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
        perspective: 1500px;
    }

    /* SIDEBAR */
    #sidebar {
        min-width: 250px;
        max-width: 250px;
        background: #f8f9fb;
        color: #000;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* Changed from 100vh */
        transition: all 0.6s cubic-bezier(0.945, 0.02, 0.27, 0.665);
    }

    #sidebar .sidebar-header {
        padding: 20px !important;
    }

    #sidebar ul.components {
        /* padding: 20px 20px 0 20px; */
        margin: 0;
    }

    #sidebar ul li a {
        display: flex;
        font-size: 1rem;
        line-height: 1.5rem;
        padding: 10px 30px;
        margin-bottom: 0.3125rem;
        position: relative;
    }

    #sidebar ul li a:hover {
        background: #fff;
    }

    #sidebar ul li.active>a {
        background: #ae0a46;
        color: #fff;
    }

    /* SIDEBAR TOGGLE */
    #sidebar.active {
        margin-left: -250px;
        transform: rotateY(100deg);
    }

    /* DROPDOWN */
    .dropdown-toggle {
        padding-right: 15px;
    }

    a[aria-expanded="true"] {
        background: #fff;
    }

    a[aria-expanded="true"]::after {
        transform: translateY(-50%) rotate(0deg) !important;
    }

    a[data-toggle="collapse"] {
        position: relative;
    }

    .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 5px;
        transform: translateY(-50%);
    }

    /* CTAs */
    ul.CTAs {
        padding: 20px;
    }

    ul.CTAs a {
        text-align: center;
        font-size: 0.9em !important;
        display: block;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    a.download {
        background: #fff;
        color: #7386d5;
    }

    a.article {
        background: #6d7fcc !important;
        color: #fff !important;
    }

    a.article:hover {
        background: #6d7fcc !important;
        color: #fff !important;
    }

    .list_dashboard {
        margin-bottom: 8px;
    }

    /* CONTENT */
    #content {
        width: 100%;
        min-height: 100vh;
        transition: all 0.3s;
    }

    /* SIDEBAR COLLAPSE BUTTON */
    #sidebarCollapse {
        width: 40px;
        height: 40px;
        background: #f5f5f5;
        cursor: pointer;
    }

    #sidebarCollapse span {
        width: 80%;
        height: 2px;
        margin: 0 auto;
        display: block;
        background: #ae0a46;
        transition: all 0.8s cubic-bezier(0.81, -0.33, 0.345, 1.375);
        transition-delay: 0.2s;
    }

    /* Remove default Bootstrap arrow */
    .dropdown-toggle::after {
        display: none !important;
    }

    /* Style the custom icon */
    .dropdown-toggle i {
        float: right;
        /* place icon on the right */
        transition: transform 0.3s;
    }

    /* Rotate icon when expanded */
    .dropdown-toggle[aria-expanded="false"] i {
        transform: rotate(-90deg);
        /* right → down */
    }

    .dropdown-toggle[aria-expanded="true"] i {
        transform: rotate(0deg);
        /* right → down */
    }

    #sidebarCollapse span:first-of-type {
        transform: rotate(45deg) translate(2px, 2px);
    }

    #sidebarCollapse span:nth-of-type(2) {
        opacity: 0;
    }

    #sidebarCollapse span:last-of-type {
        transform: rotate(-45deg) translate(1px, -1px);
    }

    #sidebarCollapse.active span {
        transform: none;
        opacity: 1;
        margin: 5px auto;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        #sidebar {
            margin-left: -250px;
            transform: rotateY(90deg);
        }

        #sidebar.active {
            margin-left: 0;
            transform: none;
        }

        #sidebarCollapse span {
            transform: none;
            opacity: 1;
            margin: 5px auto;
        }

        #sidebarCollapse.active span:first-of-type {
            transform: rotate(45deg) translate(2px, 2px);
        }

        #sidebarCollapse.active span:nth-of-type(2) {
            opacity: 0;
        }

        #sidebarCollapse.active span:last-of-type {
            transform: rotate(-45deg) translate(1px, -1px);
        }
    }

    .nav-tabs .nav-item .user-tab {
        border: 0 !important;
    }
</style>
<div class="container-fliud">
    <div class="wrapper">
        <!-- Sidebar Holder -->
        @include('frontend.pages.client.partials.sidebar')

        <!-- Page Content Holder -->
        <div id="content">
            <header class="mb-3">
                <div class="container-fluid ps-0">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </header>
            <div class="container px-4">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="my-3">
                            <div class="profile_title pb-3">
                                <h3>Good Day, <strong
                                        class="main_color">{{ Auth::guard('client')->user()->name }}</strong>
                                </h3>
                            </div>
                            <div class="menu-items d-flex justify-content-between"
                                style="border-bottom: 1px solid #c0c0c0">
                                <ul class="d-flex profile-menu mb-0">
                                    <li class="">
                                        <a href="{{ route('client.project.overview') }}"
                                            class="pt-1 {{ Route::current()->getName() == 'client.project.overview' ? 'menu-active' : '' }}">
                                            Overview
                                        </a>
                                    </li>
                                    <li class="mx-3 pb-2">
                                        <a href="{{ route('client.project') }}"
                                            class="pt-1 {{ Route::current()->getName() == 'client.project' ? 'menu-active' : '' }} {{ Route::current()->getName() == 'client.project.details' ? 'menu-active' : '' }}">
                                            Projects
                                        </a>
                                    </li>
                                    <li class="mx-3 pb-2">
                                        <a href="{{ route('client.support') }}"
                                            class="pt-1 {{ Route::current()->getName() == 'client.support' ? 'menu-active' : '' }} {{ Route::current()->getName() == 'client.support.details' ? 'menu-active' : '' }}">
                                            Support
                                        </a>
                                    </li>
                                    <li class="mx-3 pb-2">
                                        <a href="{{ route('client.case') }}"
                                            class="pt-1 {{ Route::current()->getName() == 'client.case' ? 'menu-active' : '' }} {{ Route::current()->getName() == 'client.case.details' ? 'menu-active' : '' }}">
                                            Support Cases
                                        </a>
                                    </li>

                                </ul>
                                <ul class="d-flex profile-menu mb-0">
                                    <li class="mx-3 pb-2 text-end text-black">
                                        <a href="javascript:void(0);" title="Create Support Case"
                                            data-bs-toggle="modal" data-bs-target="#casecommonmodal"><strong>+ Create
                                                Cases</strong>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card m-0 mb-3 rounded-0 p-3"
                            style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;">
                            <h3 style="font-family: 'system-ui';">My Support Cases</h3>
                            <p style="text-align: justify;font-family: 'system-ui';">
                                This section will show all ongoing support cases. Each support case details will
                                take you to the message page where you can communicate and reply to each of the
                                created cases. You can upload files and keep cc to your co-workers. Beside that
                                you can create links from other tools and share the link as usual.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card rounded-0 client_card border">
                            <div class="card-header rounded-0 border-0 p-2 card_main_support">
                                <div class="px-3 p-2 d-flex justify-content-between">
                                    <h5 class="m-0 text-center text-white px-3 py-1 upper_title">All Support
                                        Cases
                                    </h5>
                                    <p class="m-0 text-center text-white px-3 py-1 upper_title">
                                        <i class="fa-solid fa-plus text-white"></i>
                                        <a href="javascript:void(0);" class="text-white border-bottom"
                                            title="Create Support Case" data-bs-toggle="modal"
                                            data-bs-target="#casecommonmodal">Create Support
                                            Case
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12 p-0">
                                    <div class="table-responsive p-2">
                                        <table class="table supportDT table-striped table-hover text-center">
                                            <thead style="background-color:#24729759 !important">
                                                <tr>
                                                    <th width="15%">Case ID</th>
                                                    <th width="15%">Support ID</th>
                                                    <th width="13%">Project ID</th>
                                                    <th width="42%">Subject</th>
                                                    <th width="15%">Created At</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                @if ($cases)
                                                @foreach ($cases as $key => $case)
                                                <tr class="cliackable-row"
                                                    onclick="window.location='{{ route('client.case.details', $case->code) }}'">
                                                    <td>
                                                        <span class="border-bottom-link">
                                                            {{ $case->code }}</span>
                                                    </td>
                                                    <td><span
                                                            class="border-bottom-link">{{ App\Models\Client\Project::whereId($case->project_id)->value('project_code') }}
                                                        </span></td>
                                                    <td><span
                                                            class="border-bottom-link">{{ App\Models\Client\ClientSupport::whereId($case->support_id)->value('support_id') }}</span>
                                                    </td>

                                                    <td><span
                                                            class="border-bottom-link">{{ $case->subject }}</span>
                                                    </td>
                                                    <td>
                                                        {{ \Carbon\Carbon::parse($case->created_at)->diffForHumans() }}
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
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.pages.client.partials.case_modal')
@endsection
@section('scripts')
<script type="text/javascript">
    $('.supportDT').DataTable({
        "dom": 'ftp',
        "iDisplayLength": 10,
        "lengthMenu": false,
        columnDefs: [{
            orderable: false,
            targets: [0, 1, 2, 3],
        }, ],
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