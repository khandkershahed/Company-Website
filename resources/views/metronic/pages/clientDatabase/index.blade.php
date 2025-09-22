<x-admin-app-layout :title="'All Clients'">
    <div class="card card-flush">
        <div class="card-header bg-info align-items-center">
            <h3 class="card-title text-white">Total Clients : &nbsp;&nbsp;<strong class="text-warning">
                    {{ $clientDatabases->count() }}</strong></h3>
            <h2 class="card-title text-white">Clients List</h2>
            <div>
                <a class="btn btn-sm btn-light-primary rounded-0" href="{{ route('client-database.create') }}">
                    Add New Client
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responive">
                <table class="table my-datatable table-striped table-row-bordered gy-5 gs-7 border rounded">
                    <thead>
                        <tr>
                            <th width="5%">Sl</th>
                            {{-- <th width="7%">Image</th> --}}
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
                            @foreach ($clientDatabases as $clientDatabase)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    {{-- <td class="text-center"><img class=""
                                            src="{{ asset('upload/Profile/user/' . $clientDatabase->photo) }}"
                                            height="40px" width="50px" alt=""></td> --}}
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

                                        <div class="text-center d-flex justify-content-center align-items-center">
                                            <div class="form-switch pe-2">
                                                <input name="toggle" type="checkbox"
                                                    class="form-check-input form-check-input-sm form-check-input-danger"
                                                    value="{{ $clientDatabase->id }}" id="sc_r_danger"
                                                    {{ $clientDatabase->status == 'inactive' ? 'checked' : '' }}>
                                            </div>
                                            <div>
                                                <a href="{{ route('client-database.edit', [$clientDatabase->id]) }}"
                                                    class="text-info mx-4">
                                                    <i class="fa-solid fa-pencil dash-icons text-primary fs-2"></i>
                                                </a>
                                                <a href="{{ route('client-database.destroy', [$clientDatabase->id]) }}"
                                                    class="text-danger delete">
                                                    <i class="fa-solid fa-trash dash-icons text-danger fs-2"></i>
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
    @push('scripts')
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
</x-admin-app-layout>
