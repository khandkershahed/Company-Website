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
                                    <li class=""><a href="{{ route('client.project.overview') }}"
                                            class="pt-1">Overview</a>
                                    </li>
                                    <li class="mx-3 pb-2"><a href="{{ route('client.project') }}"
                                            class="pt-1 menu-active">Projects</a>
                                    </li>
                                    <li class="mx-3 pb-2"><a href="{{ route('client.support') }}">Support</a>
                                    </li>
                                    <li class="mx-3 pb-2"><a href="{{ route('client.case') }}">Support Cases</a>
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
                        <div class="card m-0 mb-3 rounded-0 p-3 border-0 shadow-sm">
                            <h3 style="font-family: 'system-ui';">My Projects</h3>
                            <p style="text-align: justify;font-family: 'system-ui';">
                                This Project detail section will show the list of all projects and related
                                support. You can get details of each project or ongoing support links.
                                Additionally, you will get project related agreements and documents.Moreover,
                                you will also get the projects and support history. You also can create ‘case’
                                directly from here.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-lg-12">
                        <div class="card rounded-0 shadow-sm border-0">
                            <div class="card-header rounded-0 border-0 p-2 card_main_support">
                                <div class="px-3 p-2 d-flex justify-content-between">
                                    <h5 class="m-0 text-center text-white px-3 py-1 upper_title">All Projects
                                    </h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12 p-0">
                                    <div class="table-responsive px-3">
                                        <table class="table text-center">
                                            <thead style="background-color:#24729759 !important">
                                                <tr>
                                                    <th width="13%">Project ID</th>
                                                    <th width="50%">Name</th>
                                                    <th width="24%">Order Number</th>
                                                    <th width="13%">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($projects)
                                                @foreach ($projects as $key => $project)
                                                <tr class="clickable-row"
                                                    onclick="window.location='{{ route('client.project.details', $project->slug) }}'">
                                                    <td><span
                                                            class="border-bottom-link">{{ $project->project_code }}</span>
                                                    </td>
                                                    <td><span
                                                            class="border-bottom-link">{{ $project->project_title }}</span>
                                                    </td>
                                                    <td><span
                                                            class="border-bottom-link">{{ $project->order_id }}</span>
                                                    </td>
                                                    <td><span
                                                            class="badge bg-success rounded-1">{{ ucfirst($project->status) }}</span>
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