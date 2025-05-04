<x-admin-app-layout :title="'Job Posts'">
    <div class="card card-flush w-lg-75 m-auto">
        <div class="card-header bg-info align-items-center">
            <h3 class="card-title text-white">Total Job Posts : &nbsp;&nbsp;<strong class="text-warning">
                    {{ $jobs->count() }}</strong></h3>
            <h2 class="fs-1 card-title text-white">Job Posts</h2>
            <div>
                <a class="btn btn-sm btn-light-primary rounded-0" href="{{ route('admin.job-post.create') }}">
                    Add New
                </a>
            </div>
        </div>
        <div class="card-body table-responsive py-2 px-5">
            <table class="table my-datatable table-striped table-row-bordered border rounded">
                <thead class="text-center" align="center">
                    <tr class="fw-bold fs-6 text-gray-800 text-center">
                        <th width="5%">Id</th>
                        <th width="25%">Title</th>
                        <th width="15%">Deadline</th>
                        <th width="20%">Post Link</th>
                        <th width="20%">Category</th>
                        <th width="15%">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center" align="center">
                    @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $job->name }}</td>
                            <td>{{ $job->deadline }}</td>
                            <td>
                                <a href="{{ $job->link }}">
                                    <i
                                        class="fa-solid fa-arrow-up-right-from-square main_color"></i>
                                </a>
                            </td>
                            <td>{{ $job->category }}</td>

                            <td>
                                <a href="{{ route('admin.job-post.edit', $job->id) }}"
                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="{{ route('admin.job-post.destroy', $job->id) }}"
                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 delete"
                                    data-kt-docs-table-filter="delete_row">
                                    <i class="fa-solid fa-trash-can-arrow-up text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



</x-admin-app-layout>
