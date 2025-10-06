@foreach ($rfqs as $rfq)
<style>
    .nav-line-tabs .nav-item .nav-link.active,
    .nav-line-tabs .nav-item .nav-link:hover:not(.disabled),
    .nav-line-tabs .nav-item.show .nav-link {
        padding: 10px;
    }
</style>
<style>
    @media only screen and (max-width: 768px) {
        .u-col {
            display: block !important;
            width: 100% !important;
            padding: 0 !important;
        }
    }
</style>
<div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="pending_rfq_{{ $rfq->id }}"
    role="tabpanel">
    <div class="shadow-none card">
        <div class="p-4 bg-light rounded-3 d-flex justify-content-between align-items-center w-100 rfq-content-info">
            <div class="d-flex align-items-center">
                <p class="mb-0 text-black ps-3 fw-bold rfq-tab-content">
                    @if (!Route::is('admin.archived.rfq'))
                    RFQ#
                    @endif{{ $rfq->rfq_code }}
                </p>
                <span class="px-1">|</span>
                <p class="mb-0 text-muted ps-1">{{ $rfq->company_name }}
                    @if (!empty($rfq->country))
                    <span class="px-1">|</span>{{ $rfq->country }}
                    @endif
                </p>
            </div>
            <div>
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
                'label' =>
                'Assigned to ' . optional($rfq->salesmanL1)->name ??
                (optional($rfq->salesmanT1)->name ?? optional($rfq->salesmanT2)->name),
                'icon' => 'fa fa-user-tie',
                'route' => route('deal.convert', $rfq->id),
                'condition' => $rfq->status == 'assigned',
                ],
                [
                'status' => 'closed',
                'label' => 'Status Closed',
                'icon' => 'fa-solid fa-stop',
                'route' => 'javascript:void(0);',
                'condition' => $rfq->status == 'closed',
                ],
                // [
                // 'status' => 'deal_created',
                // 'label' => 'Deal Created',
                // 'icon' => 'fa fa-file-alt',
                // 'route' => route('deal-sas.show', $rfq->rfq_code),
                // 'condition' => $rfq->status == 'deal_created',
                // ],
                // [
                // 'status' => 'sas_created',
                // 'label' => 'SAS Created',
                // 'icon' => 'fa fa-edit',
                // 'route' => route('deal-sas.edit', $rfq->rfq_code),
                // 'condition' => $rfq->status == 'sas_created',
                // ],
                // [
                // 'status' => 'sas_approved',
                // 'label' => 'SAS Approved',
                // 'icon' => 'fa fa-thumbs-up',
                // 'route' => route('dealsasapprove', $rfq->rfq_code),
                // 'condition' => $rfq->status == 'sas_created',
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
                                        data-bs-target="#pendiRfqDetails-{{ $rfq->id }}">Details</button>
                                </div>
                            </div>
                            <div class="modal fade" tabindex="-1" id="pendiRfqDetails-{{ $rfq->id }}">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="py-3 modal-header">
                                            <!--begin::Modal title-->
                                            <h2>RFQ Details (@if (!Route::is('admin.archived.rfq'))
                                                RFQ#
                                                @endif{{ $rfq->rfq_code }})</h2>
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

                                                        <!-- @foreach (array_chunk($infoTables, 2) as $tablePair)
                                                            <div class="table-responsive">
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
                                                                                            style="background-color:#f5f8fa; border-bottom: 1px solid #eee; padding:10px; font-size:14px; text-align:center;">
                                                                                            {{ $table['title'] }}
                                                                                        </th>
                                                                                    </tr>
                                                                                    @foreach ($table['rows'] as [$label, $value])
                                                                                        <tr>
                                                                                            <th
                                                                                                style="background:#f5f8fa;padding:10px; text-align:left; font-weight:400; width:130px;">
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
                                                            @endforeach -->
                                                        @foreach (array_chunk($infoTables, 2) as $tablePair)
                                                        <div class="table-responsive">
                                                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed;">
                                                                <tr>
                                                                    @foreach ($tablePair as $table)
                                                                    <td class="u-col" valign="top" width="50%" style="padding: 0 10px; font-size: 12px;">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                                                            style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px;">
                                                                            <tr>
                                                                                <th colspan="2"
                                                                                    style="background-color:#f5f8fa; border-bottom: 1px solid #eee; padding:10px; font-size:14px; text-align:center;">
                                                                                    {{ $table['title'] }}
                                                                                </th>
                                                                            </tr>
                                                                            @foreach ($table['rows'] as [$label, $value])
                                                                            <tr>
                                                                                <th style="background:#f5f8fa;padding:10px; text-align:left; font-weight:400; width:130px;">
                                                                                    {{ $label }}
                                                                                </th>
                                                                                <td style="padding:10px; border-bottom:1px solid #eee;">
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
                                    <div class="mt-5 col-md-6 mt-lg-0">
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
                            <div class="py-0 card-header bg-light align-items-center">
                                <h5 class="m-0 card-title fw-semibold">
                                    Product Information
                                </h5>
                                <div>
                                    <button class="py-2 bg-white btn btn-light" data-bs-toggle="modal"
                                        data-bs-target="#pendiRfqProductDetails-{{ $rfq->id }}">Details</button>
                                </div>
                            </div>
                            <div class="modal fade" tabindex="-1"
                                id="pendiRfqProductDetails-{{ $rfq->id }}">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="py-3 modal-header">
                                            <!--begin::Modal title-->
                                            <h2>RFQ Details (@if (!Route::is('admin.archived.rfq'))
                                                RFQ#
                                                @endif{{ $rfq->rfq_code }})</h2>
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
                                                            @forelse ($rfq->rfqProducts as $product)
                                                            <tr vertical-align: middle
                                                                style="border-bottom: 1px solid #E2E2E2; background-color: white;">
                                                                <td class="text-center">{{ $loop->iteration }}
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <h6 class="mb-0">
                                                                            {{ $product->product_name ?? 'No Name' }}
                                                                        </h6>
                                                                        @if (!empty($product->brand_name) || !empty($product->sku_no) || !empty($product->model_no))
                                                                        <br />
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
                                                                        <div class="mb-2">
                                                                            <h6 class="mb-1 fw-bold">Product
                                                                                Description</h6>
                                                                            <p class="mb-0"><i
                                                                                    class="bi bi-arrow-right me-2"></i>{{ $product->product_des ?? 'N/A' }}
                                                                            </p>
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 fw-bold">Additional
                                                                                Info</h6>
                                                                            <p class="mb-0"><i
                                                                                    class="bi bi-arrow-right me-2"></i>{{ $product->additional_info ?? 'N/A' }}
                                                                            </p>
                                                                        </div>
                                                                        {{-- Add more fields in the same format if needed --}}
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach