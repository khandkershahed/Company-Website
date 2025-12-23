@foreach ($rfqs as $rfq)
<div class="modal fade" id="assignRfqModal-{{ $rfq->id }}" tabindex="-1" aria-labelledby="assignRfqModalLabel-{{ $rfq->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="py-3 modal-header">
                <h5 class="modal-title fw-semibold" id="assignRfqModalLabel-{{ $rfq->id }}">
                    Assign RFQ #{{ $rfq->rfq_code }} to Sales Manager
                </h5>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="fas fa-xmark" style="font-size: 400;"></i>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form method="POST" action="{{ route('assign.salesmanager', $rfq->rfq_code) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <!-- Leader L1 -->
                        <div class="col-lg-6">
                            <label for="sales_man_id_L1-{{ $rfq->id }}" class="form-label">Sales Manager Name (Leader - L1) <span class="text-danger">*</span></label>
                            <select name="sales_man_id_L1" id="sales_man_id_L1-{{ $rfq->id }}" class="form-select" data-control="select2" data-placeholder="Sales Manager Name (Leader - L1)" data-allow-clear="true" required>
                                <option></option>
                                @foreach ($users as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <!-- Team T1 -->
                        <div class="col-lg-6">
                            <label for="sales_man_id_T1-{{ $rfq->id }}" class="form-label">Sales Manager Name (Team - T1)</label>
                            <select name="sales_man_id_T1" id="sales_man_id_T1-{{ $rfq->id }}" class="form-select" data-control="select2" data-placeholder="Sales Manager Name (Team - T1)" data-allow-clear="true">
                                <option></option>
                                @foreach ($users as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Team T2 -->
                        <div class="col-lg-6">
                            <label for="sales_man_id_T2-{{ $rfq->id }}" class="form-label">Sales Manager Name (Team - T2)</label>
                            <select name="sales_man_id_T2" id="sales_man_id_T2-{{ $rfq->id }}" class="form-select" data-control="select2" data-placeholder="Sales Manager Name (Team - T2)" data-allow-clear="true">
                                <option></option>
                                @foreach ($users as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    <!-- Submit Button -->
                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach ($quoteds as $quoted_rfq)
<div class="modal fade" tabindex="-1" id="assignRfqModal-{{ $quoted_rfq->id }}">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="py-3 modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Assign RFQ #{{ $quoted_rfq->rfq_code }}
                </h5>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="fas fa-xmark" style="font-size: 400;"></i>
                </div>
            </div>
            <div class="pt-0 modal-body">
                <form method="POST" action="{{ route('assign.salesmanager', $quoted_rfq->rfq_code) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <!-- Leader L1 -->
                        <div class="col-lg-12">
                            <label for="sales_man_id_L1-{{ $quoted_rfq->id }}" class="form-label">Sales Manager Name (Leader - L1) <span class="text-danger">*</span></label>
                            <select name="sales_man_id_L1" id="sales_man_id_L1-{{ $quoted_rfq->id }}" class="form-select" data-control="select2" data-placeholder="Select Sales Manager" data-allow-clear="true" required>
                                <option></option>
                                @foreach ($users as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <!-- Team T1 -->
                        <div class="col-lg-12">
                            <label for="sales_man_id_T1-{{ $quoted_rfq->id }}" class="form-label">Sales Manager Name (Team - T1)</label>
                            <select name="sales_man_id_T1" id="sales_man_id_T1-{{ $quoted_rfq->id }}" class="form-select" data-control="select2" data-placeholder="Select Sales Manager" data-allow-clear="true">
                                <option></option>
                                @foreach ($users as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Team T2 -->
                        <div class="col-lg-12">
                            <label for="sales_man_id_T2-{{ $quoted_rfq->id }}" class="form-label">Sales Manager Name (Team - T2)</label>
                            <select name="sales_man_id_T2" id="sales_man_id_T2-{{ $quoted_rfq->id }}" class="form-select" data-control="select2" data-placeholder="Select Sales Manager" data-allow-clear="true">
                                <option></option>
                                @foreach ($users as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    <!-- Submit Button -->
                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach ($losts as $lost_rfq)
<div class="modal fade" tabindex="-1" id="assignRfqModal-{{ $lost_rfq->id }}">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="py-3 modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Assign RFQ #{{ $lost_rfq->rfq_code }}
                </h5>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="fas fa-xmark" style="font-size: 400;"></i>
                </div>
            </div>
            <div class="pt-0 modal-body">
                <form method="POST" action="{{ route('assign.salesmanager', $lost_rfq->rfq_code) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <!-- Leader L1 -->
                        <div class="col-lg-12">
                            <label for="sales_man_id_L1-{{ $lost_rfq->id }}" class="form-label">Sales Manager Name (Leader - L1) <span class="text-danger">*</span></label>
                            <select name="sales_man_id_L1" id="sales_man_id_L1-{{ $lost_rfq->id }}" class="form-select" data-control="select2" data-placeholder="Select Sales Manager" data-allow-clear="true" required>
                                <option></option>
                                @foreach ($users as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <!-- Team T1 -->
                        <div class="col-lg-12">
                            <label for="sales_man_id_T1-{{ $lost_rfq->id }}" class="form-label">Sales Manager Name (Team - T1)</label>
                            <select name="sales_man_id_T1" id="sales_man_id_T1-{{ $lost_rfq->id }}" class="form-select" data-control="select2" data-placeholder="Select Sales Manager" data-allow-clear="true">
                                <option></option>
                                @foreach ($users as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Team T2 -->
                        <div class="col-lg-12">
                            <label for="sales_man_id_T2-{{ $lost_rfq->id }}" class="form-label">Sales Manager Name (Team - T2)</label>
                            <select name="sales_man_id_T2" id="sales_man_id_T2-{{ $lost_rfq->id }}" class="form-select" data-control="select2" data-placeholder="Select Sales Manager" data-allow-clear="true">
                                <option></option>
                                @foreach ($users as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    <!-- Submit Button -->
                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
