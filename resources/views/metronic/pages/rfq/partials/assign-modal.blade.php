 @foreach ($rfqs as $rfq)
     <div class="modal fade" tabindex="-1" id="assignRfqModal-{{ $rfq->id }}">
         <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="modalTitleId">
                         Assign RFQ #{{ $rfq->rfq_code }}
                     </h5>
                     <button type="button" class="btn-close text-danger" data-bs-dismiss="modal"
                         aria-label="Close"></button>
                 </div>
                 <div class="pt-0 modal-body">
                     <div class="card shadow-none border">
                         <div class="card-header py-0 bg-light min-h-45px">
                             <h5 class="card-title fw-semibold m-0">
                                 Assign Sales Manager
                             </h5>
                         </div>
                         <div class="card-body p-2">
                             <div class="mb-5">
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
                             <div class="mb-5">
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
                             <div class="mb-5">
                                 <label for="sales_man_id_T2" class="form-label">Sales Manager Name (Team -
                                     T2)</label>
                                 <select name="sales_man_id_T2" id="sales_man_id_T2" class="form-control select"
                                     data-control="select2" data-placeholder="Select Sales Manager"
                                     data-allow-clear="true" data-minimum-results-for-search="0">
                                     <option></option>
                                     @foreach ($users as $manager)
                                         <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                     @endforeach
                                 </select>
                             </div>
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
                     <div class="card shadow-none border">
                         <div class="card-header py-0 bg-light min-h-45px">
                             <h5 class="card-title fw-semibold m-0">
                                 Assign Sales Manager
                             </h5>
                         </div>
                         <div class="card-body p-2">
                             <div class="mb-5">
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
                             <div class="mb-5">
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
                             <div class="mb-5">
                                 <label for="sales_man_id_T2" class="form-label">Sales Manager Name (Team -
                                     T2)</label>
                                 <select name="sales_man_id_T2" id="sales_man_id_T2" class="form-control select"
                                     data-control="select2" data-placeholder="Select Sales Manager"
                                     data-allow-clear="true" data-minimum-results-for-search="0">
                                     <option></option>
                                     @foreach ($users as $manager)
                                         <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                     @endforeach
                                 </select>
                             </div>
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
                     <div class="card shadow-none border">
                         <div class="card-header py-0 bg-light min-h-45px">
                             <h5 class="card-title fw-semibold m-0">
                                 Assign Sales Manager
                             </h5>
                         </div>
                         <div class="card-body p-2">

                             <div class="mb-5">
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
                             <div class="mb-5">
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
                             <div class="mb-5">
                                 <label for="sales_man_id_T2" class="form-label">Sales Manager Name (Team -
                                     T2)</label>
                                 <select name="sales_man_id_T2" id="sales_man_id_T2" class="form-control select"
                                     data-control="select2" data-placeholder="Select Sales Manager"
                                     data-allow-clear="true" data-minimum-results-for-search="0">
                                     <option></option>
                                     @foreach ($users as $manager)
                                         <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                     @endforeach
                                 </select>
                             </div>
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
