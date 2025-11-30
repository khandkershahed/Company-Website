@foreach ($quoteds as $quoted_rfq)
    <style>
        .nav-line-tabs .nav-item .nav-link.active,
        .nav-line-tabs .nav-item .nav-link:hover:not(.disabled),
        .nav-line-tabs .nav-item.show .nav-link {
            padding: 10px;
        }
    </style>
    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="pending_rfq_{{ $quoted_rfq->id }}"
        role="tabpanel">
        <div class="shadow-none card">
            <div class="p-2 bg-light rounded-3 d-flex justify-content-between align-items-center w-100">
                <div>
                    <h3 class="mb-0 text-primary ps-3">
                        @if (!Route::is('admin.archived.rfq'))
                            RFQ#
                        @endif{{ $quoted_rfq->rfq_code }}
                    </h3>
                </div>
                <div>
                    {{ $quoted_rfq->company_name }} @if (!empty($quoted_rfq->country))
                        | {{ $quoted_rfq->country }}
                    @endif
                </div>
                <div>
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
                                            data-bs-target="#pending_rfq_status_update_{{ $quoted_rfq->id }}">
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
                                        <a class="menu-link py-3 delete" href="{{ route('admin.rfq.destroy', $quoted_rfq->id) }}">
                                            <span class="menu-title">Delete
                                            </span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="modal fade" tabindex="-1" id="pending_rfq_status_update_{{ $quoted_rfq->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Status Update of
                                            RFQ#{{ $quoted_rfq->rfq_code }}</h3>
                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                            data-bs-dismiss="modal" aria-label="Close">
                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                        </div>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <form action="{{ route('admin.rfq.update_status', $quoted_rfq->id) }}"
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
                                                            {{ $quoted_rfq->status == 'rfq_created' ? 'selected' : '' }}>
                                                            RFQ Stage</option>
                                                        <option value="assigned"
                                                            {{ $quoted_rfq->status == 'assigned' ? 'selected' : '' }}>
                                                            Salesman Assigned</option>
                                                        <option value="quoted"
                                                            {{ $quoted_rfq->status == 'quoted' ? 'selected' : '' }}>
                                                            Quoted</option>
                                                        <option value="won"
                                                            {{ $quoted_rfq->status == 'won' ? 'selected' : '' }}>
                                                            Won</option>
                                                        <option value="potential"
                                                            {{ $quoted_rfq->status == 'potential' ? 'selected' : '' }}>
                                                            Potential</option>
                                                        <option value="negotiating"
                                                            {{ $quoted_rfq->status == 'negotiating' ? 'selected' : '' }}>
                                                            Negotiating</option>
                                                        <option value="closed"
                                                            {{ $quoted_rfq->status == 'closed' ? 'selected' : '' }}>
                                                            Closed</option>
                                                        <option value="cancelled"
                                                            {{ $quoted_rfq->status == 'cancelled' ? 'selected' : '' }}>
                                                            Cancelled</option>
                                                        <option value="lost"
                                                            {{ $quoted_rfq->status == 'lost' ? 'selected' : '' }}>
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
                                                            {{ $quoted_rfq->rfq_type == 'rfq' ? 'selected' : '' }}>
                                                            RFQ</option>
                                                        <option value="deal"
                                                            {{ $quoted_rfq->rfq_type == 'deal' ? 'selected' : '' }}>
                                                            Deal</option>
                                                        <option value="sales"
                                                            {{ $quoted_rfq->rfq_type == 'sales' ? 'selected' : '' }}>
                                                            Sales</option>
                                                        <option value="order"
                                                            {{ $quoted_rfq->rfq_type == 'order' ? 'selected' : '' }}>
                                                            Order</option>
                                                        <option value="delivery"
                                                            {{ $quoted_rfq->rfq_type == 'delivery' ? 'selected' : '' }}>
                                                            Delivery Stage</option>
                                                        <option value="delivery_completed"
                                                            {{ $quoted_rfq->rfq_type == 'delivery_completed' ? 'selected' : '' }}>
                                                            Delivery Completed</option>
                                                    </select>
                                                </div>

                                            
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary rounded-0">Save
                                            changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dropdown Selector -->
                    {{-- <div>
                        <select class="form-select form-select-sm pendingRFQ" id="tabSelector">
                            <option value="track_tab_{{ $quoted_rfq->id }}">Track</option>
                            <option value="message_tab_{{ $quoted_rfq->id }}">Messages</option>
                            <option value="delete_{{ $quoted_rfq->id }}">Delete</option>
                        </select>
                    </div> --}}

                </div>
            </div>
            <!-- Tab Content -->
            <div>
                <div id="track_container_{{ $quoted_rfq->id }}" class="container-visible_{{ $quoted_rfq->id }}">
                    @if ($quoted_rfq->rfq_type == 'rfq')
                        @php
                            $steps = [
                                [
                                    'status' => 'rfq_created',
                                    'label' => 'RFQ Created',
                                    'icon' => 'fa fa-user-check',
                                    'route' => '#assign-manager-' . $quoted_rfq->rfq_code,
                                    'condition' => $quoted_rfq->status == 'rfq_created',
                                ],
                                [
                                    'status' => 'assigned',
                                    'label' =>
                                        'Assigned to ' . optional($quoted_rfq->salesmanL1)->name ??
                                        (optional($quoted_rfq->salesmanT1)->name ??
                                            (optional($quoted_rfq->salesmanT2)->name ?? 'None')),
                                    'icon' => 'fa fa-user-tie',
                                    'route' => route('deal.convert', $quoted_rfq->id),
                                    'condition' => $quoted_rfq->status == 'assigned',
                                ],

                                [
                                    'status' => 'quoted',
                                    'label' => 'Quotation Sent',
                                    'icon' => 'fa fa-paper-plane',
                                    'route' => '#quotation-send-' . $quoted_rfq->rfq_code,
                                    'condition' => $quoted_rfq->status == 'sas_approved',
                                ],
                                // [
                                //     'status' => 'workorder_uploaded',
                                //     'label' => 'Work Order Uploaded',
                                //     'icon' => 'fa fa-file-upload',
                                //     'route' => '#Work-order-' . $quoted_rfq->rfq_code,
                                //     'condition' => $quoted_rfq->status == 'quoted',
                                // ],
                                // [
                                //     'status' => 'invoice_sent',
                                //     'label' => 'Invoice Sent',
                                //     'icon' => 'fa fa-file-invoice',
                                //     'route' => '#invoice-send-' . $quoted_rfq->rfq_code,
                                //     'condition' => $quoted_rfq->status == 'workorder_uploaded',
                                // ],
                                // [
                                //     'status' => 'proof_of_payment_uploaded',
                                //     'label' => 'Proof of Payment Uploaded',
                                //     'icon' => 'fa fa-receipt',
                                //     'route' => '#proofpayment-' . $quoted_rfq->rfq_code,
                                //     'condition' => $quoted_rfq->status == 'invoice_sent',
                                // ],
                            ];
                            // Find current step index
                            $currentIndex = array_search($quoted_rfq->status, array_column($steps, 'status'));
                        @endphp

                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-12">
                                <div class="trackNavbar">
                                    <ul class="nav nav-tabs justify-content-between position-relative" role="tablist">
                                        @foreach ($steps as $index => $step)
                                            @php
                                                $isActive = $index === $currentIndex;
                                                $isCompleted = $index < $currentIndex;
                                                $isDisabled = $index > $currentIndex;
                                                $icon = $step['icon'] ?? 'fas fa-truck-moving';
                                            @endphp

                                            <li
                                                class="nav-item step-item position-relative {{ $isDisabled ? 'inactive' : ($isActive ? 'active' : 'completed') }}">
                                                <a href="{{ $isDisabled ? '#' : $step['route'] }}"
                                                    class="nav-link {{ $isDisabled ? 'disabled' : ($isActive ? 'active' : '') }}">
                                                    <i class="{{ $icon }} {{ $isActive ? 'jump' : '' }}"></i>
                                                    <span
                                                        class="step-label text-capitalize word-wrap">{{ strtolower($step['label']) }}</span>
                                                </a>

                                                @if ($index < count($steps) - 1)
                                                    {{-- Progress line to next step --}}
                                                    <div
                                                        class="progress-line
                                {{ $index < $currentIndex ? 'progress-full' : ($index == $currentIndex ? 'progress-half' : '') }}">
                                                    </div>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-8 border shadow-none card">
                                <div
                                    class="py-0 card-header bg-light d-flex justify-content-between align-items-center">
                                    <h5 class="m-0 card-title fw-semibold">
                                        Client Information
                                    </h5>
                                    <div>
                                        <button class="py-2 bg-white btn btn-light" data-bs-toggle="modal"
                                            data-bs-target="#quotedRfqDetails-{{ $quoted_rfq->id }}">Details</button>
                                    </div>
                                </div>
                                <div class="modal fade" tabindex="-1" id="quotedRfqDetails-{{ $quoted_rfq->id }}">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="py-3 modal-header">
                                                <!--begin::Modal title-->
                                                <h2>RFQ Details (@if (!Route::is('admin.archived.rfq'))
                                                        RFQ#
                                                    @endif{{ $quoted_rfq->rfq_code }})</h2>
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
                                                                if (!empty($quoted_rfq->shipping_name)) {
                                                                    $infoTables[] = [
                                                                        'title' => 'Shipping Info',
                                                                        'rows' => [
                                                                            ['Name', $quoted_rfq->shipping_name],
                                                                            [
                                                                                'Email',
                                                                                '<a href="mailto:' .
                                                                                $quoted_rfq->shipping_email .
                                                                                '" style="color:#ae0a46;">' .
                                                                                $quoted_rfq->shipping_email .
                                                                                '</a>',
                                                                            ],
                                                                            ['Phone', $quoted_rfq->shipping_phone],
                                                                            [
                                                                                'Company Name',
                                                                                $quoted_rfq->shipping_company_name,
                                                                            ],
                                                                            [
                                                                                'Designation',
                                                                                $quoted_rfq->shipping_designation,
                                                                            ],
                                                                            ['Address', $quoted_rfq->shipping_address],
                                                                            ['Country', $quoted_rfq->shipping_country],
                                                                            ['City', $quoted_rfq->shipping_city],
                                                                            [
                                                                                'Zip Code',
                                                                                $quoted_rfq->shipping_zip_code,
                                                                            ],
                                                                        ],
                                                                    ];
                                                                }

                                                                // End-User Info
                                                                if (!empty($quoted_rfq->end_user_name)) {
                                                                    $infoTables[] = [
                                                                        'title' => 'End-User Info',
                                                                        'rows' => [
                                                                            ['Name', $quoted_rfq->end_user_name],
                                                                            [
                                                                                'Email',
                                                                                '<a href="mailto:' .
                                                                                $quoted_rfq->end_user_email .
                                                                                '" style="color:#ae0a46;">' .
                                                                                $quoted_rfq->end_user_email .
                                                                                '</a>',
                                                                            ],
                                                                            ['Phone', $quoted_rfq->end_user_phone],
                                                                            [
                                                                                'Company Name',
                                                                                $quoted_rfq->end_user_company_name,
                                                                            ],
                                                                            [
                                                                                'Designation',
                                                                                $quoted_rfq->end_user_designation,
                                                                            ],
                                                                            ['Address', $quoted_rfq->end_user_address],
                                                                            ['Country', $quoted_rfq->end_user_country],
                                                                            ['City', $quoted_rfq->end_user_city],
                                                                            [
                                                                                'Zip Code',
                                                                                $quoted_rfq->end_user_zip_code,
                                                                            ],
                                                                        ],
                                                                    ];
                                                                }

                                                                // Project Info
                                                                if (!empty($quoted_rfq->project_name)) {
                                                                    $infoTables[] = [
                                                                        'title' => 'Project Info',
                                                                        'rows' => [
                                                                            ['Project', $quoted_rfq->project_name],
                                                                            ['Status', $quoted_rfq->project_status],
                                                                            ['Budget', $quoted_rfq->budget],
                                                                            [
                                                                                'Purchase Date',
                                                                                $quoted_rfq->approximate_delivery_time,
                                                                            ],
                                                                        ],
                                                                    ];
                                                                }
                                                            @endphp

                                                            @foreach (array_chunk($infoTables, 3) as $tablePair)
                                                                <div class="table-responsive">
                                                                    <table width="100%" cellpadding="0"
                                                                        cellspacing="0" border="0"
                                                                        style="table-layout:fixed;">
                                                                        <tr>
                                                                            @foreach ($tablePair as $table)
                                                                                <td class="u-col" valign="top"
                                                                                    width="50%"
                                                                                    style="padding: 0 10px; font-size: 12px;">
                                                                                    <table width="100%"
                                                                                        cellpadding="0"
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
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                                            <td class="py-1">{{ $quoted_rfq->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Email</th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $quoted_rfq->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Company</th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $quoted_rfq->company_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Phone</th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $quoted_rfq->phone }}</td>
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
                                                            <th class="py-1 text-muted" scope="row">Tentative
                                                                Budget
                                                            </th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $quoted_rfq->budget }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Purchase Date
                                                            </th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">
                                                                {{ $quoted_rfq->approximate_delivery_time }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Delivery
                                                                Country
                                                            </th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $quoted_rfq->shipping_country }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Delivery Zip
                                                                Code
                                                            </th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $quoted_rfq->shipping_zip_code }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Product Information -->
                            <div class="mb-8 border shadow-none card">
                                <div class="py-0 card-header bg-light align-items-center">
                                    <h5 class="m-0 card-title fw-semibold">
                                        Product Information
                                    </h5>
                                    <div>
                                        <button class="py-2 bg-white btn btn-light" data-bs-toggle="modal"
                                            data-bs-target="#quotedRfqProductDetails-{{ $quoted_rfq->id }}">Details</button>
                                    </div>
                                </div>
                                <div class="modal fade" tabindex="-1"
                                    id="quotedRfqProductDetails-{{ $quoted_rfq->id }}">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="py-3 modal-header">
                                                <!--begin::Modal title-->
                                                <h2>RFQ Details (@if (!Route::is('admin.archived.rfq'))
                                                        RFQ#
                                                    @endif{{ $quoted_rfq->rfq_code }})</h2>
                                                <div class="btn btn-sm btn-icon btn-active-color-primary"
                                                    data-bs-dismiss="modal">
                                                    <i class="fas fa-xmark fs-1"></i>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <div class="modal-body">
                                                <div class="shadow-none card">
                                                    <div class="p-0 card-body">
                                                        <table class="table mb-0 align-middle border">
                                                            <thead>
                                                                <tr class="table-light border-bottom">
                                                                    <th style="width: 5%;" class="text-center">SL</th>
                                                                    <th style="width: 70%;">Item Name</th>
                                                                    <th style="width: 10%;" class="text-center">QTY
                                                                    </th>
                                                                    <th style="width: 15%;" class="text-center">Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($quoted_rfq->rfqProducts as $product)
                                                                    <tr
                                                                        style="border-bottom: 1px solid #E2E2E2; background-color: white;">
                                                                        <td class="text-center">{{ $loop->iteration }}
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                {{ $product->product_name ?? 'No Name' }}
                                                                                <br />
                                                                                @if (!empty($product->brand_name) || !empty($product->sku_no) || !empty($product->model_no))
                                                                                    <span>
                                                                                        @if (!empty($product->brand_name))
                                                                                            Brand :
                                                                                            {{ $product->brand_name }}
                                                                                        @endif
                                                                                        @if (!empty($product->sku_no))
                                                                                            |
                                                                                            SKU :
                                                                                            {{ $product->sku_no ?? 'No SKU' }}
                                                                                        @endif
                                                                                        @if (!empty($product->model_no))
                                                                                            |
                                                                                            Model :
                                                                                            {{ $product->model_no ?? 'No Model' }}
                                                                                        @endif
                                                                                    </span>
                                                                                @endif
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center"><span
                                                                                class="fw-semibold">{{ $product->qty }}</span>
                                                                        </td>
                                                                        <td>
                                                                            <div class="btn-group" role="group">
                                                                                <!-- Details Button -->
                                                                                <button class="btn btn-sm btn-primary"
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#details-{{ $loop->iteration }}"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="details-{{ $loop->iteration }}">
                                                                                    <i class="bi bi-info-circle"></i>
                                                                                    Details
                                                                                </button>

                                                                                <!-- Share Button -->
                                                                                @if (!empty($product->image) && file_exists(public_path('storage/' . $product->image)))
                                                                                    <a href="{{ asset('storage/' . $product->image) }}"
                                                                                        download=""
                                                                                        class="text-white btn btn-sm btn-info"
                                                                                        title="Share">
                                                                                        <i class="bi bi-download"></i>
                                                                                    </a>
                                                                                @endif
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Collapsible Details Row -->
                                                                    <tr class="collapse"
                                                                        id="details-{{ $loop->iteration }}">
                                                                        <td colspan="4" class="bg-light">
                                                                            <div class="p-3">
                                                                                <h6 class="mb-2 fw-bold">Product
                                                                                    Details</h6>
                                                                                <ul class="mb-0">
                                                                                    <li><strong>Product
                                                                                            Description:</strong>
                                                                                        {{ $product->product_des ?? 'N/A' }}
                                                                                    </li>
                                                                                    <li><strong>Additional
                                                                                            Info:</strong>
                                                                                        {{ $product->additional_info ?? 'N/A' }}
                                                                                    </li>
                                                                                    {{-- You can add more fields here --}}
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="4"
                                                                            class="py-3 text-center text-muted">
                                                                            No Products Available
                                                                        </td>
                                                                    </tr>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 px-4 card-body">
                                    <div class="px-4 table-responsive table-border">
                                        <table class="table mb-0 table-bordered">
                                            <thead style="border-bottom: 1px solid #E2E2E2;">
                                                <tr>
                                                    <th width="10%" class="ps-3">SL</th>
                                                    <th width="80%">Product Name</th>
                                                    <th width="10%" class="pe-3">Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($quoted_rfq->rfqProducts->count() > 0)
                                                    @foreach ($quoted_rfq->rfqProducts as $product)
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

                            <div class="border shadow-none card">
                                <div class="table-responsive">
                                    @php
                                        $infoTables = [];

                                        // Shipping Info
                                        if (!empty($quoted_rfq->shipping_name)) {
                                            $infoTables[] = [
                                                'title' => 'Shipping Info',
                                                'rows' => [
                                                    ['Name', $quoted_rfq->shipping_name],
                                                    [
                                                        'Email',
                                                        '<a href="mailto:' .
                                                        $quoted_rfq->shipping_email .
                                                        '" style="color:#ae0a46;">' .
                                                        $quoted_rfq->shipping_email .
                                                        '</a>',
                                                    ],
                                                    ['Phone', $quoted_rfq->shipping_phone],
                                                    ['Company Name', $quoted_rfq->shipping_company_name],
                                                    ['Designation', $quoted_rfq->shipping_designation],
                                                    ['Address', $quoted_rfq->shipping_address],
                                                    ['Country', $quoted_rfq->shipping_country],
                                                    ['City', $quoted_rfq->shipping_city],
                                                    ['Zip Code', $quoted_rfq->shipping_zip_code],
                                                ],
                                            ];
                                        }

                                        // End-User Info
                                        if (!empty($quoted_rfq->end_user_name)) {
                                            $infoTables[] = [
                                                'title' => 'End-User Info',
                                                'rows' => [
                                                    ['Name', $quoted_rfq->end_user_name],
                                                    [
                                                        'Email',
                                                        '<a href="mailto:' .
                                                        $quoted_rfq->end_user_email .
                                                        '" style="color:#ae0a46;">' .
                                                        $quoted_rfq->end_user_email .
                                                        '</a>',
                                                    ],
                                                    ['Phone', $quoted_rfq->end_user_phone],
                                                    ['Company Name', $quoted_rfq->end_user_company_name],
                                                    ['Designation', $quoted_rfq->end_user_designation],
                                                    ['Address', $quoted_rfq->end_user_address],
                                                    ['Country', $quoted_rfq->end_user_country],
                                                    ['City', $quoted_rfq->end_user_city],
                                                    ['Zip Code', $quoted_rfq->end_user_zip_code],
                                                ],
                                            ];
                                        }

                                        // Project Info
                                        if (!empty($quoted_rfq->project_name)) {
                                            $infoTables[] = [
                                                'title' => 'Project Info',
                                                'rows' => [
                                                    ['Project', $quoted_rfq->project_name],
                                                    ['Status', $quoted_rfq->project_status],
                                                    ['Budget', $quoted_rfq->budget],
                                                    ['Purchase Date', $quoted_rfq->approximate_delivery_time],
                                                ],
                                            ];
                                        }
                                    @endphp

                                    @foreach (array_chunk($infoTables, 2) as $tablePair)
                                        <table class="stack-table" width="100%" cellpadding="0" cellspacing="0"
                                            border="0" style="margin-top:10px; table-layout:fixed;">
                                            <tr>
                                                @foreach ($tablePair as $table)
                                                    <td class="u-col" valign="top" width="50%"
                                                        style="padding: 0 10px; font-size: 12px;">
                                                        <table width="100%" cellpadding="0" cellspacing="0"
                                                            border="0"
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
    </div>
@endforeach
