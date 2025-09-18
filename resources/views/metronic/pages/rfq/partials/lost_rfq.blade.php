@foreach ($losts as $lost_rfq)
    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="lost_rfq_{{ $lost_rfq->id }}" role="tabpanel">
        <div class="card shadow-none">
            <div class="bg-light rounded-3 d-flex justify-content-between align-items-center w-100 p-2">
                <div>
                    <h3 class="mb-0 text-primary ps-3">
                        @if (!Route::is('admin.archived.rfq')) RFQ# @endif{{ $lost_rfq->rfq_code }}
                    </h3>
                </div>
                <div>{{ $lost_rfq->company_name }} @if (!empty($lost_rfq->country))
                        | {{ $lost_rfq->country }}
                    @endif
                </div>
                <div>
                    <!-- Dropdown Selector -->
                    <div>
                        <select class="form-select form-select-sm lostRFQ" id="tabSelector">
                            <option value="track_tab_{{ $lost_rfq->id }}">Track</option>
                            <option value="message_tab_{{ $lost_rfq->id }}">Messages</option>
                            <option value="delete_{{ $lost_rfq->id }}">Delete</option>
                        </select>
                    </div>



                </div>
            </div>
            <!-- Tab Content -->
            <div>
                <div id="track_container_{{ $lost_rfq->id }}" class="container-visible_{{ $lost_rfq->id }}">
                    @if ($lost_rfq->rfq_type == 'rfq')
                        @php
                            $steps = [
                                [
                                    'status' => 'rfq_created',
                                    'label' => 'RFQ Created',
                                    'icon' => 'fa fa-user-check',
                                    'route' => '#assign-manager-' . $lost_rfq->rfq_code,
                                    'condition' => $lost_rfq->status == 'rfq_created',
                                ],
                                [
                                    'status' => 'assigned',
                                    'label' => 'Salesman Assigned',
                                    'icon' => 'fa fa-user-tie',
                                    'route' => route('deal.convert', $lost_rfq->id),
                                    'condition' => $lost_rfq->status == 'assigned',
                                ],
                                [
                                    'status' => 'deal_created',
                                    'label' => 'Deal Created',
                                    'icon' => 'fa fa-file-alt',
                                    'route' => route('deal-sas.show', $lost_rfq->rfq_code),
                                    'condition' => $lost_rfq->status == 'deal_created',
                                ],
                                [
                                    'status' => 'sas_created',
                                    'label' => 'SAS Created',
                                    'icon' => 'fa fa-edit',
                                    'route' => route('deal-sas.edit', $lost_rfq->rfq_code),
                                    'condition' => $lost_rfq->status == 'sas_created',
                                ],
                                [
                                    'status' => 'sas_approved',
                                    'label' => 'SAS Approved',
                                    'icon' => 'fa fa-thumbs-up',
                                    'route' => route('dealsasapprove', $lost_rfq->rfq_code),
                                    'condition' => $lost_rfq->status == 'sas_created',
                                ],
                                [
                                    'status' => 'quoted',
                                    'label' => 'Quotation Sent',
                                    'icon' => 'fa fa-paper-plane',
                                    'route' => '#quotation-send-' . $lost_rfq->rfq_code,
                                    'condition' => $lost_rfq->status == 'sas_approved',
                                ],
                                [
                                    'status' => 'workorder_uploaded',
                                    'label' => 'Work Order Uploaded',
                                    'icon' => 'fa fa-file-upload',
                                    'route' => '#Work-order-' . $lost_rfq->rfq_code,
                                    'condition' => $lost_rfq->status == 'quoted',
                                ],
                                [
                                    'status' => 'invoice_sent',
                                    'label' => 'Invoice Sent',
                                    'icon' => 'fa fa-file-invoice',
                                    'route' => '#invoice-send-' . $lost_rfq->rfq_code,
                                    'condition' => $lost_rfq->status == 'workorder_uploaded',
                                ],
                                [
                                    'status' => 'proof_of_payment_uploaded',
                                    'label' => 'Proof of Payment Uploaded',
                                    'icon' => 'fa fa-receipt',
                                    'route' => '#proofpayment-' . $lost_rfq->rfq_code,
                                    'condition' => $lost_rfq->status == 'invoice_sent',
                                ],
                            ];
                            // Find current step index
                            $currentIndex = array_search($lost_rfq->status, array_column($steps, 'status'));
                        @endphp

                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-12">
                                <div class="trackNavbar">
                                    <ul class="nav nav-tabs justify-content-between" role="tablist">
                                        @php
                                            // Find current step index
                                            $currentIndex = array_search(
                                                $lost_rfq->status,
                                                array_column($steps, 'status'),
                                            );
                                        @endphp

                                        @foreach ($steps as $index => $step)
                                            @php
                                                $isActive = $index === $currentIndex;
                                                $isCompleted = $index < $currentIndex;
                                                $isDisabled = $index > $currentIndex;

                                                // Set icon fallback
                                                $icon = $step['icon'] ?? 'fas fa-truck-moving';
                                            @endphp

                                            <li
                                                class="nav-item {{ $isDisabled ? 'inactive' : ($isActive ? 'active' : '') }}">
                                                <a
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


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card shadow-none border">
                                <div class="card-header py-0 bg-light">
                                    <h5 class="card-title fw-semibold m-0">
                                        Client Information
                                    </h5>
                                </div>
                                <div class="card-body p-2">
                                    <!-- Responsive Table -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Name</th>
                                                    <td>{{ $lost_rfq->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Email</th>
                                                    <td>{{ $lost_rfq->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Company
                                                    </th>
                                                    <td>{{ $lost_rfq->company_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Phone</th>
                                                    <td>{{ $lost_rfq->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Tentative Budget
                                                    </th>
                                                    <td>{{ $lost_rfq->budget }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Purchase Date
                                                    </th>
                                                    <td>{{ $lost_rfq->approximate_delivery_time }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Delivery Country
                                                    </th>
                                                    <td>{{ $lost_rfq->shipping_country }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Delivery Zip Code
                                                    </th>
                                                    <td>{{ $lost_rfq->shipping_zip_code }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow-none border">
                                <div class="card-header py-0 bg-light">
                                    <h5 class="card-title fw-semibold m-0">
                                        Product Information
                                    </h5>
                                </div>
                                <div class="card-body p-2">
                                    <!-- Second table (products list) -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                @if ($lost_rfq->rfqProducts->count() > 0)
                                                    @foreach ($lost_rfq->rfqProducts as $product)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                                {{ $product->product_name }}
                                                            </td>
                                                            <td>
                                                                {{ $product->qty }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr> No Data Available</tr>
                                                @endif

                                            </tbody>
                                        </table>
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
