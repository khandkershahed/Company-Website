@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-flex justify-content-between align-items-center border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('admin.site-content.index') }}" class="breadcrumb-item">Site Contents</a>
                        <a href="{{ route('policy.index') }}" class="breadcrumb-item active">Terms & Policy</a>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
                <div>
                    <a href="#" class="btn navigation_btn">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-calculator me-1" style="font-size: 12px;"></i>
                            <span>Site Content</span>
                        </div>
                    </a>
                    <a href="javascript:void()" class="btn navigation_btn" data-bs-toggle="modal"
                        data-bs-target="#policyAdd">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-plus me-1" style="font-size: 12px;"></i>
                            <span>Add Terms</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <!-- Highlighting rows and columns -->
        <div class="content pt-0 w-75 mx-auto">
            <h5 class="text-center mt-3">Terms & Policy</h5>
            <div>
                <table class="table portfolioDetailDT table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th width="5">Sl No:</th>
                            <th width="65">Name</th>
                            <th width="20">Condition</th>
                            <th width="10" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($policys)
                            @foreach ($policys as $key => $policy)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td>{{ $policy->name }}</td>
                                    <td>{{ $policy->condition }}</td>
                                    <td>
                                        <a href="" class="text-primary" data-bs-toggle="modal"
                                            data-bs-target="#policyEdit{{ $policy->id }}">
                                            <i class="fa-solid fa-pen-to-square dash-icons text-primary"></i>
                                        </a>
                                        <a href="{{ route('policy.destroy', [$policy->id]) }}" class="text-danger delete">
                                            <i class="fa-solid fa-trash dash-icons text-danger"></i>
                                        </a>
                                        {{-- Edit Policy Modal Content --}}
                                        <div id="policyEdit{{ $policy->id }}" class="modal fade" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title text-white">Edit Terms & Policy
                                                        </h6>
                                                        <a type="button" data-bs-dismiss="modal">
                                                            <i class="ph ph-x text-white"
                                                                style="font-weight: 800;font-size: 10px;"></i>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body p-1">
                                                        <div class="container ps-0 pe-0">
                                                            <form method="post"
                                                                action="{{ route('policy.update', $policy->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="px-2 py-2 m-2 bg-light rounded">
                                                                    <div class="row mb-1">
                                                                        <div class="col-lg-6 col-sm-12">
                                                                            <div class="row mb-1">
                                                                                <div
                                                                                    class="col-lg-12 col-sm-12 d-flex align-items-center">
                                                                                    <span>Name</span>
                                                                                </div>
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <input type="text" name="name"
                                                                                        value="{{ $policy->name }}"
                                                                                        class="form-control form-control-sm maxlength"
                                                                                        maxlength="100" required />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-sm-12">
                                                                            <div class="col-lg-12 col-sm-12 text-start">
                                                                                <span>Condition</span>
                                                                            </div>
                                                                            <div class="row mb-1">
                                                                                <div class="col-lg-6 col-sm-6">
                                                                                    <div class="form-check text-start">
                                                                                        <input
                                                                                            {{ $policy->condition == 'terms' ? 'checked' : '' }}
                                                                                            class="form-check-input"
                                                                                            type="radio" name="condition"
                                                                                            value="terms" id="terms">
                                                                                        <label class="form-check-label"
                                                                                            for="terms">
                                                                                            Terms
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-sm-6">
                                                                                    <div class="form-check text-start">
                                                                                        <input
                                                                                            {{ $policy->condition == 'policy' ? 'checked' : '' }}
                                                                                            class="form-check-input"
                                                                                            type="radio" name="condition"
                                                                                            value="policy" id="policy">
                                                                                        <label class="form-check-label"
                                                                                            for="policy">
                                                                                            Policy
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-6 col-sm-6">
                                                                                    <div class="form-check text-start">
                                                                                        <input
                                                                                            {{ $policy->condition == 'sale_terms' ? 'checked' : '' }}
                                                                                            class="form-check-input"
                                                                                            type="radio" name="condition"
                                                                                            value="sale_terms"
                                                                                            id="saleTerms">
                                                                                        <label class="form-check-label"
                                                                                            for="saleTerms">
                                                                                            Terms of Sale
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-sm-6">
                                                                                    <div class="form-check text-start">
                                                                                        <input
                                                                                            {{ $policy->condition == 'service_terms' ? 'checked' : '' }}
                                                                                            class="form-check-input"
                                                                                            type="radio"
                                                                                            name="condition"
                                                                                            value="service_terms"
                                                                                            id="serviceTerms">
                                                                                        <label class="form-check-label"
                                                                                            for="serviceTerms">
                                                                                            Terms of Service
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{--  --}}
                                                                <div class="row mb-1">
                                                                    <div class="col-lg-12 col-sm-12">
                                                                        <span>Description</span>
                                                                    </div>
                                                                    <div class="col-lg-12 col-sm-12">
                                                                        <textarea class="form-control" name="description" id="common" style=" font-size: 12px; font-weight: 500;">{{ $policy->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div
                                                                class="col-sm-12 text-secondary d-flex justify-content-end">
                                                                <button type="submit" class="text-white btn btn-sm"
                                                                    style="background-color:#247297 !important; padding: 5px 12px 5px;">Submit</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Add Policy Modal End --}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{-- add Policy Modal Content --}}
        <div id="policyAdd" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header py-2 px-3">
                        <h6 class="modal-title text-white">Add Terms & Policy
                        </h6>
                        <a type="button" data-bs-dismiss="modal">
                            <i class="ph ph-x text-white"></i>
                        </a>
                    </div>
                    <div class="modal-body p-1">
                        <div class="container ps-0 pe-0">
                            <form method="post" action="{{ route('policy.store') }}">
                                @csrf
                                <div class="px-1 py-2 m-2 bg-light rounded">
                                    <div class="row mb-1">
                                        <div class="col-lg-5">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Title</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="name"
                                                        class="form-control form-control-sm maxlength" maxlength="100"
                                                        required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Condition</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <div class="form-group text-secondary">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="condition" value="terms" id="terms"
                                                                        checked>
                                                                    <label class="form-check-label" for="terms">
                                                                        Terms
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="condition" value="policy" id="policy">
                                                                    <label class="form-check-label" for="policy">
                                                                        Policy
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="condition" value="sale_terms"
                                                                        id="saleTerms">
                                                                    <label class="form-check-label" for="saleTerms">
                                                                        Terms of Sale
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="condition" value="service_terms"
                                                                        id="serviceTerms">
                                                                    <label class="form-check-label" for="serviceTerms">
                                                                        Terms of Service
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Description</span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <textarea class="form-control" name="description" id="long_desc" style=" font-size: 12px; font-weight: 500;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-12 text-secondary d-flex justify-content-end">
                                        <button type="submit" class="text-white btn btn-sm"
                                            style="background-color:#247297 !important; padding: 5px 12px 5px;">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Add Policy Modal End --}}


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
                    targets: [3],
                }, ],
            });
        </script>
    @endpush
@endonce
