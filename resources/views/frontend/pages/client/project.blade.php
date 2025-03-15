@extends('frontend.master')
@section('content')
    <!--=========Content Wrapper=============-->
    <section class="content_wrapper">
        <div class="page-wrapper chiller-theme toggled">
            @include('frontend.pages.client.partials.sidebar')
            <main class="page-content">
                <div class="content_wrapper">
                    <div class="container dashboard-container">
                        <div class="section_wrapper" style="min-height: 100vh;">
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
            </main>
            @include('frontend.pages.client.partials.case_modal')
            <!-- Modal -->
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
