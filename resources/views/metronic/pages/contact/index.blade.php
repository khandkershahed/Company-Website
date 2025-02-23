<x-admin-app-layout :title="'Contact Messages'">
    <div class="card card-flush w-lg-75 m-auto">
        <div class="card-header bg-info align-items-center">
            <h3 class="card-title text-white">Total Messages : &nbsp;&nbsp;<strong class="text-warning">
                    {{ $contacts->count() }}</strong></h3>
            <h2 class="card-title text-white">Contact Messages</h2>
            {{-- <div>
                <a class="btn btn-sm btn-light-primary rounded-0" href="{{ route('admin.contact.create') }}">
                    Add New
                </a>
            </div> --}}
        </div>
        <div class="card-body table-responsive">
            <table class="table my-datatable table-striped table-row-bordered border rounded">
                <thead class="text-center" align="center">
                    <tr class="fw-bold fs-6 text-gray-800 px-7">
                        <th width="5%">Id</th>
                        <th width="25%">Name</th>
                        <th width="30%">Email</th>
                        <th width="15%">Date</th>
                        <th width="10%">Message</th>
                        <th width="10%">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center" align="center">
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ ucfirst($contact->name) }}</td>
                            <td>
                                {{ ucfirst($contact->email) }}
                            </td>
                            <td>
                                {{ Carbon\Carbon::parse($contact->created_at)->format('d M, Y') }}
                            </td>
                            <td>
                                <a href="" class="text-info" data-bs-toggle="modal"
                                    data-bs-target="#userMessageShow-{{ $contact->id }}">
                                    <i class="fa-solid fa-eye dash-icons"></i>
                                </a>
                            </td>
                            {{-- <td>
                                <div
                                    class="form-check form-switch form-check-custom form-check-solid justify-content-center">
                                    <input class="form-check-input status-toggle" type="checkbox"
                                        id="status_toggle_{{ $contact->id }}" @checked($contact->status == 'active')
                                        data-id="{{ $contact->id }}" />
                                </div>
                            </td> --}}
                            <td>
                                <a href="{{ route('admin.contact.edit', $contact->id) }}"
                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="{{ route('admin.contact.destroy', $contact->id) }}"
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


    {{-- Show User Contact Message Modal End --}}
    {{-- Show User Contact Message Modal Start --}}
    @if ($contacts)
        @foreach ($contacts as $key => $contact)
            <div class="modal fade" id="userMessageShow-{{ $contact->id }}" tabindex="-1"
                aria-labelledby="userMessageLabel" aria-hidden="true" data-bs-backdrop="static"
                data-bs-keyboard="false">
                {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> --}}
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userMessageLabel">User Message</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-3 mb-4">
                                        <h5><span class="fw-bold">Name :</span> {{ $contact->name }}</h5>
                                    </div>
                                    <div class="col-lg-5 mb-4">
                                        <h5><span class="fw-bold">Email :</span> {{ $contact->email }}</h5>
                                    </div>
                                    <div class="col-lg-4 mb-4">
                                        <h5><span class="fw-bold">Create Date :</span> {{ Carbon\Carbon::parse($contact->created_at)->format('d M, Y') }}</h5>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <h5><span class="fw-bold">Message :</span></h5>
                                        <h6>{{ $contact->message }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</x-admin-app-layout>
