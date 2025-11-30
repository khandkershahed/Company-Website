@foreach ($losts as $lost_rfq)
    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="lost_rfq_{{ $lost_rfq->id }}" role="tabpanel">
        <div class="card shadow-none">
            <div class="bg-light rounded-3 d-flex justify-content-between align-items-center w-100 p-2">
                <div>
                    <h3 class="mb-0 text-primary ps-3">
                        @if (!Route::is('admin.archived.rfq'))
                            RFQ#
                        @endif{{ $lost_rfq->rfq_code }}
                    </h3>
                </div>
                <div>{{ $lost_rfq->company_name }} @if (!empty($lost_rfq->country))
                        | {{ $lost_rfq->country }}
                    @endif
                </div>
                <div>
                    <!-- Dropdown Selector -->
                    <div class="menu" id="#kt_header_menu" data-kt-menu="true">
                        <div class="btn btn-outline btn-outline-info btn-active-light-info" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3 align-items-center">
                                <span class="menu-title">
                                    Actions
                                    <i class="fas fa-arrow-down ms-2"></i>
                                </span>
                            </span>
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                @if (Auth::user()->myDepartments(['super_admin', 'sales']))
                                    <div class="menu-item">
                                        <a class="menu-link py-3" href="javascript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#pending_rfq_status_update_{{ $lost_rfq->id }}">
                                            <span class="menu-title">Status Update
                                            </span>
                                        </a>

                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link py-3" href="javascript:void(0);">
                                            <span class="menu-title">Track
                                            </span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link py-3" href="{{ route('admin.rfq.destroy', $lost_rfq->id) }}">
                                            <span class="menu-title">Delete
                                            </span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="modal fade" tabindex="-1" id="pending_rfq_status_update_{{ $lost_rfq->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Status Update of
                                            RFQ#{{ $lost_rfq->rfq_code }}</h3>
                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                            data-bs-dismiss="modal" aria-label="Close">
                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                        </div>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <form action="{{ route('admin.rfq.update_status', $lost_rfq->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="col-12 mb-10">
                                                    <label class="form-label required" for="status">Update RFQ
                                                        Status</label>
                                                    <select name="status" id="status"
                                                        class="form-select form-select-solid" data-control="select2"
                                                        data-placeholder="Select an option" data-allow-clear="true">
                                                        <option value="">Select an option</option>
                                                        <option value="rfq_created"
                                                            {{ $lost_rfq->status == 'rfq_created' ? 'selected' : '' }}>
                                                            RFQ Stage</option>
                                                        <option value="assigned"
                                                            {{ $lost_rfq->status == 'assigned' ? 'selected' : '' }}>
                                                            Salesman Assigned</option>
                                                        <option value="quoted"
                                                            {{ $lost_rfq->status == 'quoted' ? 'selected' : '' }}>
                                                            Quoted</option>
                                                        <option value="won"
                                                            {{ $lost_rfq->status == 'won' ? 'selected' : '' }}>
                                                            Won</option>
                                                        <option value="potential"
                                                            {{ $lost_rfq->status == 'potential' ? 'selected' : '' }}>
                                                            Potential</option>
                                                        <option value="negotiating"
                                                            {{ $lost_rfq->status == 'negotiating' ? 'selected' : '' }}>
                                                            Negotiating</option>
                                                        <option value="closed"
                                                            {{ $lost_rfq->status == 'closed' ? 'selected' : '' }}>
                                                            Closed</option>
                                                        <option value="cancelled"
                                                            {{ $lost_rfq->status == 'cancelled' ? 'selected' : '' }}>
                                                            Cancelled</option>
                                                        <option value="lost"
                                                            {{ $lost_rfq->status == 'lost' ? 'selected' : '' }}>
                                                            Lost</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 mb-10">
                                                    <label class="form-label required" for="rfq_type">Convert RFQ
                                                        To</label>
                                                    {{-- $table->enum('rfq_type', ['rfq', 'deal', 'sales', 'order', 'delivery', 'delivery_completed'])->default('rfq')->nullable(); --}}
                                                    <select name="rfq_type" id="rfq_type"
                                                        class="form-select form-select-solid" data-control="select2"
                                                        data-allow-clear="true" data-placeholder="Select an option">
                                                        <option value="">Select an option
                                                        </option>
                                                        <option value="rfq"
                                                            {{ $lost_rfq->rfq_type == 'rfq' ? 'selected' : '' }}>
                                                            RFQ</option>
                                                        <option value="deal"
                                                            {{ $lost_rfq->rfq_type == 'deal' ? 'selected' : '' }}>
                                                            Deal</option>
                                                        <option value="sales"
                                                            {{ $lost_rfq->rfq_type == 'sales' ? 'selected' : '' }}>
                                                            Sales</option>
                                                        <option value="order"
                                                            {{ $lost_rfq->rfq_type == 'order' ? 'selected' : '' }}>
                                                            Order</option>
                                                        <option value="delivery"
                                                            {{ $lost_rfq->rfq_type == 'delivery' ? 'selected' : '' }}>
                                                            Delivery Stage</option>
                                                        <option value="delivery_completed"
                                                            {{ $lost_rfq->rfq_type == 'delivery_completed' ? 'selected' : '' }}>
                                                            Delivery Completed</option>
                                                    </select>
                                                </div>

                                            </form>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary rounded-0">Save
                                            changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div>
                        <select class="form-select form-select-sm lostRFQ" id="tabSelector">
                            <option value="track_tab_{{ $lost_rfq->id }}">Track</option>
                            <option value="message_tab_{{ $lost_rfq->id }}">Messages</option>
                            <option value="delete_{{ $lost_rfq->id }}">Delete</option>
                        </select>
                    </div> --}}



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
                                    <div>
                                        <button class="btn btn-light bg-white py-2" data-bs-toggle="modal"
                                            data-bs-target="#lostRfqDetails-{{ $lost_rfq->id }}">Details</button>
                                    </div>
                                </div>
                                <div class="modal fade" tabindex="-1" id="lostRfqDetails-{{ $lost_rfq->id }}">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="py-3 modal-header">
                                                <!--begin::Modal title-->
                                                <h2>
                                                    RFQ Details (@if (!Route::is('admin.archived.rfq'))
                                                        RFQ#
                                                    @endif{{ $lost_rfq->rfq_code }})
                                                </h2>
                                                <div class="btn btn-sm btn-icon btn-active-color-primary"
                                                    data-bs-dismiss="modal">
                                                    <i class="fas fa-xmark fs-1"></i>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <div class="modal-body">
                                                <div class="shadow-none card">
                                                    <div class="p-0 card-body">
                                                        <div class="table-responsive">
                                                            @php
                                                                $infoTables = [];

                                                                // Shipping Info
                                                                if (!empty($lost_rfq->shipping_name)) {
                                                                    $infoTables[] = [
                                                                        'title' => 'Shipping Info',
                                                                        'rows' => [
                                                                            ['Name', $lost_rfq->shipping_name],
                                                                            [
                                                                                'Email',
                                                                                '<a href="mailto:' .
                                                                                $lost_rfq->shipping_email .
                                                                                '" style="color:#ae0a46;">' .
                                                                                $lost_rfq->shipping_email .
                                                                                '</a>',
                                                                            ],
                                                                            ['Phone', $lost_rfq->shipping_phone],
                                                                            [
                                                                                'Company Name',
                                                                                $lost_rfq->shipping_company_name,
                                                                            ],
                                                                            [
                                                                                'Designation',
                                                                                $lost_rfq->shipping_designation,
                                                                            ],
                                                                            ['Address', $lost_rfq->shipping_address],
                                                                            ['Country', $lost_rfq->shipping_country],
                                                                            ['City', $lost_rfq->shipping_city],
                                                                            ['Zip Code', $lost_rfq->shipping_zip_code],
                                                                        ],
                                                                    ];
                                                                }

                                                                // End-User Info
                                                                if (!empty($lost_rfq->end_user_name)) {
                                                                    $infoTables[] = [
                                                                        'title' => 'End-User Info',
                                                                        'rows' => [
                                                                            ['Name', $lost_rfq->end_user_name],
                                                                            [
                                                                                'Email',
                                                                                '<a href="mailto:' .
                                                                                $lost_rfq->end_user_email .
                                                                                '" style="color:#ae0a46;">' .
                                                                                $lost_rfq->end_user_email .
                                                                                '</a>',
                                                                            ],
                                                                            ['Phone', $lost_rfq->end_user_phone],
                                                                            [
                                                                                'Company Name',
                                                                                $lost_rfq->end_user_company_name,
                                                                            ],
                                                                            [
                                                                                'Designation',
                                                                                $lost_rfq->end_user_designation,
                                                                            ],
                                                                            ['Address', $lost_rfq->end_user_address],
                                                                            ['Country', $lost_rfq->end_user_country],
                                                                            ['City', $lost_rfq->end_user_city],
                                                                            ['Zip Code', $lost_rfq->end_user_zip_code],
                                                                        ],
                                                                    ];
                                                                }

                                                                // Project Info
                                                                if (!empty($lost_rfq->project_name)) {
                                                                    $infoTables[] = [
                                                                        'title' => 'Project Info',
                                                                        'rows' => [
                                                                            ['Project', $lost_rfq->project_name],
                                                                            ['Status', $lost_rfq->project_status],
                                                                            ['Budget', $lost_rfq->budget],
                                                                            [
                                                                                'Purchase Date',
                                                                                $lost_rfq->approximate_delivery_time,
                                                                            ],
                                                                        ],
                                                                    ];
                                                                }
                                                            @endphp

                                                            @foreach (array_chunk($infoTables, 2) as $tablePair)
                                                                <table width="100%" cellpadding="0" cellspacing="0"
                                                                    border="0" style="table-layout:fixed;">
                                                                    <tr>
                                                                        @foreach ($tablePair as $table)
                                                                            <td class="u-col" valign="top"
                                                                                width="50%"
                                                                                style="padding: 0 10px; font-size: 12px;">
                                                                                <table width="100%" cellpadding="0"
                                                                                    cellspacing="0" border="0"
                                                                                    style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px;">
                                                                                    <tr>
                                                                                        <th colspan="2"
                                                                                            style="background-color:#d3d3d3; padding:10px; font-size:14px; text-align:center;">
                                                                                            {{ $table['title'] }}
                                                                                        </th>
                                                                                    </tr>
                                                                                    @foreach ($table['rows'] as [$label, $value])
                                                                                        <tr>
                                                                                            <th
                                                                                                style="background:#f1f1f1;padding:10px; text-align:left; font-weight:400; width:130px;">
                                                                                                {{ $label }}
                                                                                            </th>
                                                                                            <td
                                                                                                style="padding:10px; border-bottom:1px solid #eee;">
                                                                                                {!! $value !!}
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </table>
                                                                            </td>
                                                                        @endforeach
                                                                    </tr>
                                                                </table>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
