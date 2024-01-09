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
                        <span class="breadcrumb-item active">Contact Management</span>
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
        <div class="content container-fluid">

            <div class="d-flex align-items-center py-2 w-50 justify-content-between"
                style="position: relative; z-index: 999; margin-bottom: -3.2rem;">
                {{-- Add Details Start --}}
                <div class="text-success nav-link cat-tab3">
                    <a href="{{ route('contact.create') }}" class="border px-2 py-1">
                        <div class="d-flex align-items-center">
                            <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Add Solution Details">
                                <i class="ph-plus icons_design"></i> </span>
                            <span class="ms-2 m-0" style="color: #247297;">Add</span>
                        </div>
                    </a>
                </div>
                <div class="text-center" style="margin-left: 300px">
                    <h5 class="m-0" style="color: #247297;">All Contacts</h5>
                </div>

            </div>
            <div class="table-responsive">
                <table class="table contactDT table-bordered table-hover text-center">
                    <thead>
                        <tr class="text-center">
                            <th width="8%">Id</th>
                            <th width="12%">Name</th>
                            <th width="15%">Email</th>
                            <th width="43%">message</th>
                            <th width="12%">Date</th>
                            <th width="10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($contacts)
                            @foreach ($contacts as $key => $contact)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                    <td>
                                        <a href="{{ route('contact.edit', [$contact->id]) }}" class="text-primary">
                                            <i class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-primary"></i>
                                        </a>
                                        <a href="{{ route('contact.destroy', [$contact->id]) }}" class="text-danger delete">
                                            <i class="fa-solid fa-trash p-1 rounded-circle text-danger"></i>
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
            $('.contactDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [5],
                }, ],
            });
        </script>
    @endpush
@endonce
