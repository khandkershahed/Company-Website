<x-admin-app-layout :title="'Blog List'">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-info text-center">Blog List</h3>
                <div class="card-toolbar">
                    <a href="{{ route('admin.blog.create') }}"
                        class="btn btn-outline btn-outline-info btn-active-light-info">Create Blog</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table dataTable table-rounded table-striped table-hover border gy-7 gs-7">
                        <thead>
                            <tr>
                                <th width="8%">SL</th>
                                <th width="27%">Badge</th>
                                <th width="50%">Title</th>
                                <th width="15%" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($blogs)
                                @foreach ($blogs as $key => $story)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td>{{ $story->badge }}</td>
                                        <td>{{ $story->title }}</td>
                                        <td>
                                            <a href="{{ route('admin.blog.edit', $story->id) }}" class="me-5">
                                                <i class="fa-solid fa-pen-to-square text-primary dash-icons"></i>
                                            </a>
                                            <a href="{{ route('admin.blog.destroy', [$story->id]) }}"
                                                class="delete">
                                                <i class="fa-solid fa-trash-alt text-danger dash-icons"></i>
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
</x-admin-app-layout>
