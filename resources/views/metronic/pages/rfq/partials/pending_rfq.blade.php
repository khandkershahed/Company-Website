@foreach ($rfqs as $rfq)
<div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="pending_rfq_{{ $rfq->id }}"
    role="tabpanel">
    <div class="shadow-none card border-0">
        <div class="p-4 bg-light rounded-3 d-flex justify-content-between align-items-center w-100">
            <div class="d-flex align-items-center">
                <p class="mb-0 text-black ps-3">
                    @if (!Route::is('admin.archived.rfq')) RFQ# @endif{{ $rfq->rfq_code }}
                </p><span class="px-1">|</span>
                <p class="mb-0 text-muted ps-1">{{ $rfq->company_name }}@if(!empty($rfq->country))<span class="px-1">|</span>{{ $rfq->country }}</p>
                @endif
            </div>
            <div>
                <!-- Dropdown Selector -->
                <div>
                    <select class="form-select form-select-sm pendingRFQ" id="tabSelector">
                        <option value="track_tab_{{ $rfq->id }}">Track</option>
                        {{-- <option value="message_tab_{{ $rfq->id }}">Messages</option> --}}
                        <option value="delete_{{ $rfq->id }}">Delete</option>
                    </select>
                </div>

            </div>
        </div>
        <!-- Tab Content -->
        <div>
            <div id="track_container_{{ $rfq->id }}" class="container-visible_{{ $rfq->id }}">
                @if ($rfq->rfq_type == 'rfq')
                @php
                $steps = [
                [
                'status' => 'rfq_created',
                'label' => 'RFQ Created',
                'icon' => 'fa fa-user-check',
                'route' => '#assign-manager-' . $rfq->rfq_code,
                'condition' => $rfq->status == 'rfq_created',
                ],
                [
                'status' => 'assigned',
                'label' => 'Salesman Assigned',
                'icon' => 'fa fa-user-tie',
                'route' => route('deal.convert', $rfq->id),
                'condition' => $rfq->status == 'assigned',
                ],
                [
                'status' => 'deal_created',
                'label' => 'Deal Created',
                'icon' => 'fa fa-file-alt',
                'route' => route('deal-sas.show', $rfq->rfq_code),
                'condition' => $rfq->status == 'deal_created',
                ],
                [
                'status' => 'sas_created',
                'label' => 'SAS Created',
                'icon' => 'fa fa-edit',
                'route' => route('deal-sas.edit', $rfq->rfq_code),
                'condition' => $rfq->status == 'sas_created',
                ],
                [
                'status' => 'sas_approved',
                'label' => 'SAS Approved',
                'icon' => 'fa fa-thumbs-up',
                'route' => route('dealsasapprove', $rfq->rfq_code),
                'condition' => $rfq->status == 'sas_created',
                ],
                [
                'status' => 'quoted',
                'label' => 'Quotation Sent',
                'icon' => 'fa fa-paper-plane',
                'route' => '#quotation-send-' . $rfq->rfq_code,
                'condition' => $rfq->status == 'sas_approved',
                ],
                [
                'status' => 'workorder_uploaded',
                'label' => 'Work Order Uploaded',
                'icon' => 'fa fa-file-upload',
                'route' => '#Work-order-' . $rfq->rfq_code,
                'condition' => $rfq->status == 'quoted',
                ],
                [
                'status' => 'invoice_sent',
                'label' => 'Invoice Sent',
                'icon' => 'fa fa-file-invoice',
                'route' => '#invoice-send-' . $rfq->rfq_code,
                'condition' => $rfq->status == 'workorder_uploaded',
                ],
                [
                'status' => 'proof_of_payment_uploaded',
                'label' => 'Proof of Payment Uploaded',
                'icon' => 'fa fa-receipt',
                'route' => '#proofpayment-' . $rfq->rfq_code,
                'condition' => $rfq->status == 'invoice_sent',
                ],
                ];
                // Find current step index
                $currentIndex = array_search($rfq->status, array_column($steps, 'status'));
                @endphp
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trackNavbar">
                            <ul class="nav nav-tabs justify-content-between" role="tablist">
                                @php
                                // Find current step index
                                $currentIndex = array_search($rfq->status, array_column($steps, 'status'));
                                @endphp

                                @foreach ($steps as $index => $step)
                                @php
                                $isActive = $index === $currentIndex;
                                $isCompleted = $index < $currentIndex;
                                    $isDisabled=$index> $currentIndex;

                                    // Set icon fallback
                                    $icon = $step['icon'] ?? 'fas fa-truck-moving';
                                    @endphp

                                    <li
                                        class="nav-item {{ $isDisabled ? 'inactive' : ($isActive ? 'active' : '') }}">
                                        <a href="{{ $isDisabled ? '#' : $step['route'] }}"
                                            class="nav-link {{ $isDisabled ? 'disabled' : 'ripple' }} {{ $isActive ? 'active' : '' }}">
                                            <i class="{{ $icon }} {{ $isActive ? 'jump' : '' }}">
                                                <span
                                                    class="text-capitalize word-wrap">{{ strtolower($step['label']) }}</span>
                                            </i>
                                        </a>
                                        <div class="line"></div>
                                    </li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                <hr class="mx-3">
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="p-3 mx-auto">
                            <!-- Client Information -->
                            <div class="shadow-none card mb-8 border">
                                <div class="py-0 card-header bg-light d-flex justify-content-between align-items-center">
                                    <h5 class="m-0 card-title fw-semibold">
                                        Client Information
                                    </h5>
                                    <div>
                                        <button class="btn btn-light bg-white py-2">Details</button>
                                    </div>
                                </div>
                                <div class="p-2 card-body">
                                    <div class="row px-7">
                                        <!-- Left Column -->
                                        <div class="col-md-6">
                                            <div class="table-responsive">
                                                <table class="table mb-0 table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Name</th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $rfq->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Email</th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $rfq->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Company</th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $rfq->company_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Phone</th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $rfq->phone }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Right Column -->
                                        <div class="col-md-6">
                                            <div class="table-responsive">
                                                <table class="table mb-0 table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Tentative Budget</th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $rfq->budget }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Purchase Date</th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $rfq->approximate_delivery_time }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Delivery Country</th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $rfq->shipping_country }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Delivery Zip Code</th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $rfq->shipping_zip_code }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Product Information -->
                            <div class="border shadow-none card mb-8">
                                <div class="py-0 card-header bg-light">
                                    <h5 class="m-0 card-title fw-semibold">
                                        Product Information
                                    </h5>
                                </div>
                                <div class="p-2 card-body px-4">
                                    <div class="table-responsive px-4 table-border">
                                        <table class="table mb-0 table-bordered">
                                            <thead style="border-bottom: 1px solid #E2E2E2;">
                                                <tr>
                                                    <th width="10%" class="ps-3">SL</th>
                                                    <th width="80%">Product Name</th>
                                                    <th width="10%" class="pe-3">Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($rfq->rfqProducts->count() > 0)
                                                @foreach ($rfq->rfqProducts as $product)
                                                <tr>
                                                    <td class="ps-3">{{ $loop->iteration }}</td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td class="pe-3">{{ $product->qty }}</td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="3" class="text-center">No Data Available</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                            <!-- Future Sections -->
                            <div class="border shadow-none card mb-8">
                                <div class="py-0 card-header bg-light">
                                    <h5 class="m-0 card-title fw-semibold">
                                        End User Information
                                    </h5>
                                </div>
                                <div class="p-2 card-body px-4">
                                    Upcoming
                                </div>
                            </div>

                            <div class="border shadow-none card">
                                <div class="py-0 card-header bg-light">
                                    <h5 class="m-0 card-title fw-semibold">
                                        Additional Information
                                    </h5>
                                </div>
                                <div class="p-2 card-body px-4">
                                    Coming Soon
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach