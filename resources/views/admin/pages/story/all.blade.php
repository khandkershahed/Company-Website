@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-flex justify-content-between align-items-center border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <a href="{{ route('admin.site-content.index') }}" class="breadcrumb-item">Site Content</a>
                        <span class="breadcrumb-item active">Client Story Managements</span>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
                <div>
                    <!-- Leave Dashboard link -->
                    <a href="{{ route('clientstory.create') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <i class="ph-plus me-1" style="font-size: 10px;"></i>
                            <span>add Features</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <div class="content">
            <div class="text-center">
                <h4 class="m-0" style="color: #247297;">Story All</h4>
            </div>
            <div class="row pt-3">
                <div class="col-lg-8 offset-lg-2 mx-auto">
                    <div class="card rounded-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table whatWeDoDt table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th width="3%">SL</th>
                                            <th width="17%">Image</th>
                                            <th width="20%">Story Name</th>
                                            <th width="50%">Story Title</th>
                                            <th width="10%" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($storys)
                                            @foreach ($storys as $key => $story)
                                                <tr>
                                                    <td class="text-center">{{ ++$key }}</td>
                                                    <td>
                                                        <img class="rounded-circle img-fluid"
                                                            src="{{ asset('storage/thumb/' . $story->image) }}"
                                                            alt=""
                                                            style="width: 25px;
                                                        height: 25px;">
                                                    </td>
                                                    <td>{{ $story->badge }}</td>
                                                    <td>{{ $story->title }}</td>
                                                    <td>
                                                        <a href="{{ route('clientstory.edit', $story->id) }}"
                                                            class="text-primary">
                                                            <i
                                                                class="fa-solid fa-pen-to-square dash-icons"></i>
                                                        </a>
                                                        <a href="{{ route('clientstory.destroy', [$story->id]) }}"
                                                            class="text-danger delete">
                                                            <i class="fa-solid fa-trash dash-icons"></i>
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
