<x-admin-app-layout :title="'Industrial Sectors'">
    <div class="content-wrapper">
        <div class="p-1 my-3 content">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="border-0 row nav-tabs" id="myTab" role="tablist">
                <div class="col-lg-12">
                    <div class="row gx-3">
                        <div class="mb-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="text-white border-0 card rounded-1 active" style="background-color: #0b6476;"
                                id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                                aria-controls="home" aria-selected="true">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="mb-0 text-white">Total Sectors</h2>
                                        <div class="p-5 px-5 rounded-circle" style="background-color: #247297;">
                                            <h2 class="mb-0 text-white">{{ $sectors->count() }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach ($parentSectors as $parent)
                            <div class="mb-3 col-lg-3 col-md-6 col-sm-6">
                                <div class="text-white border-0 card rounded-1" style="background-color: #0b6476;"
                                    id="profile-tab-{{ $parent->id }}" data-bs-toggle="tab"
                                    data-bs-target="#parent_{{ $parent->id }}" type="button" role="tab"
                                    aria-controls="parent_{{ $parent->id }}" aria-selected="false">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 class="mb-0 text-white">{{ Str::limit($parent->name, 15) }}</h2>
                                            <div class="py-5 px-7 rounded-circle" style="background-color: #247297;">
                                                <h2 class="mb-0 text-white">{{ $parent->children->count() }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="py-5 card-header align-items-center w-100" style="background-color: beige;">
                                        <div class="d-flex justify-content-between align-items-center w-100">
                                            <h6 class="mb-0 text-center text-black">All Industrial Sectors</h6>
                                            <div class="">
                                                <a href="javascript:void(0);"
                                                   data-bs-toggle="modal" data-bs-target="#addSector"
                                                   class="btn navigation_btn btn-sm btn-outline btn-outline-info btn-active-info">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa-solid fa-plus me-1"></i>
                                                        <span>Add New Sector</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-0 card-body">
                                        <div class="table-responsive">
                                            <table class="table text-center table-bordered employeeDT table-hover">
                                                <thead style="border-bottom: 1px solid #247297; background-color: #eee;">
                                                    <tr class="fw-bold">
                                                        <th width="5%">SL</th>
                                                        <th width="20%">Name</th>
                                                        <th width="15%">Slug</th>
                                                        <th width="15%">Parent Sector</th>
                                                        <th width="25%">Description</th>
                                                        <th width="10%">Status</th>
                                                        <th width="10%" class="text-center">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($sectors as $key => $sector)
                                                        <tr style="border-bottom: 1px solid #eee;">
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td>{{ $sector->name }}</td>
                                                            <td><small>{{ $sector->slug }}</small></td>
                                                            <td>
                                                                @if($sector->parent)
                                                                    <span class="badge badge-secondary">{{ $sector->parent->name }}</span>
                                                                @else
                                                                    <span class="text-muted">-</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ Str::limit($sector->description, 30) }}</td>
                                                            <td>
                                                                @if($sector->status == 'active')
                                                                    <span class="badge bg-success">Active</span>
                                                                @else
                                                                    <span class="badge bg-danger">Inactive</span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="javascript:void(0);" class="text-primary me-4"
                                                                    data-bs-target="#editSector{{ $sector->id }}"
                                                                    data-bs-toggle="modal" type="button">
                                                                    <i class="fa-solid fa-pen-to-square dash-icons"></i>
                                                                </a>
                                                                <a href="{{ route('admin.industrial-sector.destroy',$sector->id) }}" class="delete me-2">
                                                                    <i class="fa-solid fa-trash-alt text-danger dash-icons"></i>
                                                                </a>


                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7">No sectors found.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach ($parentSectors as $parent)
                            <div class="tab-pane" id="parent_{{ $parent->id }}" role="tabpanel" aria-labelledby="profile-tab-{{ $parent->id }}">
                                <div class="col-lg-12">
                                    <h6 class="p-1 m-0 text-center" style="color: #fff; border-bottom: 1px solid #9042fc;background: #9042fc;">
                                        Sub-Sectors of {{ $parent->name }}
                                    </h6>
                                    <div class="card rounded-0">
                                        <div class="p-0 card-body">
                                            <div class="table-responsive">
                                                <table class="table text-center employeeDT table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%">SL</th>
                                                            <th width="20%">Name</th>
                                                            <th width="20%">Slug</th>
                                                            <th width="35%">Description</th>
                                                            <th width="10%">Status</th>
                                                            <th width="10%" class="text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($parent->children as $key => $child)
                                                            <tr>
                                                                <td>{{ ++$key }}</td>
                                                                <td>{{ $child->name }}</td>
                                                                <td>{{ $child->slug }}</td>
                                                                <td>{{ Str::limit($child->description, 40) }}</td>
                                                                <td>
                                                                    @if($child->status == 'active')
                                                                        <span class="badge bg-success">Active</span>
                                                                    @else
                                                                        <span class="badge bg-danger">Inactive</span>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    <a href="javascript:void(0);" class="text-primary me-2"
                                                                        data-bs-target="#editSector{{ $child->id }}"
                                                                        data-bs-toggle="modal" type="button">
                                                                        <i class="fa-solid fa-pen-to-square dash-icons"></i>
                                                                    </a>
                                                                     <form action="{{ route('admin.industrial-sector.destroy', $child->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="bg-transparent border-0 text-danger p-0">
                                                                            <i class="delete fa-solid fa-trash dash-icons"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div id="addSector" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="p-4 text-white modal-header" style="background-color: #247297">
                        <h4 class="text-white m-0">Create New Sector</h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="p-4 modal-body">
                        <form method="post" action="{{ route('admin.industrial-sector.store') }}" class="needs-validation">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="form-label star">Sector Name</label>
                                    <input type="text" class="form-control" name="name" required placeholder="e.g., Manufacturing">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label">Parent Sector</label>
                                    <select name="parent_id" class="form-select">
                                        <option value="" selected>No Parent (Top Level)</option>
                                        @foreach ($sectors as $s)
                                            @if(!$s->parent_id)
                                                <option value="{{ $s->id }}">{{ $s->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label star">Status</label>
                                    <select name="status" class="form-select" required>
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Enter details..."></textarea>
                                </div>
                            </div>

                            <div class="mt-4 text-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" style="background-color: #0b6476;">Save Sector</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($sectors as $sector)
            <div id="editSector{{ $sector->id }}" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="p-4 text-white modal-header" style="background-color: #247297">
                            <h4 class="text-white m-0">Edit Sector: {{ $sector->name }}</h4>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="p-4 modal-body">
                            <form method="post" action="{{ route('admin.industrial-sector.update', $sector->id) }}" class="needs-validation">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label star">Sector Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $sector->name }}" required>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label class="form-label">Parent Sector</label>
                                        <select name="parent_id" class="form-select">
                                            <option value="" {{ $sector->parent_id == null ? 'selected' : '' }}>No Parent (Top Level)</option>
                                            @foreach ($sectors as $s)
                                                {{-- Prevent selecting self as parent --}}
                                                @if($s->id != $sector->id && !$s->parent_id)
                                                    <option value="{{ $s->id }}" {{ $sector->parent_id == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label class="form-label star">Status</label>
                                        <select name="status" class="form-select" required>
                                            <option value="active" {{ $sector->status == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ $sector->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control" rows="3">{{ $sector->description }}</textarea>
                                    </div>
                                </div>

                                <div class="mt-4 text-end">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-warning">Update Sector</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</x-admin-app-layout>
