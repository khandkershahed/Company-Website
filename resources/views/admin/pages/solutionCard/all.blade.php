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
                        <a href="{{ route('admin.site-content.index') }}" class="breadcrumb-item"> Site Content</a>
                        <a href="{{ route('solutionCard.index') }}" class="breadcrumb-item">Solution Card</a>
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
            <div class="col-lg-8 offset-lg-2">
                <div class="d-flex justify-content-between align-items-center py-1 px-4 mt-3 rounded-1"
                    style="background-color: #247297">
                    <div>
                        <h5 class="mb-0 text-white">Solution Card</h5>
                    </div>
                    <div>
                        <a href="{{ route('solutionCard.create') }}">
                            <div class="d-flex align-items-center">
                                <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Add Rows">
                                    <i class="ph-plus text-white"></i> </span>
                                <span class="ms-1 text-white">Add</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-2">
                <div>
                    <table class="table rowAdd table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th width="5%">SL</th>
                                <th width="15%">Image</th>
                                <th width="60%">Title</th>
                                <th width="20%" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($solutionCards)
                                @foreach ($solutionCards as $key => $solutionCard)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td>
                                            <img class="rounded-circle img-fluid"
                                                src="{{ asset('storage/' . $solutionCard->image) }}"
                                                alt="" width="25" height="25">
                                        </td>
                                        <td>{{ $solutionCard->title }}</td>
                                        <td>
                                            <a href="{{ route('solutionCard.edit', $solutionCard->id) }}"
                                                class="text-primary">
                                                <i
                                                    class="fa-solid fa-pen-to-square me-2 dash-icons text-primary"></i>
                                            </a>
                                            <a href="{{ route('solutionCard.destroy', [$solutionCard->id]) }}"
                                                class="text-danger delete">
                                                <i class="fa-solid fa-trash dash-icons text-danger"></i>
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
    </div>
@endsection
@once
    @push('scripts')
        <script type="text/javascript">
            $('.rowAdd').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 3],
                }, ],
            });
        </script>
    @endpush
@endonce
