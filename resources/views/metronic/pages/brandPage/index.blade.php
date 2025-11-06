<x-admin-app-layout :title="'BrandPage List'">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-info text-center">BrandPage List</h3>
                <div class="card-toolbar">
                    <a href="{{ route('admin.brandPage.create') }}"
                        class="btn btn-outline btn-outline-info btn-active-light-info">Create BrandPage</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table dataTable table-rounded table-striped table-hover border gy-7 gs-7">
                        <thead>
                            <tr>
                                <th class="table-sort-none" width="10%">SL.</th>
                                <th width="20%">Brand Logo</th>
                                <th width="25%">Brand Name</th>
                                <th width="35%">Header</th>
                                <th width="10%" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($brandPages)
                                @foreach ($brandPages as $brandPage)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img class="object-fit-cover"
                                                src="{{ !empty(optional($brandPage->brand)->image) &&
                                                file_exists(public_path('storage/' . optional($brandPage->brand)->image))
                                                    ? asset('storage/' . optional($brandPage->brand)->image)
                                                    : asset('frontend/images/no-brand-img.png') }}" width="50px"
                                                alt="{{ optional($brandPage->brand)->title }}">
                                        </td>
                                        <td>{{ optional($brandPage->brand)->title }}
                                        </td>
                                        <td>{{ Str::words($brandPage->header, 10, '...') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.brandPage.edit', [$brandPage->id]) }}"
                                                class="text-primary me-5">
                                                <i
                                                    class="fa-solid fa-pen-to-square rounded-circle text-primary mx-1"></i>
                                            </a>
                                            <a href="{{ route('admin.brandPage.destroy', [$brandPage->id]) }}"
                                                class="text-danger delete">
                                                <i class="fa-solid fa-trash rounded-circle text-danger mx-1"></i>
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
