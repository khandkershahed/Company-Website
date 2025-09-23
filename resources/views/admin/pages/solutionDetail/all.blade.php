@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('admin.site-content.index') }}" class="breadcrumb-item">Site
                            Contents</a>
                        <a href="#" class="breadcrumb-item">Solution Details</a>
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
        <div class="content pt-0 w-50 mx-auto">
            <div class="d-flex align-items-center py-2">
                {{-- Add Details Start --}}
                <div class="text-success nav-link cat-tab3"
                    style="position: relative;
                    z-index: 999;
                    margin-bottom: -39px;">
                    <a href="{{ route('solutionDetails.create') }}" type="button"
                        class="mx-3 btn btn-sm btn-info custom_btn btn-labeled btn-labeled-start float-start">
                        <span class="btn-labeled-icon bg-black bg-opacity-20">
                            <i class="icon-plus2"></i>
                        </span>
                        Add
                    </a>

                    <div class="text-center" style="margin-left:4.5rem;">
                        <h5 class="ms-1 mb-0" style="color: #247297;">Solution Details</h5>
                    </div>
                </div>
                {{-- Add Details End --}}
            </div>
            <div>
                <table class="table solutionDetails table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th width="15%">SL</th>
                            <th width="65%">Solution Name</th>
                            <th width="20%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($solutionDetails)
                            @foreach ($solutionDetails as $key => $solutionDetail)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $solutionDetail->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('solutionDetails.edit', [$solutionDetail->id]) }}"
                                            class="text-primary">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{ route('solutionDetails.destroy', [$solutionDetail->id]) }}"
                                            class="text-danger delete mx-2">
                                            <i class="delete fa-solid fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@once
    @push('scripts')
        <script type="text/javascript">
            $('.solutionDetails').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [1,2],
                }, ],
            });
        </script>
    @endpush
@endonce
















