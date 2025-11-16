<x-admin-app-layout :title="'All Catalogues'">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-info text-center">Catalogues List</h3>
                <div class="card-toolbar">
                    <a href="{{ route('admin.catalogues.create') }}"
                        class="btn btn-outline btn-outline-info btn-active-light-info">Add Catalogues</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table dataTable table-rounded table-striped table-hover border gy-7 gs-7">
                        <thead>
                            <tr class="bg-secondary border-secondary text-black fw-bold text-center">
                                <th class="" width="8%">SL.</th>
                                <th class="" width="25%">Category</th>
                                <th class="" width="45%">Source Name</th>
                                <th class="" width="12%">PDF</th>
                                <th class="" width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pdfs as $pdf)
                                <tr class="text-black">
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ ucfirst($pdf->category) }}</td>
                                    <td class="text-center fs-3">
                                        @if ($pdf->category == 'brand')
                                            {{ optional($pdf->brand)->title ?? 'N/A' }}
                                        @elseif ($pdf->category == 'product')
                                            {{ optional($pdf->product)->name ?? 'N/A' }}
                                        @elseif ($pdf->category == 'industry')
                                            {{ optional($pdf->industry)->title ?? 'N/A' }}
                                        @elseif ($pdf->category == 'solution')
                                            {{ optional($pdf->solution)->name ?? 'N/A' }}
                                        @elseif ($pdf->category == 'company')
                                            Company Documents
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a class="me-7" href="{{ asset('storage/files/' . $pdf->document) }}" download="">
                                            <i class="fas fa-download text-success fw-bolder"></i>
                                        </a>
                                        <a href="{{ asset('storage/files/' . $pdf->document) }}" target="_blank">
                                            <i class="fas fa-eye text-primary fw-bolder"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-inline-flex text-center">
                                            <a href="{{ route('admin.catalogues.edit', $pdf->id) }}" class="text-primary me-7">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="{{ route('admin.catalogues.destroy', $pdf->id) }}"
                                                class="ms-3 delete">
                                                <i class="fa-solid fa-trash-alt text-danger"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
