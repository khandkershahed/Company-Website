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
