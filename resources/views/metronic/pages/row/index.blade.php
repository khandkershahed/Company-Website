<x-admin-app-layout :title="'Row List'">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header py-1">
                            <h4 class="mb-0 fw-bold card-title">Row List</h4>
                        <a href="{{ route('admin.row.create') }}" class="btn btn-light-info btn-sm d-flex align-items-center ">
                            <i class="fa-solid fa-arrow-left me-2"></i> Create Row
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table dataTable table-striped table-row-bordered gy-5 gs-7 table-hover text-center">
                                <thead>
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th width="15%">Image</th>
                                        <th width="45%">Title</th>
                                        <th width="25%">List Title</th>
                                        <th width="10%" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($rows)
                                        @foreach ($rows as $key => $row)
                                            <tr>
                                                <td class="text-center">{{ ++$key }}</td>
                                                <td>
                                                    <img src="{{ !empty($row->image) ? asset('storage/' . $row->image) : asset('upload/no_image.jpg') }}"
                                                        alt="" width="50">
                                                </td>
                                                <td>{{ $row->title }}</td>
                                                <td>{{ $row->list_title }}</td>
                                                <td>
                                                    <a href="{{ route('admin.row.edit', $row->id) }}"
                                                        class="text-primary me-5">
                                                        <i
                                                            class="fa-solid fa-pen-to-square me-2 dash-icons text-primary"></i>
                                                    </a>
                                                    <a href="{{ route('admin.row.destroy', [$row->id]) }}"
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
        </div>
    </div>
</x-admin-app-layout>
