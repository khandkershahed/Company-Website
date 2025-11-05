@extends('admin.master')
@section('content')

    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <section class="shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                {{-- Page Destination/ BreadCrumb --}}
                <div class="page-header-content d-lg-flex ">
                    <div class="d-flex px-2">
                        <div class="breadcrumb py-2">
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                            <a href="{{ route('admin.site-content.index') }}" class="breadcrumb-item">Site Contents</a>
                            <a href="{{ route('about-us.index') }}" class="breadcrumb-item"><span
                                    class="breadcrumb-item active">About Us Page</span></a>
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
        </section>
        <!-- /page header -->

        <div class="content pt-0 w-50 mx-auto mt-2">
            <div class="d-flex align-items-center py-1 bg-white">
                {{-- Add Details Start --}}
                <div class="text-success nav-link cat-tab3">

                    <a href="{{ route('about-us.create') }}" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Add Homepage"
                        class="mx-3 btn btn-sm btn-info btn-labeled custom_btn btn-labeled-start float-start">
                        <span class="btn-labeled-icon bg-black bg-opacity-20">
                            <i class="icon-plus2"></i>
                        </span>
                        Add
                    </a>

                    <div class="text-center" style="margin-left:5.5rem;">
                        <h5 class="ms-1 mb-0" style="color: #247297;">About Us Page</h5>
                    </div>
                </div>
                {{-- Add Details End --}}
            </div>
            <div>
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Template Number</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    @php
                        $words = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
                    @endphp
                    <tbody>
                        @if (count($aboutUses)>0)
                            @foreach ($aboutUses as $key => $item)
                                <td>{{ $item->id }}</td>
                                <td>{{ isset($words[$key]) ? 'Template' . ' ' . Str::ucfirst($words[$key]) : 'Number out of range' }}
                                </td>
                                <td class="text-center">

                                    <a href="{{ route('about-us.edit', $item->id) }}" class="text-primary">
                                        <i class="icon-pencil"></i>
                                    </a>
                                    <a href="{{ route('about-us.destroy', [$item->id]) }}" class="text-danger delete mx-2">
                                        <i class="delete icon-trash"></i>
                                    </a>
                                </td>
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



        <!-- /inner content -->

    </div>
@endsection

