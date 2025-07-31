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
                        <a href="#" class="breadcrumb-item">CRM</a>
                        <span class="breadcrumb-item active">Client Database</span>
                    </div>
                </div>
                {{-- Inner Page Tab --}}
                <div>
                    <!-- Leave Dashboard link -->
                    <a href="#" class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <span>CRM</span>
                        </div>
                    </a>
                    <a href="{{ route('client-database.create') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <i class="ph-plus me-1" style="font-size: 10px;"></i>
                            <span>Add Database</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <div class="content">
            <div class="row mx-3">
                <div class="text-center">
                    <h4 class="m-0" style="color: #247297;">Client Databases</h4>
                </div>
                <div class="col-lg-8 offset-lg-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="table-responive">
                                <table class="table clientDatabaseDT table-bordered table-hover text-center table-sm">
                                    <thead>
                                        <tr>
                                            <th width="5%">Sl</th>
                                            <th width="7%">Image</th>
                                            <th width="20%">Name</th>
                                            <th width="10%">Phone</th>
                                            <th width="13%">Country</th>
                                            <th width="20%">Email</th>
                                            <th width="8%">Status</th>
                                            <th width="20%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($clientDatabases)
                                            @foreach ($clientDatabases as $key => $clientDatabase)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td class="text-center"><img class=""
                                                            src="{{ asset('upload/Profile/user/' . $clientDatabase->photo) }}"
                                                            height="40px" width="50px" alt=""></td>
                                                    <td>{{ $clientDatabase->name }}</td>
                                                    <td>{{ $clientDatabase->phone }}</td>
                                                    <td>{{ $clientDatabase->country }}</td>
                                                    <td>{{ $clientDatabase->email }}</td>
                                                    <td>
                                                        <div class="clientStatus-{{ $clientDatabase->id }}"
                                                            id="{{ $clientDatabase->id }}">
                                                            @if ($clientDatabase->status == 'active')
                                                                <span class="badge bg-success">Approved</span>
                                                            @else
                                                                <span class="badge bg-warning">Pending</span>
                                                            @endif
                                                        </div>

                                                    </td>
                                                    <td>

                                                        <div
                                                            class="text-center d-flex justify-content-center align-items-center">
                                                            <div class="form-switch pe-2">
                                                                <input name="toggle" type="checkbox"
                                                                    class="form-check-input form-check-input-sm form-check-input-danger"
                                                                    value="{{ $clientDatabase->id }}" id="sc_r_danger"
                                                                    {{ $clientDatabase->status == 'inactive' ? 'checked' : '' }}>
                                                            </div>
                                                            <div>
                                                                <a href="{{ route('client-database.edit', [$clientDatabase->id]) }}"
                                                                    class="text-info">
                                                                    <i
                                                                        class="fa-solid fa-pencil dash-icons text-primary"></i>
                                                                </a>
                                                                <a href="{{ route('client-database.destroy', [$clientDatabase->id]) }}"
                                                                    class="text-danger delete">
                                                                    <i class="fa-solid fa-trash dash-icons"></i>
                                                                </a>
                                                            </div>
                                                        </div>
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
            $(document).ready(function() {
                $('.clientDatabaseDT').DataTable({
                    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                    "iDisplayLength": 10,
                    "lengthMenu": [10, 25, 30, 50],
                    columnDefs: [{
                        orderable: false,
                        targets: [0, 1, 2, 3, 5, 6, 7],
                    }, ],
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('input[name=toggle]').change(function() {
                    var mode = $(this).prop('checked');
                    var id = $(this).val();
                    var statusContainer = $('.clientStatus-' + id);

                    $.ajax({
                        url: "{{ route('client.status') }}",
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            mode: mode,
                            id: id,
                        },
                        success: function(response) {
                            if (response.status) {
                                // Update the status container text
                                statusContainer.html(response.client_status === 'active' ?
                                    '<span class="badge bg-success">Approved</span>' :
                                    '<span class="badge bg-danger">Pending</span>');

                                // Update the checkbox status
                                $('input[name=toggle][value="' + id + '"]').prop('checked', response
                                    .client_status === 'inactive');

                                toastr.success(response.msg);
                                console.log(response.msg);
                            } else {
                                console.log('Please Try Again!');
                            }
                        }
                    })
                })
            })
        </script>
    @endpush
@endonce
