<x-admin-app-layout :title="'Admin Panel || Solution'">
    <!-- Main Content Start -->
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Manage Solutions Pages</h3>
            <div class="card-toolbar">
                <a href="{{ route('admin.solution-cms.create') }}" class="btn btn-sm btn-primary">
                    create
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="my-datatable table table-striped table-row-bordered gy-5 gs-7 border rounded">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-800 px-7">
                            <th width="5%">Sl</th>
                            <th width="12%">Template No</th>
                            <th width="31%">Name</th>
                            <th width="10%">Status</th>
                            <th width="10%">Added By</th>
                            {{-- <th>Change</th> --}}
                            <th width="10%">Created Date</th>
                            <th width="10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solutions as $solution)
                            <tr class="">
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    @if ($solution->solution_template == 'template_one')
                                        Template One
                                    @elseif ($solution->solution_template == 'template_two')
                                        Template Two
                                    @elseif ($solution->solution_template == 'template_three')
                                        Template Three
                                    @elseif ($solution->solution_template == 'template_four')
                                        Template Four
                                    @endif
                                </td>
                                <td>
                                    {{ ucfirst($solution->name) }}
                                </td>
                                <td>
                                    @if ($solution->status == 'active')
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Not Active</span>
                                    @endif
                                </td>
                                {{-- <td>
                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input h-20px w-50px" type="checkbox" value=""
                                            id="flexSwitchChecked" checked="checked" />
                                        <label class="form-check-label" for="flexSwitchChecked">
                                        </label>
                                    </div>
                                </td> --}}

                                <td>
                                    {{ ucfirst($solution->added_by) }}
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($solution->created_at)->format('d M y') }}
                                </td>
                                <td class="text-end">
                                    <a href="javascript:void(0)"
                                        class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                                        data-bs-toggle="modal" data-bs-target="#previewFull">
                                        <i class="fa-solid fa-expand fs-6 text-white" title="Show Application"
                                            aria-hidden="true"></i>
                                        <span class="sr-only">Show Application</span>
                                    </a>
                                    <!-- Template Show -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="previewFull" tabindex="-1" data-bs-backdrop="static"
                                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId">
                                                        Solutin Template One
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <div>
                                                        <img src="./assets/template1Preview.png" class="img-fluid"
                                                            alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Template Show Eend -->
                                    <a href="{{ route('admin.solution-cms.edit', $solution->id) }}"
                                        class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                                        <i class="fa-solid fa-pen fs-6 text-white" title="Edit Application"
                                            aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.solution-cms.destroy', $solution->id) }}"
                                        class="btn btn-sm btn-icon btn-danger btn-active-color-danger delete">
                                        <i class="fa-solid fa-trash fs-6 text-white" title="Delete Application"
                                            aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Main Content End -->

</x-admin-app-layout>
