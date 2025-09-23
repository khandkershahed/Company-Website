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
                        <a href="{{ route('admin.site-content.index') }}" class="breadcrumb-item">Site Contents</a>
                        <a href="#" class="breadcrumb-item">Portfolio Detail</a>
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
        <div class="content pt-0 w-50 mx-auto mt-2">
            <div class="d-flex align-items-center py-1 bg-white">
                {{-- Add Details Start --}}
                <div class="text-success nav-link cat-tab3">

                    <a href="{{ route('portfolio-detail.create') }}" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Add Homepage"
                        class="mx-3 btn btn-sm btn-info btn-labeled custom_btn btn-labeled-start float-start">
                        <span class="btn-labeled-icon bg-black bg-opacity-20">
                            <i class="icon-plus2"></i>
                        </span>
                        Add
                    </a>

                    <div class="text-center" style="margin-left:5.5rem;">
                        <h5 class="ms-1 mb-0" style="color: #247297;">Portfolio Details</h5>
                    </div>
                </div>
                {{-- Add Details End --}}
            </div>
            <div>
                <table class="portfolioDetailDT table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Template </th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    @php
                        $words = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
                    @endphp
                    <tbody>

                        @foreach ($PortfolioDetailses as $key => $PortfolioDetails)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{ $PortfolioDetails->banner_title }}
                            </td>
                            <td class="text-center">
                                {{-- <a href="{{ route('PortfolioDetailspage.show', $PortfolioDetails->id) }}" class="text-info">
                                    <i class="icon-eye"></i>
                                </a> --}}
                                <a href="{{ route('portfolio-detail.edit', $PortfolioDetails->id) }}" class="text-primary">
                                    <i class="icon-pencil"></i>
                                </a>
                                <a href="{{ route('portfolio-detail.destroy', [$PortfolioDetails->id]) }}" class="text-danger delete mx-2">
                                    <i class="delete icon-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        <!-- Highlighting rows and columns -->

    </div>
@endsection

@once
    @push('scripts')
        <script type="text/javascript">
            $('.portfolioDetailDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2],
                }, ],
            });
        </script>
    @endpush
@endonce
