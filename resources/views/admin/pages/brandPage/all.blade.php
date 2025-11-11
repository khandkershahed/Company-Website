@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <a href="{{ route('admin.site-content.index') }}" class="breadcrumb-item">Site Content</a>
                        <span class="breadcrumb-item active">Brand Page Management</span>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <div class="content pt-0 w-75 mx-auto">
            <div class="d-flex align-items-center py-2">
                {{-- Add Details Start --}}
                <div class="text-success nav-link cat-tab3"
                    style="position: relative;
                    z-index: 999;
                    margin-bottom: -40px;">
                    <a href="{{ route('admin.brandPage.create') }}">
                        <div class="d-flex align-items-center">
                            <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Add Solution Details">
                                <i class="ph-plus icons_design"></i> </span>
                            <span class="ms-1" style="color: #247297;">Add</span>
                        </div>
                    </a>
                    <div class="text-center" style="margin-left: 300px">
                        <h5 class="ms-1" style="color: #247297;">All Brand Page</h5>
                    </div>
                </div>
                {{-- Add Details End --}}
            </div>
            <div>
                <table class="table brandPageDT table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th width="5%">Sl No:</th>
                            <th width="25%">Brand Name</th>
                            <th width="35%">Header</th>
                            <th width="5%">Banner</th>
                            <th width="15%">Six IMG</th>
                            <th width="10%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($brandPages)
                            @foreach ($brandPages as $key => $brandPage)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ App\Models\Admin\Brand::where('id', $brandPage->brand_id)->value('title') }}
                                    </td>
                                    <td>{{ $brandPage->header }}</td>
                                    <td class="text-center">
                                        <img class="img-fluid rounded-circle" src="{{ asset('storage/' . $brandPage->banner_image) }}"
                                            alt="" style="width: 40px; height: 40px;">
                                    </td>
                                    <td class="text-center">
                                        <img class="img-fluid rounded-circle" src="{{ asset('storage/' . $brandPage->row_six_image) }}"
                                        alt="" style="width: 40px; height: 40px;">
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.brandPage.edit', [$brandPage->id]) }}" class="text-primary">
                                            <i class="fa-solid fa-pen-to-square rounded-circle text-primary mx-1"></i>
                                        </a>
                                        <a href="{{ route('admin.brandPage.destroy', [$brandPage->id]) }}"
                                            class="text-danger delete">
                                           <i class="fa-solid fa-trash rounded-circle text-danger mx-1"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Add Success Modal --}}
        <div id="addnewsLetter" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title text-white">Add News Letter</h6>
                        <a type="button" data-bs-dismiss="modal">
                            <i class="ph ph-x text-white" style="font-weight: 800;font-size: 10px;"></i>
                        </a>
                    </div>
                    <div class="modal-body p-0 px-2">
                        <form method="post" action="">

                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Add Success Modal End --}}
    </div>
@endsection
@once
    @push('scripts')
        <script type="text/javascript">
            $('.brandPageDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 26, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [5],
                }, ],
            });
        </script>
    @endpush
@endonce
