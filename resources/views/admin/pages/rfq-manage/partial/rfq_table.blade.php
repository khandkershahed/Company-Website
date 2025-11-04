<style>
    thead {
        background-color: #f9f9f9 !important;
    }
</style>
<table class="rfqDT1 table table-bordered table-hover">
    <thead>
        <tr class="text-center">
            <th width="5%">Sl</th>
            <th width="19%">RFQ Code</th>
            <th width="15%">Created At</th>
            <th width="30%">Client Name (Company)</th>
            <th width="3%">Details</th>
            <th width="8%">Status</th>
            <th width="25%" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($rfqs)
            @foreach ($rfqs as $rfq)
                <tr class="text-center">
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ ucfirst($rfq->rfq_code) }}</td>
                    <td>{{ ucfirst($rfq->create_date) }}</td>
                    <td>{{ ucfirst($rfq->name) }} ({{ ucfirst($rfq->company_name) }})</td>
                    {{-- <td style="text-transform: lowercase;">{{ ucfirst($rfq->email) }}</td> --}}
                    <td><span class="text-muted p-1">{{ ucfirst($rfq->status) }}</span></td>
                    <td>
                        <!-- Show RFQ Details Modal Trigger -->
                        <a href="javascript:void(0);" class="text-info mx-2" title="Show RFQ Details"
                            data-bs-toggle="modal" data-bs-target="#assign-manager-{{ $rfq->rfq_code }}">
                            <i class="fa-regular fa-eye dash-icons"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <!-- Go to Details Link -->
                        <a href="{{ route('admin.single-rfq.show', $rfq->rfq_code) }}" class="text-success"
                            title="Go to Details">
                            <i class="fa-solid fa-display dash-icons me-3"></i>
                        </a>
                        @if ($rfq->status == 'rfq_created')
                            <!-- View & Assign Sales Manager Modal Trigger -->
                            <a href="javascript:void(0);" class="text-primary" data-bs-toggle="modal"
                                title="View & Assign Sales Manager"
                                data-bs-target="#assign-manager-{{ $rfq->rfq_code }}">
                                <i class="fa-solid fa-user-tie dash-icons me-3"></i>
                            </a>
                        @endif
                        @if ($rfq->status == 'assigned')
                            <!-- Convert To Deal Link -->
                            <a href="{{ route('deal.convert', [$rfq->id]) }}" class="text-success"
                                title="Convert To Deal">
                                <i class="icon-pen-plus dash-icons me-3"></i>
                            </a>
                        @endif
                        <!-- Delete Deal Link -->
                        <a href="{{ route('rfq.destroy', [$rfq->id]) }}" class="text-danger delete" title="Delete RFQ">
                            <i class="delete fa-solid fa-trash dash-icons me-2"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

{{-- Modals --}}
@foreach ($rfqs as $rfq)
    <div id="assign-manager-{{ $rfq->rfq_code }}" class="modal fade" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Assign Sales Manager For RFQ No : {{ $rfq->rfq_code }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="post" action="{{ route('assign.salesman', $rfq->rfq_code) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body br-7">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="devider-text mb-0 p-2 pt-0">Client Detils</p>
                                <div class="border card rounded-0">
                                    <div class="row mt-1">
                                        <div class="col-lg-12 d-flex justify-content-between">
                                            <p class="p-2 m-0 text-start">
                                                <span class="text-secondary">Client Type :</span> <br>
                                                {{ !empty($rfq->client_type) ? ucfirst($rfq->client_type) : 'Anonymous' }}
                                            </p>
                                            <p class="p-2 m-0 text-start">
                                                <span class="text-secondary">Name :</span> <br>
                                                {{ ucfirst($rfq->name) }}
                                            </p>
                                            <p class="p-2 m-0 text-start">
                                                <span class="text-secondary">Company Name :</span> <br>
                                                {{ ucfirst($rfq->company_name) }}
                                            </p>
                                            <p class="p-2 m-0 text-start">
                                                <span class="text-secondary">Phone Number : </span> <br>
                                                {{ $rfq->phone }}
                                            </p>
                                            @if ($rfq->call == 1)
                                                <p class="p-2 m-0 text-start">
                                                    <span class="badge bg-success">Call Required</span>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <p class="devider-text mb-0 p-2 pt-0">RFQ Details</p>
                                <div class="border card rounded-0">
                                    <div class="row px-0">
                                        <div class="col-lg-12">
                                            <div class="table-responsive p-2">
                                                <table class="table table-bordered table-striped p-1">
                                                    <thead
                                                        style="background-color: #2472979e !important;color: white !important;">
                                                        @if ($rfq->rfqProducts->count() > 0)
                                                            <tr>
                                                                <th width="80%"> Product Name</th>
                                                                <th width="20%" class="text-center"> Quantity </th>
                                                            </tr>
                                                            @foreach ($rfq->rfqProducts as $product)
                                                                <tr class="text-black bg-white">
                                                                    <td>{{ $product->product_name }}</td>
                                                                    <td class="text-center">{{ $product->qty }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-12 text-center mb-3">
                                <strong>Assign Sales Manager :</strong>
                                <a class="p-1 editRfquser" href="javascript:void(0);">
                                    <i class="ph-note-pencil text-success" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="col-12 Rfquser" style="display:none">
                                <div class="row mb-1 p-2 border">
                                    <div class="col-lg-4">
                                        <div class="col-sm-12">
                                            <p class="mb-0">Leader - L1 <span class="text-danger">*</span>
                                            </p>
                                        </div>
                                        <div class="form-group text-secondary col-sm-12">
                                            <select name="sales_man_id_L1" class="form-control select"
                                                data-minimum-results-for-search="Infinity"
                                                data-placeholder="Choose Sales Manager">
                                                <option></option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">
                                                        {{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="col-sm-12">
                                            <p class="mb-0">Team - T1</p>
                                        </div>
                                        <div class="form-group text-secondary col-sm-12">
                                            <select name="sales_man_id_T1" class="form-control select"
                                                data-minimum-results-for-search="Infinity"
                                                data-placeholder="Choose Sales Manager">
                                                <option></option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">
                                                        {{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="col-sm-12">
                                            <p class="mb-0">Team - T2</p>
                                        </div>
                                        <div class="form-group text-secondary col-sm-12">
                                            <select name="sales_man_id_T2" class="form-control select"
                                                data-minimum-results-for-search="Infinity"
                                                data-placeholder="Choose Sales Manager">
                                                <option></option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">
                                                        {{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border p-1 Rfquser" style="display:none">
                        <div class="row">
                            <div class="col-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
