<div class="mt-4 tab-pane fade active show" id="quotesDeals" role="tabpanel">
    <div class="table-responsive" style="max-height: 630px; overflow-y: auto;">
        <table class="table border rounded table-row-bordered dataTable">
            <thead class="bg-light">
                <tr class="text-center text-gray-800 fw-bold fs-6 px-7">
                    <th width="8%" class="ps-2">Date</th>
                    <th width="8%">Salesperson</th>
                    <th width="8%">Client</th>
                    <th width="8%">Country</th>
                    <th width="8%">Item</th>
                    <th width="8%">Deal Type</th>
                    <th width="8%">Value ($)</th>
                    <th width="8%">Probability (%)</th>
                    <th width="8%">Weighted ($)</th>
                    <th width="8%">Expected Close</th>
                    <th width="8%">Stage</th>
                    <th width="8%">Status</th>
                </tr>
            </thead>

            <tbody class="text-center" style="color: #7B7B7B;">
                <tr>
                    <td class="ps-2">08-Nov-2025</td>
                    <td>John Doe</td>
                    <td>Existing</td>
                    <td>USA</td>
                    <td>Product A</td>
                    <td>New</td>
                    <td>$10,000.00</td>
                    <td>50%</td>
                    <td>$5,000.00</td>
                    <td>15-Dec-2025</td>
                    <td>Qualification</td>
                    <td>
                        <span class="badge bg-warning text-dark">Pending</span>
                    </td>
                </tr>

                <tr>
                    <td class="ps-2">05-Nov-2025</td>
                    <td>Jane Smith</td>
                    <td>New</td>
                    <td>Canada</td>
                    <td>Service B</td>
                    <td>Renewal</td>
                    <td>$25,000.00</td>
                    <td>100%</td>
                    <td>$25,000.00</td>
                    <td>01-Nov-2025</td>
                    <td>Closed</td>
                    <td>
                        <span class="badge bg-success">Won</span>
                    </td>
                </tr>

                <tr>
                    <td class="ps-2">01-Nov-2025</td>
                    <td>Mike Lee</td>
                    <td>Existing</td>
                    <td>UK</td>
                    <td>Product A</td>
                    <td>New</td>
                    <td>$50,000.00</td>
                    <td>75%</td>
                    <td>$37,500.00</td>
                    <td>20-Nov-2025</td>
                    <td>Proposal</td>
                    <td>
                        <span class="badge bg-primary">Negotiation</span>
                    </td>
                </tr>

                <tr>
                    <td class="ps-2">15-Oct-2025</td>
                    <td>Sarah Chen</td>
                    <td>New</td>
                    <td>Australia</td>
                    <td>Service C</td>
                    <td>New</td>
                    <td>$5,000.00</td>
                    <td>0%</td>
                    <td>$0.00</td>
                    <td>01-Nov-2025</td>
                    <td>Closed</td>
                    <td>
                        <span class="badge bg-danger">Lost</span>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
