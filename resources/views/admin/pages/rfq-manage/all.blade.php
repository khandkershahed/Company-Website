@extends('admin.rfq_master')
@section('content')
<style>
    #DataTables_Table_1_previous {
        margin-right: 30px;
    }

    #DataTables_Table_1_next {
        margin-right: 10px;
    }

    .nav-tabs .nav-link:hover {
        color: #fff !important;
        background-color: none !important;
        border: none !important;
        border-color: transparent !important;
    }
</style>
<div class="page-content">

    <!-- Main sidebar -->
    @include('admin.partials.sidebar')
    @include('admin.pages.rfq-manage.partial.rfq_sidebar')
    <!-- /main sidebar -->
    <div class="content-wrapper">
        @include('admin.partials.toastr')
        <div class="content-inner">
            <!-- Main content -->

            <!-- /main content -->
            <!-- Footer -->
            @include('admin.partials.footer')
            <!-- /footer -->
        </div>
    </div>
</div>
@extends('admin.master')
@section('content')


    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="content-inner">

        <div class="row gx-0 w-lg-100">
            <div class="col-2">
                @include('admin.pages.rfq-manage.partial.rfq_sidebar')
            </div>
            <div class="col-10">
                <div class="page-header page-header-light shadow">
                    <div class="page-header-content d-lg-flex border-top">
                        <div class="d-flex">
                            <div class="breadcrumb py-2">
                                <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                                <a href="{{ route('admin.business.index') }}" class="breadcrumb-item">Business</a>
                                <span class="breadcrumb-item active">RFQ Management</span>
                            </div>
                            <a href="#breadcrumb_elements"
                                class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                                data-bs-toggle="collapse">
                                <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- /page header -->
            <!-- Content area -->

        </div>

    </div>
    <!-- /content area -->
    <!-- /inner content -->

    </div>
@endsection

@once
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.rfqDT1').DataTable({
                    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                    "iDisplayLength": 10,
                    "lengthMenu": [10, 26, 30, 50],
                    columnDefs: [{
                        orderable: false,
                        targets: [0,2,4],
                    }, ],
                });
                $('.rfqDT2').DataTable({
                    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                    "iDisplayLength": 10,
                    "lengthMenu": [10, 26, 30, 50],
                    columnDefs: [{
                        orderable: false,
                        targets: [0,2,4],
                    }, ],
                });
            });
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
    @endpush
@endonce
