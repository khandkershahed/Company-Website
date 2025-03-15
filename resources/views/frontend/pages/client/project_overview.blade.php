@extends('frontend.master')
@section('content')
    <!--=========Content Wrapper=============-->
    <section class="content_wrapper">
        <div class="page-wrapper chiller-theme toggled">
            @include('frontend.pages.client.partials.sidebar')
            <main class="page-content">
                <div class="content_wrapper">
                    <div class="container dashboard-container">
                        <div class="section_wrapper">
                            @include('frontend.pages.client.partials.navbar')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card rounded-0 client_card border">
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
                                {{-- support table start --}}
                                <div class="col-lg-12">
                                    <div class="card rounded-0 client_card border">
                                        <div class="card-header rounded-0 border-0 p-2 card_main_support">
                                            <div class="px-3 p-2 d-flex justify-content-between">
                                                <h5 class="m-0 text-center text-white px-3 py-1 upper_title">All
                                                    Supports</h5>
                                                {{-- <p class="m-0 text-center text-white px-3 py-1 upper_title">
                                                    <i class="fa-solid fa-plus text-white"></i>
                                                    <a href="" class="text-white border-bottom">Create
                                                        Support</a>
                                                </p> --}}
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-lg-12 p-0">
                                                <div class="table-responsive p-2">
                                                    <table class="table supportDT text-center">
                                                        <thead style="background-color:#24729759 !important">
                                                            <tr>
                                                                <th width="10%">Project ID</th>
                                                                <th width="15%">Support ID</th>
                                                                <th width="15%">Support Type</th>
                                                                <th width="50%">Title</th>
                                                                <th width="10%">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($supports)
                                                                @foreach ($supports as $key => $support)
                                                                    <tr>
                                                                        <td>
                                                                            <span
                                                                                class="border-bottom-link">{{ App\Models\Client\Project::whereId($support->project_id)->value('project_code') }}
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <span
                                                                                class="border-bottom-link">{{ $support->support_id }}</span>
                                                                        </td>
                                                                        <td>
                                                                            <span class="border-bottom-link">
                                                                                @if ($support->support_type == 'amc_support')
                                                                                    <span
                                                                                        class="text-info badge-text rounded-1">AMC
                                                                                        Support</span>
                                                                                @elseif($support->support_type == 'implementation_support')
                                                                                    <span
                                                                                        class="fw-bold badge-text text-info rounded-1">Implementation
                                                                                        Support</span>
                                                                                @else
                                                                                    <span
                                                                                        class="fw-bold badge-text text-info rounded-1">Others
                                                                                        Support</span>
                                                                                @endif
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
                                {{-- support table end --}}
                                {{-- support case table start --}}
                                <div class="col-lg-12">
                                    <div class="card rounded-0 client_card border">
                                        <div class="card-header rounded-0 border-0 p-2 card_main_support">
                                            <div class="px-3 p-2 d-flex justify-content-between">
                                                <h5 class="m-0 text-center text-white px-3 py-1 upper_title">All
                                                    Support Cases
                                                </h5>
                                                <p class="m-0 text-center text-white px-3 py-1 upper_title">
                                                    <i class="fa-solid fa-plus text-white"></i>
                                                    <a href="javascript:void(0);" title="Create Support Case"
                                                        data-bs-toggle="modal" data-bs-target="#casecommonmodal"><strong class="text-white"> Create
                                                            Cases</strong>
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
                                                                <th width="10%">Project ID</th>
                                                                <th width="15%">Support ID</th>
                                                                <th width="15%">Case ID</th>
                                                                <th width="45%">Subject</th>
                                                                <th width="15%">Created At</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                            @if ($cases)
                                                                @foreach ($cases as $key => $case)
                                                                    <tr class="cliackable-row"
                                                                        onclick="window.location='{{ route('client.case.details', $case->code) }}'">
                                                                        <td><span
                                                                                class="border-bottom-link">{{ App\Models\Client\Project::whereId($case->project_id)->value('project_code') }}
                                                                            </span></td>
                                                                        <td><span
                                                                                class="border-bottom-link">{{ App\Models\Client\ClientSupport::whereId($case->support_id)->value('support_id') }}</span>
                                                                        </td>
                                                                        <td><span class="border-bottom-link">
                                                                                {{ $case->code }}</span>
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
                                {{-- support case table end --}}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
