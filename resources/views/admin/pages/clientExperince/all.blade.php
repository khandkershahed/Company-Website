@extends('admin.master')
@section('content')

    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-flex justify-content-between align-items-center border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <span class="breadcrumb-item active">Features Management</span>
                    </div>

                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
                <div>
                    <!-- Leave Dashboard link -->
                    <a href="{{ route('clientExperince.create') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <i class="ph-plus me-1" style="font-size: 10px;"></i>
                            <span>Add Experience</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- Content area -->
        <div class="content">
            <div class="text-center">
                <h4 class="m-0" style="color: #247297;">All Client Experience</h4>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card rounded-0 border-0 shadow-sm">
                        <div class="card-body p-0">
                            <table class="datatable table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="10%">Sl No:</th>
                                        <th width="15%">Logo</th>
                                        <th width="20%">Title</th>
                                        <th width="40%">Header</th>
                                        <th width="15%" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($clientExperinces)
                                        @foreach ($clientExperinces as $key => $clientExperinces)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td class="text-center"><img
                                                        src="{{ asset('storage/' . $clientExperinces->logo) }}"
                                                        height="40" width="50" alt=""></td>
                                                <td>{{ $clientExperinces->title }}</td>
                                                <td>{!! $clientExperinces->short_desc !!}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('clientExperince.edit', $clientExperinces->id) }}"
                                                        class="text-primary">
                                                        <i class="icon-pencil dash-icons"></i>
                                                    </a>
                                                    <a href="{{ route('clientExperince.destroy', [$clientExperinces->id]) }}"
                                                        class="text-danger delete mx-2">
                                                        <i class="delete icon-trash dash-icons"></i>
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
@endsection

@push('script')
@endpush
