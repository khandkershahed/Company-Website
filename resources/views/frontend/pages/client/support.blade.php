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
                                                <li class="mx-3 pb-2 text-end text-black"><a href="javascript:void(0);"
                                                        title="Create Support Case" data-bs-toggle="modal"
                                                        data-bs-target="#casecommonmodal"><strong>+ Create Cases</strong>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card m-0 mb-3 rounded-0 p-3 shadow-sm border-0">
                                        <h3 style="font-family: 'system-ui';">My Supports</h3>
                                        <p style="text-align: justify;font-family: 'system-ui';">
                                            This section will show the list of all supports and details. You will be able to
                                            get the support details from the lists in the table. You can see the
                                            notification on the top right corner and support cases from each support
                                            section. Even you can create support cases directly.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-lg-12">
                                    <div class="card rounded-0 shadow-sm border-0">
                                        <div class="card-header rounded-0 border-0 p-2 card_main_support">
                                            <div class="px-3 p-2 d-flex justify-content-between">
                                                <h5 class="m-0 text-center text-white px-3 py-1 upper_title">All Supports
                                                </h5>
                                                {{-- <p class="m-0 text-center text-white px-3 py-1 upper_title">
                                                    <i class="fa-solid fa-plus text-white"></i>
                                                    <a href="" class="text-white border-bottom">Create Support</a>
                                                </p> --}}
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-lg-12 p-0">
                                                <div class="table-responsive p-2">
                                                    <table class="table supportDT text-center table-striped table-hover">
                                                        <thead style="background-color:#24729759 !important">
                                                            <tr>
                                                                <th width="15%">Support ID</th>
                                                                <th width="15%">Support Type</th>
                                                                <th width="10%">Project ID</th>
                                                                <th width="50%">Title</th>
                                                                <th width="10%">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($supports)
                                                                @foreach ($supports as $key => $support)
                                                                    <tr
                                                                        onclick="window.location='{{ route('client.support.details', $support->support_id) }}'">

                                                                        <td>
                                                                            <span
                                                                                class="border-bottom-link">{{ $support->support_id }}</span>
                                                                        </td>
                                                                        <td>
                                                                            <span class="border-bottom-link">
                                                                                @if ($support->support_type == 'amc_support')
                                                                                    <span
                                                                                        class="text-primary badge-text rounded-1">AMC
                                                                                        Support</span>
                                                                                @elseif($support->support_type == 'implementation_support')
                                                                                    <span
                                                                                        class="fw-bold badge-text text-primary rounded-1">Implementation
                                                                                        Support</span>
                                                                                @else
                                                                                    <span
                                                                                        class="fw-bold badge-text text-primary rounded-1">Others
                                                                                        Support</span>
                                                                                @endif
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <span
                                                                                class="border-bottom-link">{{ App\Models\Client\Project::whereId($support->project_id)->value('project_code') }}
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <span
                                                                                class="border-bottom-link">{{ $support->support_title }}</span>
                                                                        </td>
                                                                        <td>
                                                                            {{-- <span class="border-bottom-link"> --}}
                                                                            @if ($support->status == 'pending')
                                                                                <span
                                                                                    class="fw-bold badge-text text-warning">Pending</span>
                                                                            @elseif($support->status == 'on_going')
                                                                                <span
                                                                                    class="fw-bold badge-text text-success">On
                                                                                    Going</span>
                                                                            @else
                                                                                <span
                                                                                    class="fw-bold badge-text text-danger">Closed</span>
                                                                            @endif
                                                                            {{-- </span> --}}
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
            Array.prototype.slice.call(forms).forEach(function(form) {
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
