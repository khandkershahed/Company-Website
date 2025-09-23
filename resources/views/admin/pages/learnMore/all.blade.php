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
                        <a href="{{ route('admin.site-content.index') }}" class="breadcrumb-item">Site Content</a>
                        <a href="{{ route('learnMore.index') }}" class="breadcrumb-item">Learn More Page</a>
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
        <div class="content">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="d-flex justify-content-between align-items-center py-1 px-4 mt-3 rounded-1"
                        style="background-color: #247297">
                        <div>
                            <h5 class="mb-0 text-white">Learn More Page</h5>
                        </div>
                        <div>
                            <a href="{{ route('learnMore.create') }}" >
                                <div class="d-flex align-items-center">
                                    <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Add Category">
                                        <i class="ph-plus text-white"></i> </span>
                                    <span class="ms-1 text-white">Add</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-3">
                    <div>
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Template Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @php
                                $words = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
                            @endphp
                            <tbody>
                                @if (count($learnMores) > 0)
                                    @foreach ($learnMores as $key => $learnMore)
                                        <tr>
                                            <td class="text-center">{{ ++$key }}</td>
                                            <td>
                                                {{ isset($words[$key]) ? 'Tamplate' . ' ' . Str::ucfirst($words[$key]) : 'Number out of range' }}
                                            </td>
                                            <td>
                                                <a href="{{ route('learnMore.edit', [$learnMore->id]) }}"
                                                    class="text-primary">
                                                    <i class="fa-solid fa-pen-to-square me-2 dash-icons text-primary"></i>
                                                </a>
                                                <a href="{{ route('learnMore.destroy', [$learnMore->id]) }}"
                                                    class="text-danger delete">
                                                    <i class="fa-solid fa-trash dash-icons text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">No Data Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@once
    @push('scripts')
        <script type="text/javascript">
            $('.whatWeDoDt').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [4],
                }, ],
            });
        </script>
    @endpush
@endonce
