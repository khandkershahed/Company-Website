@foreach ($rfqs as $rfq)
<div class="modal fade" id="assignRfqModal-{{ $rfq->id }}" tabindex="-1" aria-labelledby="assignRfqModalLabel-{{ $rfq->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" id="assignRfqModalLabel-{{ $rfq->id }}">
                    Assign RFQ #{{ $rfq->rfq_code }} to Sales Manager
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="border shadow-none card">
                    <div class="py-2 card-header bg-light">
                        <h6 class="m-0 fw-semibold">Assign Sales Manager</h6>
                    </div>
                    <div class="p-3 card-body">
                        <form method="POST" action="{{ route('assign.salesmanager-role', $rfq->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <!-- Leader L1 -->
                                <div class="col-lg-6">
                                    <label for="sales_man_id_L1-{{ $rfq->id }}" class="form-label">Sales Manager Name (Leader - L1) <span class="text-danger">*</span></label>
                                    <select name="sales_man_id_L1" id="sales_man_id_L1-{{ $rfq->id }}" class="form-select" data-control="select2" data-placeholder="Select Sales Manager" data-allow-clear="true" required>
                                        <option></option>
                                        @foreach ($users as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Team T1 -->
                                <div class="col-lg-6">
                                    <label for="sales_man_id_T1-{{ $rfq->id }}" class="form-label">Sales Manager Name (Team - T1)</label>
                                    <select name="sales_man_id_T1" id="sales_man_id_T1-{{ $rfq->id }}" class="form-select" data-control="select2" data-placeholder="Select Sales Manager" data-allow-clear="true">
                                        <option></option>
                                        @foreach ($users as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Team T2 -->
                                <div class="col-lg-6">
                                    <label for="sales_man_id_T2-{{ $rfq->id }}" class="form-label">Sales Manager Name (Team - T2)</label>
                                    <select name="sales_man_id_T2" id="sales_man_id_T2-{{ $rfq->id }}" class="form-select" data-control="select2" data-placeholder="Select Sales Manager" data-allow-clear="true">
                                        <option></option>
                                        @foreach ($users as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-4 text-end">
                                <button type="submit" class="btn btn-primary">Assign Sales Manager</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach ($quoteds as $quoted_rfq)
<div class="modal fade" tabindex="-1" id="assignRfqModal-{{ $quoted_rfq->id }}">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Assign RFQ #{{ $quoted_rfq->rfq_code }}
                </h5>
                <button type="button" class="btn-close text-danger" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="pt-0 modal-body">
                <div class="border shadow-none card">
                    <div class="py-0 card-header bg-light min-h-45px">
                        <h5 class="m-0 card-title fw-semibold">
                            Assign Sales Manager
                        </h5>
                    </div>
                    <div class="p-2 card-body">
                        <form method="post" action="{{ route('assign.salesmanager-role', $quoted_rfq->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-5 col-lg-6">
                                    <label for="sales_man_id_L1" class="form-label">Sales Manager Name (Leader -
                                        L1)</label>
                                    <select name="sales_man_id_L1" id="sales_man_id_L1" class="form-control select"
                                        data-control="select2" data-placeholder="Select Sales Manager"
                                        data-allow-clear="true" data-minimum-results-for-search="0" required>
                                        <option></option>
                                        @foreach ($users as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 col-lg-6">
                                    <label for="sales_man_id_T1" class="form-label">Sales Manager Name (Team -
                                        T1)</label>
                                    <select name="sales_man_id_T1" id="sales_man_id_T1" class="form-control select"
                                        data-control="select2" data-placeholder="Select Sales Manager"
                                        data-allow-clear="true" data-minimum-results-for-search="0">
                                        <option></option>
                                        @foreach ($users as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 col-lg-6">
                                    <label for="sales_man_id_T2" class="form-label">Sales Manager Name (Team -
                                        T2)</label>
                                    <select name="sales_man_id_T2" id="sales_man_id_T2"
                                        class="form-control select" data-control="select2"
                                        data-placeholder="Select Sales Manager" data-allow-clear="true"
                                        data-minimum-results-for-search="0">
                                        <option></option>
                                        @foreach ($users as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="float-end btn btn-primary">
                                Assign Sales Manager
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach ($losts as $lost_rfq)
<div class="modal fade" tabindex="-1" id="assignRfqModal-{{ $lost_rfq->id }}">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Assign RFQ #{{ $lost_rfq->rfq_code }}
                </h5>
                <button type="button" class="btn-close text-danger" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="pt-0 modal-body">
                <div class="border shadow-none card">
                    <div class="py-0 card-header bg-light min-h-45px">
                        <h5 class="m-0 card-title fw-semibold">
                            Assign Sales Manager
                        </h5>
                    </div>
                    <div class="p-2 card-body">
                        <form method="post" action="{{ route('assign.salesmanager-role', $lost_rfq->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-5 col-lg-6">
                                    <label for="sales_man_id_L1" class="form-label">Sales Manager Name (Leader -
                                        L1)</label>
                                    <select name="sales_man_id_L1" id="sales_man_id_L1"
                                        class="form-control select" data-control="select2"
                                        data-placeholder="Select Sales Manager" data-allow-clear="true"
                                        data-minimum-results-for-search="0" required>
                                        <option></option>
                                        @foreach ($users as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 col-lg-6">
                                    <label for="sales_man_id_T1" class="form-label">Sales Manager Name (Team -
                                        T1)</label>
                                    <select name="sales_man_id_T1" id="sales_man_id_T1"
                                        class="form-control select" data-control="select2"
                                        data-placeholder="Select Sales Manager" data-allow-clear="true"
                                        data-minimum-results-for-search="0">
                                        <option></option>
                                        @foreach ($users as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 col-lg-6">
                                    <label for="sales_man_id_T2" class="form-label">Sales Manager Name (Team -
                                        T2)</label>
                                    <select name="sales_man_id_T2" id="sales_man_id_T2"
                                        class="form-control select" data-control="select2"
                                        data-placeholder="Select Sales Manager" data-allow-clear="true"
                                        data-minimum-results-for-search="0">
                                        <option></option>
                                        @foreach ($users as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="float-end btn btn-primary">
                                Assign Sales Manager
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach