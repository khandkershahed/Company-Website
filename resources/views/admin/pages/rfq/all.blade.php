@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <div class="shadow page-header page-header-light">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="py-2 breadcrumb">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <span class="breadcrumb-item active">RFQ Management</span>
                    </div>

                    <a href="#breadcrumb_elements"
                        class="p-0 border-transparent btn btn-light align-self-center collapsed d-lg-none rounded-pill ms-auto"
                        data-bs-toggle="collapse">
                        <i class="m-1 ph-caret-down collapsible-indicator ph-sm"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="py-10 pt-5 content container-fluid">
            <div class="row gx-8 gx-xl-10">
                <div class="mb-5 row">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-fill">
                                    <h4 class="mb-0 text-info">Total RFQs</h4>
                                    <span class="text-muted">{{ date('d M , Y') }}</span>
                                </div>

                                <h1 class="mb-0 ms-3">{{ $rfq_count }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-fill">
                                    <h4 class="mb-0 text-info">RFQ Status</h4>
                                </div>
                                <div class="flex-fill">
                                    <p class="m-0 mb-2 d-flex justify-content-between">
                                        <span class="fw-bolder">Pending :</span>
                                        <span class="badge bg-warning ms-3 fs-6 text-end">{{ $rfqs->count() }}</span>
                                    </p>
                                    <p class="m-0 mb-2 d-flex justify-content-between">
                                        <span class="fw-bolder">Quoted :</span>
                                        <span class="badge bg-success ms-3 fs-6 text-end">{{ $quoteds->count() }}</span>
                                    </p>
                                    <p class="m-0 mb-2 d-flex justify-content-between">
                                        <span class="fw-bolder">Failed :</span>
                                        <span class="badge bg-danger ms-3 fs-6 text-end">{{ $losts->count() }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="py-2 card-header">
                                <h6 class="mb-0 card-title">Notifications</h6>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    {{-- @if ($leave_applications->count() > 0)
                                        @foreach ($leave_applications as $leave_application)
                                            @if ($leave_application->status === 'pending')
                                                <p class="p-0 mb-2">
                                                    <a
                                                        href="{{ route('leave-application.edit', $leave_application->id) }}">
                                                        <i class="fa-solid fa-bell ammount rounded-1 pe-2 me-2"></i>{{ $leave_application->name }}
                                                        has applied for a leave.
                                                    </a>
                                                </p>
                                            @endif
                                        @endforeach
                                    @else --}}
                                    <div class="row">
                                        <h5 class="mb-0 text-center fs-6">No RFQ Notification</h5>
                                    </div>
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="mb-2 row">
                    <div class="m-auto card w-lg-75">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="text-gray-800 card-label fw-bold">RFQ Filtered Details</span>
                                        <span class="mt-1 text-gray-500 fw-semibold fs-6">Check All RFQ History Here!</span>
                                    </h3>
                                </div>
                                <div class="col-lg-7 text-end">
                                    <ul class="border-0 nav nav-tabs nav-line-tabs fs-6 rfq-tabs">
                                        <li class="nav-item">
                                            <a class="px-4 nav-link active" data-bs-toggle="tab"
                                                href="#kt_tab_pane_1">Pending</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="px-4 nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Quoted</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="px-4 nav-link" data-bs-toggle="tab" href="#kt_tab_pane_3">Failed</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="px-4 nav-link" data-bs-toggle="tab" href="#kt_tab_pane_4">Approved</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="defaultDiv" class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <!--begin::Block-->
                                            <div class="py-5">
                                                <div class="rounded d-flex flex-column flex-md-row">
                                                    <ul class="border-0 nav nav-tabs nav-pills">
                                                        <li class="nav-item w-100 me-0 mb-md-2">
                                                            <a class="border nav-link w-100 active btn btn-flex btn-active-primary"
                                                                data-bs-toggle="tab" href="#kt_vtab_pane_4">
                                                                <i class="fa-regular fa-file fs-2 text-primary pe-3"
                                                                    aria-hidden="true"></i>
                                                                <div class="row w-100">
                                                                    <div class="col-sm-12">
                                                                        <div class="d-flex justify-content-between">
                                                                            <span class="fs-7 fw-bold">Brothers IT</span>
                                                                            <span class="fs-7">#14568RFQ</span>
                                                                        </div>
                                                                        <div class="d-flex justify-content-between">
                                                                            <span class="fs-7 fw-bold">25 Aug 24</span>
                                                                            <span class="fs-7">05:00pm</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                    <div class="border rounded tab-content w-100" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="kt_vtab_pane_4"
                                                            role="tabpanel">
                                                            <div class="d-flex flex-column justify-content-center align-items-center"
                                                                style="height: 50vh;">
                                                                <div class="pb-5 text-center">
                                                                    <h1 class="pb-5">View The RFQ</h1>
                                                                    <p class="mx-auto w-50">We invite you to submit a detailed
                                                                        quote for the requested products/services. Please include
                                                                        comprehensive pricing, payment terms, delivery schedules,
                                                                        and any applicable discounts. Ensure that all relevant
                                                                        specifications, warranties, and certifications are clearly
                                                                        mentioned. We encourage you to provide the most competitive
                                                                        offer while maintaining high standards of quality and
                                                                        service. All quotations should be submitted by [due date].
                                                                        Should you have any questions or need further clarification,
                                                                        feel free to reach out to us.</p>
                                                                </div>
                                                                <div>
                                                                    <button class="btn btn-primary me-2"><i
                                                                            class="fa-solid fa-signs-post pe-2"
                                                                            aria-hidden="true"></i>Bypass</button>
                                                                    <button class="btn btn-primary"><i
                                                                            class="fa-regular fa-handshake pe-2"
                                                                            aria-hidden="true"></i> Deal</button>
                                                                    <button class="btn btn-primary"><i
                                                                            class="fa-regular fa-pen-to-square pe-2"
                                                                            aria-hidden="true"></i>Edit</button>
                                                                    <button class="btn btn-primary"><i
                                                                            class="fa-solid fa-expand pe-2"
                                                                            aria-hidden="true"></i>View</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane fade" id="kt_vtab_pane_5" role="tabpanel">
                                                            <p>Nulla est ullamco ut irure incididunt nulla
                                                                Lorem Lorem minim irure officia enim
                                                                reprehenderit. Magna duis labore cillum sint
                                                                adipisicing exercitation ipsum. Nostrud ut
                                                                anim non exercitation velit laboris fugiat
                                                                cupidatat. Commodo esse dolore fugiat sint
                                                                velit ullamco magna consequat voluptate
                                                                minim amet aliquip ipsum aute laboris nisi.
                                                                Labore labore veniam irure irure ipsum
                                                                pariatur mollit magna in cupidatat dolore
                                                                magna irure esse tempor ad mollit. Dolore
                                                                commodo nulla minim amet ipsum officia
                                                                consectetur amet ullamco voluptate nisi
                                                                commodo ea sit eu.</p>
                                                        </div>

                                                        <div class="tab-pane fade" id="kt_vtab_pane_6" role="tabpanel">
                                                            <p>
                                                                Sint sit mollit irure quis est nostrud
                                                                cillum consequat Lorem esse do quis dolor
                                                                esse fugiat sunt do. Eu ex commodo veniam
                                                                Lorem aliquip laborum occaecat qui Lorem
                                                                esse mollit dolore anim cupidatat. eserunt
                                                                officia id Lorem nostrud aute id commodo
                                                                elit eiusmod enim irure amet eiusmod qui
                                                                reprehenderit nostrud tempor. Fugiat ipsum
                                                                excepteur in aliqua non et quis aliquip ad
                                                                irure in labore cillum elit enim. Consequat
                                                                aliquip incididunt ipsum et minim laborum
                                                                laborum laborum et cillum labore. Deserunt
                                                                adipisicing cillum id nulla minim nostrud
                                                                labore eiusmod et amet.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Block-->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-4">List</div>
                                        <div class="col-xl-8">
                                            <h1>View</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-4">List</div>
                                        <div class="col-xl-8">
                                            <h1>View</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-4">List</div>
                                        <div class="col-xl-8">
                                            <h1>View</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Content End -->
        </div>
    </div>
    <!-- /content area -->
@endsection

@once
    @push('scripts')
        <script type="text/javascript">
            // $(document).ready(function() {
            //     $('.rfqDT1').DataTable({
            //         dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            //         "iDisplayLength": 10,
            //         "lengthMenu": [10, 26, 30, 50],
            //         columnDefs: [{
            //             orderable: false,
            //             targets: [5],
            //         }, ],
            //     });
            //     $('.rfqDT2').DataTable({
            //         dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            //         "iDisplayLength": 10,
            //         "lengthMenu": [10, 26, 30, 50],
            //         columnDefs: [{
            //             orderable: false,
            //             targets: [1, 2, 3, 4, 6],
            //         }, ],
            //     });
            // });
        </script>
        <script>
            $(document).ready(function() {
                $(".cat-tab1").click(function() {
                    $("#cat-tab2").addClass('d-none');
                    $("#cat-tab1").removeClass('d-none');
                    $(".saved_title").removeClass('d-none');
                    $(".completed_title").addClass('d-none');
                });
                $(".cat-tab2").click(function() {
                    $("#cat-tab1").addClass('d-none');
                    $("#cat-tab2").removeClass('d-none');
                    $(".saved_title").addClass('d-none');
                    $(".completed_title").removeClass('d-none');
                });

            });
        </script>
        <script>
            $(document).ready(function() {
                $('.editRfquser').click(function() {
                    $(".Rfquser").toggle(this.checked);
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $(".data_table").DataTable({
                    language: {
                        lengthMenu: "Show _MENU_",
                    },
                    dom: "<'row mb-2'" +
                        "<'col-sm-6 d-flex align-items-center justify-conten-start dt-toolbar'l>" +
                        "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
                        ">" +
                        "<'table-responsive'tr>" +
                        "<'row'" +
                        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                        ">",
                });
            });
        </script>
        <script>
            // JavaScript for toggling div visibility
            const toggleBtn = document.getElementById("toggleBtn");
            const defaultDiv = document.getElementById("defaultDiv");
            const hiddenDiv = document.getElementById("hiddenDiv");

            toggleBtn.addEventListener("click", function() {
                // Toggle visibility classes
                defaultDiv.classList.toggle("hidden");
                defaultDiv.classList.toggle("visible");
                hiddenDiv.classList.toggle("hidden");
                hiddenDiv.classList.toggle("visible");
            });
        </script>
    @endpush
@endonce
