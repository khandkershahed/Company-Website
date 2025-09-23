@extends('admin.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .nav-tabs .nav-link.active {
            color: white !important;
        }

        .nav-tabs .nav-link:hover {
            color: white !important;
        }
    </style>
    <div class="content-wrapper">
        <!-- Page header -->
        <section class="shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                {{-- Page Destination/ BreadCrumb --}}
                <div class="page-header-content d-lg-flex ">
                    <div class="d-flex px-2">
                        <div class="breadcrumb py-2">
                            <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                            <a href="{{ route('admin.site-setting.index') }}" class="breadcrumb-item">Site Setting</a>
                            <span class="breadcrumb-item active">Frontend Menu Builder</span>
                        </div>
                        <a href="#breadcrumb_elements"
                            class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                            data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                        </a>
                    </div>
                </div>
                {{-- Inner Page Tab --}}
                <!-- Basic tabs -->
                <div class="d-flex align-items-center">
                    <ul class="nav nav-tabs border-bottom-0">
                        <li class="nav-item d-flex align-items-center">
                            <a href="#js-tab1" class="navigation_btn p-0 me-2 btn nav-link active cat-tab1"
                                data-bs-toggle="tab">
                                <p class="p-1 mb-0">
                                    Navbar Module</p>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a href="#js-tab2" class="navigation_btn p-0 me-2 btn nav-link cat-tab2" data-bs-toggle="tab">
                                <p class="p-1 mb-0">
                                    Navbar Menu</p>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a href="#js-tab3" class="navigation_btn p-0 me-2 btn nav-link cat-tab3" data-bs-toggle="tab">
                                <p class="p-1 mb-0">
                                    Navbar Menu Item</p>
                            </a>
                        </li>
                    </ul>
                    <a href="http://127.0.0.1:3000/admin/marketing-dashboard" class="btn navigation_btn ms-2 py-2">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-business-time me-1" style="font-size: 12px;"></i>
                            <span>Site Setting</span>
                        </div>
                    </a>
                </div>
        </section>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="js-tab1">
                            @include('admin.pages.frontendNavbarModule.partial.navbarmodule')
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show" id="js-tab2">

                            @include('admin.pages.frontendNavbarModule.partial.navbarmenu')
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show" id="js-tab3">

                            @include('admin.pages.frontendNavbarModule.partial.navbarmenuitem')

                        </div>
                    </div>


                </div>


            </div>
        </div>
        @include('admin.pages.frontendNavbarModule.partial.navbarmodals')

    </div>
    <!-- /content area -->
    <!-- /inner content -->

    </div>
    <script></script>
@endsection

@once
    @push('scripts')
        <script type="text/javascript">
            function dropdownCategory() {
                var selectedTable = document.getElementById("dropdownCategory").value;
                var elements = document.getElementsByClassName('cardT')
                for (var i = 0; i < elements.length; i++) {
                    if (elements[i].id == selectedTable)
                        elements[i].style.display = '';
                    else
                        elements[i].style.display = 'none';
                }
            }
        </script>

        <script type="text/javascript">
            $('.moduleDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 26, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2, 3],
                }, ],
            });

            $('.menuDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 26, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2, 3],
                }, ],
            });

            $('.menuItemDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 26, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2, 3, 4],
                }, ],
            });
        </script>
    @endpush
@endonce
