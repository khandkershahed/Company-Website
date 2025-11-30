<x-admin-app-layout :title="'Tender Sites'">
    <div class="p-4 container-fluid">

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card rounded-4">
            <div class="p-5 text-white border card-header d-flex justify-content-between align-items-center"
                style="background: linear-gradient(90deg, #3b82f6, #3b82f6);">
                <div>
                    <h1 class="mb-0 text-white fw-semibold">Tender Site List</h1>
                    <span class="">List of all tender sites with detailed info</span>
                </div>
                <div class="d-flex align-items-center">
                    {{-- Filter Form --}}
                    <form action="{{ route('admin.tender-sites.index') }}" method="GET" id="filterForm"
                        class="d-flex align-items-center">
                        <select class="py-3 w-150px form-select filterCountry form-select-sm form-select-solid"
                            data-control="select2" data-placeholder="Select Sector" data-allow-clear="true"
                            id="filterCountry" name="category" onchange="this.form.submit()">
                            <option></option>
                            @foreach ($sectors as $sector)
                                <option value="{{ optional($sector)->id }}"
                                    {{ request('category') == optional($sector)->id ? 'selected' : '' }}>
                                    {{ optional($sector)->name }}
                                </option>
                            @endforeach
                        </select>
                        @if (request('category'))
                            <a href="{{ route('admin.tender-sites.index') }}" class="btn btn-light btn-sm ms-2"
                                title="Reset Filter"><i class="bi bi-x-lg"></i></a>
                        @endif
                    </form>

                    <a href="{{ route('admin.tender-sites.create') }}" class="py-4 btn btn-primary btn-sm ms-3">
                        <i class="bi bi-plus-lg"></i> Add Site
                    </a>
                </div>
            </div>
            <div class="p-5 pt-0 card-body">
                <div class="table-responsive">
                    <table class="table mb-0 align-middle border dataTable table-hover rounded-4">
                        <thead class="table-light rounded-4">
                            <tr class="rounded-4">
                                <th width="3%" class="ps-5">Sl</th>
                                <th width="10%">Organization</th>
                                <th width="10%">Site URL</th>
                                <th width="10%">Site Contact</th>
                                <th width="6%">Enlisted ?</th>
                                <th width="6%">eProcure ?</th>
                                <th width="8%">Participated ?</th>
                                <th width="12%">Address</th>
                                <th width="10%">Contact No.</th>
                                <th width="10%">Progress</th>
                                <th width="5%">Status</th>
                                <th width="11%" class="text-end pe-10">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tenderSites as $index => $site)
                                <tr class="border-b">
                                    <td class="ps-5">{{ $tenderSites->firstItem() + $index }}</td>
                                    <td>
                                        {{ $site->organization }}
                                        @if ($site->industrialSector)
                                            <br><span
                                                class="badge badge-light-primary fw-bold">{{ $site->industrialSector->name }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ $site->site_url }}" target="_blank"
                                            class="text-decoration-underline">
                                            {{ Str::limit($site->site_url, 20) }}
                                        </a>
                                    </td>
                                    <td>{{ $site->site_contact }}</td>

                                    {{-- Enlisted --}}
                                    <td class="text-center">
                                        @if ($site->enlisted)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-warning text-dark">No</span>
                                        @endif
                                    </td>

                                    {{-- eProcure --}}
                                    <td class="text-center">
                                        @if ($site->eprocure)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-warning text-dark">No</span>
                                        @endif
                                    </td>

                                    {{-- Participated --}}
                                    <td class="text-center">
                                        @if ($site->participated)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-warning text-dark">No</span>
                                        @endif
                                    </td>

                                    <td>{{ Str::limit($site->address, 30) }}</td>

                                    <td>
                                        <a href="tel:{{ $site->contact_no }}" class="text-decoration-underline">
                                            {{ $site->contact_no }}
                                        </a>
                                    </td>

                                    {{-- Progress --}}
                                    <td>
                                        @php
                                            $progressColor = 'bg-primary';
                                            if ($site->progress < 40) {
                                                $progressColor = 'bg-danger';
                                            } elseif ($site->progress < 80) {
                                                $progressColor = 'bg-warning';
                                            } else {
                                                $progressColor = 'bg-success';
                                            }
                                        @endphp
                                        <div class="progress" style="height:8px;">
                                            <div class="progress-bar {{ $progressColor }}" role="progressbar"
                                                style="width: {{ $site->progress }}%;"></div>
                                        </div>
                                        <small class="text-muted">{{ $site->progress }}%</small>
                                    </td>

                                    {{-- Status --}}
                                    <td>
                                        @if ($site->status == 'Active')
                                            <span class="badge bg-success">Active</span>
                                        @elseif($site->status == 'Pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @else
                                            <span class="badge bg-primary">Completed</span>
                                        @endif
                                    </td>

                                    <td class="text-end pe-4">
                                        <a href="{{ route('admin.tender-sites.edit', $site->id) }}"
                                            class="px-3 btn btn-sm btn-light text-success" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a class="delete px-3 btn btn-sm btn-light"
                                            href="{{ route('admin.tender-sites.destroy', $site->id) }}">
                                            <i class="fas fa-trash-alt text-danger"></i>
                                        </a>
                                        {{-- <form action="{{ route('admin.tender-sites.destroy', $site->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this site?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 btn btn-sm btn-light text-danger" title="Delete">
                                            <i class="bi bi-trash text-danger"></i>
                                        </button>
                                    </form> --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center py-4">No tender sites found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $tenderSites->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                //
            });
        </script>
    @endpush
</x-admin-app-layout>
