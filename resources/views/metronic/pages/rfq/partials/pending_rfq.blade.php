@foreach ($rfqs as $rfq)
    <style>
        .nav-line-tabs .nav-item .nav-link.active,
        .nav-line-tabs .nav-item .nav-link:hover:not(.disabled),
        .nav-line-tabs .nav-item.show .nav-link {
            padding: 10px;
        }
    </style>
    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="pending_rfq_{{ $rfq->id }}"
        role="tabpanel">
        <div class="shadow-none card">
            <div class="p-2 bg-light rounded-3 d-flex justify-content-between align-items-center w-100">
                <div>
                    <h3 class="mb-0 text-primary ps-3">
                        @if (!Route::is('admin.archived.rfq'))
                            RFQ#
                        @endif{{ $rfq->rfq_code }}
                    </h3>
                </div>
                <div>{{ $rfq->company_name }} @if (!empty($rfq->country))
                        | {{ $rfq->country }}
                    @endif
                </div>
                <div>
                    <!-- Dropdown Selector -->
                    <div>
                        <select class="form-select form-select-sm pendingRFQ" id="tabSelector">
                            <option value="track_tab_{{ $rfq->id }}">Track</option>
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
                                // [
                                //     'status' => 'deal_created',
                                //     'label' => 'Deal Created',
                                //     'icon' => 'fa fa-file-alt',
                                //     'route' => route('deal-sas.show', $rfq->rfq_code),
                                //     'condition' => $rfq->status == 'deal_created',
                                // ],
                                // [
                                //     'status' => 'sas_created',
                                //     'label' => 'SAS Created',
                                //     'icon' => 'fa fa-edit',
                                //     'route' => route('deal-sas.edit', $rfq->rfq_code),
                                //     'condition' => $rfq->status == 'sas_created',
                                // ],
                                // [
                                //     'status' => 'sas_approved',
                                //     'label' => 'SAS Approved',
                                //     'icon' => 'fa fa-thumbs-up',
                                //     'route' => route('dealsasapprove', $rfq->rfq_code),
                                //     'condition' => $rfq->status == 'sas_created',
                                // ],
                            ];
                            // Find current step index
                            $currentIndex = array_search($rfq->status, array_column($steps, 'status'));
                        @endphp

                        <div class="row justify-content-center align-items-center">
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
                                                $isDisabled = $index > $currentIndex;

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


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-8 border shadow-none card">
                                <div
                                    class="py-0 card-header bg-light d-flex justify-content-between align-items-center">
                                    <h5 class="m-0 card-title fw-semibold">
                                        Client Information
                                    </h5>
                                    <div>
                                        <button class="btn btn-light bg-white py-2" data-bs-toggle="modal"
                                            data-bs-target="#rfqDetails-{{ $rfq->id }}">Details</button>
                                    </div>
                                </div>
                                <div class="modal fade" tabindex="-1" id="rfqDetails-{{ $rfq->id }}">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">
                                                    RFQ Details
                                                </h5>
                                                <button type="button" class="btn-close text-danger"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="pt-0 modal-body">
                                                <div class="pt-0 card">
                                                    <div class="pt-0 card-body">
                                                        <div class="table-responsive">
                                                            @php
                                                                $infoTables = [];

                                                                // Shipping Info
                                                                if (!empty($rfq->shipping_name)) {
                                                                    $infoTables[] = [
                                                                        'title' => 'Shipping Info',
                                                                        'rows' => [
                                                                            ['Name', $rfq->shipping_name],
                                                                            [
                                                                                'Email',
                                                                                '<a href="mailto:' .
                                                                                $rfq->shipping_email .
                                                                                '" style="color:#ae0a46;">' .
                                                                                $rfq->shipping_email .
                                                                                '</a>',
                                                                            ],
                                                                            ['Phone', $rfq->shipping_phone],
                                                                            [
                                                                                'Company Name',
                                                                                $rfq->shipping_company_name,
                                                                            ],
                                                                            ['Designation', $rfq->shipping_designation],
                                                                            ['Address', $rfq->shipping_address],
                                                                            ['Country', $rfq->shipping_country],
                                                                            ['City', $rfq->shipping_city],
                                                                            ['Zip Code', $rfq->shipping_zip_code],
                                                                        ],
                                                                    ];
                                                                }

                                                                // End-User Info
                                                                if (!empty($rfq->end_user_name)) {
                                                                    $infoTables[] = [
                                                                        'title' => 'End-User Info',
                                                                        'rows' => [
                                                                            ['Name', $rfq->end_user_name],
                                                                            [
                                                                                'Email',
                                                                                '<a href="mailto:' .
                                                                                $rfq->end_user_email .
                                                                                '" style="color:#ae0a46;">' .
                                                                                $rfq->end_user_email .
                                                                                '</a>',
                                                                            ],
                                                                            ['Phone', $rfq->end_user_phone],
                                                                            [
                                                                                'Company Name',
                                                                                $rfq->end_user_company_name,
                                                                            ],
                                                                            ['Designation', $rfq->end_user_designation],
                                                                            ['Address', $rfq->end_user_address],
                                                                            ['Country', $rfq->end_user_country],
                                                                            ['City', $rfq->end_user_city],
                                                                            ['Zip Code', $rfq->end_user_zip_code],
                                                                        ],
                                                                    ];
                                                                }

                                                                // Project Info
                                                                if (!empty($rfq->project_name)) {
                                                                    $infoTables[] = [
                                                                        'title' => 'Project Info',
                                                                        'rows' => [
                                                                            ['Project', $rfq->project_name],
                                                                            ['Status', $rfq->project_status],
                                                                            ['Budget', $rfq->budget],
                                                                            [
                                                                                'Purchase Date',
                                                                                $rfq->approximate_delivery_time,
                                                                            ],
                                                                        ],
                                                                    ];
                                                                }
                                                            @endphp

                                                            @foreach (array_chunk($infoTables, 2) as $tablePair)
                                                                <table class="stack-table" width="100%"
                                                                    cellpadding="0" cellspacing="0" border="0"
                                                                    style="margin-top:10px; table-layout:fixed;">
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
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                    Close
                                                </button>
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
                                                            <th class="py-1 text-muted" scope="row">Tentative Budget
                                                            </th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $rfq->budget }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Purchase Date
                                                            </th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $rfq->approximate_delivery_time }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Delivery
                                                                Country
                                                            </th>
                                                            <td class="py-1">:</td>
                                                            <td class="py-1">{{ $rfq->shipping_country }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1 text-muted" scope="row">Delivery Zip
                                                                Code
                                                            </th>
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
                            <div class="mb-8 border shadow-none card">
                                <div class="py-0 card-header bg-light">
                                    <h5 class="m-0 card-title fw-semibold">
                                        Product Information
                                    </h5>
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
                            <div class="mb-8 border shadow-none card">
                                <div class="py-0 card-header bg-light">
                                    <h5 class="m-0 card-title fw-semibold">
                                        End User Information
                                    </h5>
                                </div>
                                <div class="p-2 px-4 card-body">
                                    Upcoming
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