<div class="mt-4 tab-pane fade" id="mainDeals" role="tabpanel">
    <div class="row">
        <div class="col-lg-9">
            <div class="table-responsive" style="max-height: 630px; overflow-y: auto;">
                <table class="table border rounded table-row-bordered dataTable">
                    <thead class="bg-light">
                        <tr class="text-center text-gray-800 fw-bold fs-6 px-7">
                            <th width="12%" class="ps-2">Client</th>
                            <th width="12%">Item</th>
                            <th width="12%">Value</th>
                            <th width="12%">Country</th>
                            <th width="12%">Reason</th>
                            <th width="12%">Stage</th>
                            <th width="12%">Date</th>
                            <th width="12%">Owner</th>
                        </tr>
                    </thead>

                    <tbody class="text-center" style="color: #7B7B7B;">
                        <tr>
                            <td class="ps-2">TechCorp</td>
                            <td>Software License</td>
                            <td>$15,000.00</td>
                            <td>USA</td>
                            <td>New project</td>
                            <td>
                                <span class="badge bg-warning text-dark">Pending</span>
                            </td>
                            <td>09-Nov-2025</td>
                            <td>John Doe</td>
                        </tr>

                        <tr>
                            <td class="ps-2">Global Inc.</td>
                            <td>Consulting</td>
                            <td>$50,000.00</td>
                            <td>UK</td>
                            <td>Expansion</td>
                            <td>
                                <span class="badge bg-primary">Negotiation</span>
                            </td>
                            <td>05-Nov-2025</td>
                            <td>Jane Smith</td>
                        </tr>

                        <tr>
                            <td class="ps-2">Alpha LLC</td>
                            <td>Hardware</td>
                            <td>$20,000.00</td>
                            <td>Canada</td>
                            <td>Renewal</td>
                            <td>
                                <span class="badge bg-success">Won</span>
                            </td>
                            <td>01-Nov-2025</td>
                            <td>John Doe</td>
                        </tr>

                        <tr>
                            <td class="ps-2">Beta Co.</td>
                            <td>Service</td>
                            <td>$5,000.00</td>
                            <td>Australia</td>
                            <td>Price</td>
                            <td>
                                <span class="badge bg-danger">Lost</span>
                            </td>
                            <td>28-Oct-2025</td>
                            <td>Mike Lee</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="shadow-sm card">
                <div class="card-body">
                    <div class="text-center d-flex flex-column justify-content-center align-items-center">
                        <h2 class=""> Lost Deals by Reason </h2>
                        <div
                            id="kt_chart_widgets_22_chart_1"
                            class="py-5 mx-auto w-100 ps-10">
                        </div>
                    </div>
                    <div class="mx-auto w-50">
                        <div class="mb-2 d-flex align-items-center">
                            <div class="bullet bullet-dot w-8px h-7px bg-success me-2"></div>
                            <div class="fs-8 fw-semibold text-muted">Reason One(133)</div>
                        </div>
                        <div class="mb-2 d-flex align-items-center">
                            <div class="bullet bullet-dot w-8px h-7px bg-primary me-2"></div>
                            <div class="fs-8 fw-semibold text-muted">Reason Two(9)</div>
                        </div>
                        <div class="mb-2 d-flex align-items-center">
                            <div class="bullet bullet-dot w-8px h-7px bg-info me-2"></div>
                            <div class="fs-8 fw-semibold text-muted">Reason Three(2)</div>
                        </div>
                        <div class="mb-2 d-flex align-items-center">
                            <div class="bullet bullet-dot w-8px h-7px bg-danger me-2"></div>
                            <div class="fs-8 fw-semibold text-muted">Reason Four(3)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-4 tab-pane fade" id="lostDeals" role="tabpanel">
    <div class="row">
        <div class="col-lg-9">
            <div class="table-responsive" style="max-height: 530px; overflow-y: auto;">
                <table class="table border rounded table-row-bordered dataTable">
                    <thead class="bg-light">
                        <tr class="text-center text-gray-800 fw-bold fs-6 px-7">
                            <th width="12.5%" class="ps-2">Client</th>
                            <th width="12.5%">Item</th>
                            <th width="12.5%">Value</th>
                            <th width="12.5%">Country</th>
                            <th width="12.5%">Reason</th>
                            <th width="12.5%">Stage</th>
                            <th width="12.5%">Date</th>
                            <th width="12.5%">Owner</th>
                        </tr>
                    </thead>

                    <tbody class="text-center" style="color: #7B7B7B;">
                        <tr>
                            <td class="ps-2">TechCorp</td>
                            <td>Software License</td>
                            <td>$15,000.00</td>
                            <td>USA</td>
                            <td>New project</td>
                            <td>
                                <span class="badge bg-warning text-dark">Pending</span>
                            </td>
                            <td>09-Nov-2025</td>
                            <td>John Doe</td>
                        </tr>

                        <tr>
                            <td class="ps-2">Global Inc.</td>
                            <td>Consulting</td>
                            <td>$50,000.00</td>
                            <td>UK</td>
                            <td>Expansion</td>
                            <td>
                                <span class="badge bg-primary">Negotiation</span>
                            </td>
                            <td>05-Nov-2025</td>
                            <td>Jane Smith</td>
                        </tr>

                        <tr>
                            <td class="ps-2">Alpha LLC</td>
                            <td>Hardware</td>
                            <td>$20,000.00</td>
                            <td>Canada</td>
                            <td>Renewal</td>
                            <td>
                                <span class="badge bg-success">Won</span>
                            </td>
                            <td>01-Nov-2025</td>
                            <td>John Doe</td>
                        </tr>

                        <tr>
                            <td class="ps-2">Beta Co.</td>
                            <td>Service</td>
                            <td>$5,000.00</td>
                            <td>Australia</td>
                            <td>Price</td>
                            <td>
                                <span class="badge bg-danger">Lost</span>
                            </td>
                            <td>28-Oct-2025</td>
                            <td>Mike Lee</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="shadow-sm card">
                <div class="card-body">
                    <div class="text-center d-flex flex-column justify-content-center align-items-center">
                        <h2 class=""> Lost Deals by Reason </h2>
                        <div
                            id="kt_chart_widgets_22_chart_1"
                            class="py-5 mx-auto w-100 ps-10">
                        </div>
                    </div>
                    <div class="mx-auto w-50">
                        <div class="mb-2 d-flex align-items-center">
                            <div class="bullet bullet-dot w-8px h-7px bg-success me-2"></div>
                            <div class="fs-8 fw-semibold text-muted">Reason One(133)</div>
                        </div>
                        <div class="mb-2 d-flex align-items-center">
                            <div class="bullet bullet-dot w-8px h-7px bg-primary me-2"></div>
                            <div class="fs-8 fw-semibold text-muted">Reason Two(9)</div>
                        </div>
                        <div class="mb-2 d-flex align-items-center">
                            <div class="bullet bullet-dot w-8px h-7px bg-info me-2"></div>
                            <div class="fs-8 fw-semibold text-muted">Reason Three(2)</div>
                        </div>
                        <div class="mb-2 d-flex align-items-center">
                            <div class="bullet bullet-dot w-8px h-7px bg-danger me-2"></div>
                            <div class="fs-8 fw-semibold text-muted">Reason Four(3)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>