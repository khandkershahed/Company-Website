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
                        <a href="{{ route('software-common-page.index') }}" class="breadcrumb-item">Sofware Common Page</a>
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
        <div class="content pt-0 w-lg-50 w-100 mx-auto mt-2">
            <div class="d-flex align-items-center py-1 bg-white">
                {{-- Add Details Start --}}
                <div class="text-success nav-link cat-tab3">
                    <a href="{{ route('software-common-page.create') }}" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Add Solution Details"
                        class="mx-3 btn btn-sm btn-info btn-labeled custom_btn btn-labeled-start float-start">
                        <span class="btn-labeled-icon bg-black bg-opacity-20">
                            <i class="icon-plus2"></i>
                        </span>
                        Add
                    </a>

                    <div class="text-center" style="margin-left: 4.5rem;">
                        <h5 class="ms-1 mb-0" style="color: #247297;">Software Common Page</h5>
                    </div>
                </div>
                {{-- Add Details End --}}
            </div>
            <div>
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th width="5%">SL</th>
                            <th width="70%">Number Of Template</th>
                            <th width="10%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $words = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
                        @endphp

                        @if (count($softwareCommons)>0)
                            @foreach ($softwareCommons as $key => $softwareCommon)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }} </td>
                                    <td>{{ isset($words[$key]) ? Str::ucfirst($words[$key]) . ' ' . 'Tamplate' : 'Number out of range' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('software-common-page.edit', [$softwareCommon->id]) }}"
                                            class="text-primary">
                                            <i class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-primary"></i>
                                        </a>
                                        <a href="{{ route('software-common-page.destroy', [$softwareCommon->id]) }}"
                                            class="text-danger delete">
                                            <i class="fa-solid fa-trash p-1 rounded-circle text-danger"></i>
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
@endsection

