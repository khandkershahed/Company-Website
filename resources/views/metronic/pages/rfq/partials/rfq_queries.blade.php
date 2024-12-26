{{-- <div class="tab-pane fade {{ !empty($tab_status) && $tab_status == 'pending' ? 'show active' : '' }} {{ !empty($tab_status) && ($tab_status == 'quoted' || $tab_status == 'lost') ? '' : 'show active' }}"
    id="pending" role="tabpanel"> --}}
<div class="tab-pane fade {{ empty($tab_status) || $tab_status == 'pending' ? 'show active' : '' }}" id="pending"
    role="tabpanel">


    <div class="row">
        <div class="card shadow-sm">
            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                data-bs-target="#pending_rfq">
                <h3 class="card-title">Pending RFQs</h3>
                <div class="card-toolbar rotate-180">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1"
                                transform="rotate(-90 11 18)" fill="currentColor">
                            </rect>
                            <path
                                d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                </div>
            </div>
            <div id="pending_rfq" class="collapse show">
                <div class="card-body">
                    @if ($rfqs->count() > 0)
                        <div class="py-5">
                            <div class="d-flex flex-column flex-md-row rounded">
                                <div class="min-w-lg-350px h-lg-500px h-500px overflow-scroll">
                                    <ul
                                        class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6 min-w-lg-350px">
                                        @foreach ($rfqs as $rfq)
                                            <li class="nav-item w-100 me-0 mb-md-2">
                                                <a class="nav-link w-100 {{ $loop->first ? 'active btn-active-primary' : '' }} btn btn-flex border"
                                                    data-bs-toggle="tab" href="#rfq_details-{{ $rfq->id }}">
                                                    <i class="fa-regular fa-file fs-2 text-primary pe-3"></i>
                                                    <div class="row w-100">
                                                        <div class="col-sm-12">
                                                            <div class="d-flex justify-content-between">
                                                                <span class="fs-7 fw-bold">{{ $rfq->name }}</span>
                                                                <span class="fs-7">#{{ $rfq->rfq_code }}</span>
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <span class="fs-7 fw-bold">{{ $rfq->country }}</span>
                                                                <span class="fs-7">{{ $rfq->create_date }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-content w-100 border rounded" id="myTabContent">
                                    @foreach ($rfqs as $rfq)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="rfq_details-{{ $rfq->id }}" role="tabpanel">
                                            <div
                                                class="d-flex justify-content-between align-items-center p-5 px-7 border-bottom border-bottom-black">
                                                <div class="text-center">
                                                    <h1 class="m-0">View The RFQ</h1>
                                                </div>
                                                <div>
                                                    <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6 border-0">

                                                        <li class="nav-item">
                                                            <a class="nav-link btn btn-primary active"
                                                                data-bs-toggle="tab"
                                                                href="#rfq_status-{{ $rfq->id }}">
                                                                <i class="fa-regular fa-handshake pe-2"></i>
                                                                Status
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link btn btn-primary" data-bs-toggle="tab"
                                                                href="#rfq_bypass-{{ $rfq->id }}">
                                                                <i class="fa-solid fa-signs-post pe-2"></i>
                                                                Bypass
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link btn btn-primary" data-bs-toggle="tab"
                                                                href="#rfq_st_details-{{ $rfq->id }}">
                                                                <i class="fa-solid fa-expand pe-2"></i>
                                                                Show Details
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>



                                            <div class="tab-content p-7" id="myTabContent">
                                                <div class="tab-pane fade show active"
                                                    id="rfq_status-{{ $rfq->id }}" role="tabpanel">
                                                    <div class="table-responsive" style="height:10rem;">
                                                        <div class="track">
                                                            @if ($rfq->rfq_type == 'rfq')
                                                                @php
                                                                    $steps = [
                                                                        [
                                                                            'status' => 'rfq_created',
                                                                            'label' => 'RFQ Created',
                                                                            'icon' => 'icon-user-check',
                                                                            'route' =>
                                                                                '#assign-manager-' . $rfq->rfq_code,
                                                                            'condition' =>
                                                                                $rfq->status == 'rfq_created',
                                                                        ],
                                                                        [
                                                                            'status' => 'assigned',
                                                                            'label' => 'Salesman Assigned',
                                                                            'icon' => 'icon-pen-plus',
                                                                            'route' => route('deal.convert', $rfq->id),
                                                                            'condition' => $rfq->status == 'assigned',
                                                                        ],
                                                                        [
                                                                            'status' => 'deal_created',
                                                                            'label' => 'Deal Created',
                                                                            'icon' => 'icon-file-plus2',
                                                                            'route' => route(
                                                                                'deal-sas.show',
                                                                                $rfq->rfq_code,
                                                                            ),
                                                                            'condition' =>
                                                                                $rfq->status == 'deal_created',
                                                                        ],
                                                                        [
                                                                            'status' => 'sas_created',
                                                                            'label' => 'SAS Created',
                                                                            'icon' => 'icon-pencil',
                                                                            'route' => route(
                                                                                'deal-sas.edit',
                                                                                $rfq->rfq_code,
                                                                            ),
                                                                            'condition' =>
                                                                                $rfq->status == 'sas_created',
                                                                        ],
                                                                        [
                                                                            'status' => 'sas_approved',
                                                                            'label' => 'SAS Approved',
                                                                            'icon' => 'icon-paperplane',
                                                                            'route' => route(
                                                                                'dealsasapprove',
                                                                                $rfq->rfq_code,
                                                                            ),
                                                                            'condition' =>
                                                                                $rfq->status == 'sas_created',
                                                                        ],
                                                                        [
                                                                            'status' => 'quoted',
                                                                            'label' => 'Quotation Sent',
                                                                            'icon' => 'icon-paperplane',
                                                                            'route' =>
                                                                                '#quotation-send-' . $rfq->rfq_code,
                                                                            'condition' =>
                                                                                $rfq->status == 'sas_approved',
                                                                        ],
                                                                        [
                                                                            'status' => 'workorder_uploaded',
                                                                            'label' => 'Work Order Uploaded',
                                                                            'icon' => 'icon-file-plus2',
                                                                            'route' => '#Work-order-' . $rfq->rfq_code,
                                                                            'condition' => $rfq->status == 'quoted',
                                                                        ],
                                                                        [
                                                                            'status' => 'invoice_sent',
                                                                            'label' => 'Invoice Sent',
                                                                            'icon' => 'icon-paperplane',
                                                                            'route' =>
                                                                                '#invoice-send-' . $rfq->rfq_code,
                                                                            'condition' =>
                                                                                $rfq->status == 'workorder_uploaded',
                                                                        ],
                                                                        [
                                                                            'status' => 'proof_of_payment_uploaded',
                                                                            'label' => 'Proof of Payment Uploaded',
                                                                            'icon' => 'icon-file-plus2',
                                                                            'route' =>
                                                                                '#proofpayment-' . $rfq->rfq_code,
                                                                            'condition' =>
                                                                                $rfq->status == 'invoice_sent',
                                                                        ],
                                                                    ];
                                                                @endphp

                                                                @foreach ($steps as $step)
                                                                    <div
                                                                        class="step {{ $rfq->status == $step['status'] ? 'active' : '' }}">
                                                                        <span class="icon">
                                                                            @if ($rfq->status == $step['status'])
                                                                                <i class="fa fa-check"></i>
                                                                            @else
                                                                                <i class="fa fa-times"></i>
                                                                            @endif
                                                                        </span>
                                                                        <span
                                                                            class="text">{{ $step['label'] }}</span>
                                                                        @if ($step['condition'])
                                                                            <span class="text">
                                                                                <a href="{{ $step['route'] }}"
                                                                                    class="text-primary mx-3"
                                                                                    title="Action">
                                                                                    <i class="{{ $step['icon'] }}"></i>
                                                                                </a>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="rfq_bypass-{{ $rfq->id }}"
                                                    role="tabpanel">
                                                    <div class="card mt-4 w-50 mx-auto">
                                                        <div class="card-header border-0 rounded-0 bg-transparent p-0">

                                                        </div>
                                                        <div class="card-body">
                                                            <div>
                                                                <h3>Exploring Direct Quotations without
                                                                    going step by step </h3>
                                                            </div>
                                                            <a href="{{ route('single-rfq.quoation_mail', $rfq->rfq_code) }}"
                                                                target="_blank"
                                                                class="text-center main_color fw-bolder py-3">Go
                                                                to Direct
                                                                Quotation <i
                                                                    class="fa-solid fa-arrow-right ps-2"></i></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="rfq_st_details-{{ $rfq->id }}"
                                                    role="tabpanel">
                                                    <div class="card rounded-0">
                                                        <div class="card-header rounded-0 p-0">
                                                            <div>
                                                                <ul class="nav nav-tabs border-0 d-flex justify-content- align-items-center"
                                                                    style="padding-top: 0px;padding-bottom: 1px;">
                                                                    <li class="nav-item mb-0 me-1">
                                                                        <a href="#client_details"
                                                                            class="nav-link btn btn-primary active cat-tab1 p-1"
                                                                            data-bs-toggle="tab">
                                                                            <p class="m-0 p-1">
                                                                                Client Details</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item mb-0">
                                                                        <a href="#product_details"
                                                                            class="nav-link btn btn-primary cat-tab2 p-1 "
                                                                            data-bs-toggle="tab">
                                                                            <p class="m-0 p-1">
                                                                                Product Details</p>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div>
                                                                <h5 class="m-0 p-0 ps-5 fw-normal">RFQ
                                                                    Details</h5>
                                                            </div>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div class="row rounded">
                                                                <div class="tab-content">
                                                                    <div class="tab-pane fade show active"
                                                                        id="client_details">
                                                                        {{-- Save Table --}}
                                                                        <table
                                                                            class="table table-bordered table-hover text-center">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th width="10%">
                                                                                        Client Type</th>
                                                                                    <th width="20%">Name
                                                                                    </th>
                                                                                    <th width="20%">
                                                                                        Company Name</th>
                                                                                    <th width="15%">
                                                                                        Phone Number</th>
                                                                                    <th width="25%"
                                                                                        class="text-center">
                                                                                        Assigned
                                                                                        Sales Manager
                                                                                        (L1)
                                                                                    </th>
                                                                                    <th width="10%"
                                                                                        class="text-center">
                                                                                        Status</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="text-center">
                                                                                        {{ ucfirst($rfq->client_type) }}
                                                                                    </td>
                                                                                    <td> {{ ucfirst($rfq->name) }}
                                                                                    </td>
                                                                                    <td> {{ ucfirst($rfq->company_name) }}
                                                                                    </td>
                                                                                    {{-- <td>
                                                                                                @if ($rfq->rfqProducts->sum('qty') > 0)
                                                                                                    {{ $rfq->rfqProducts->sum('qty') }}
                                                                                                @else
                                                                                                    {{ $rfq->qty }}
                                                                                                @endif
                                                                                            </td> --}}
                                                                                    <td>{{ $rfq->phone }}
                                                                                    </td>
                                                                                    <td>{{ App\Models\User::where('id', $rfq->sales_man_id_L1)->value('name') }}
                                                                                        <br>
                                                                                        @if ($rfq->sales_man_id_T1)
                                                                                            Assigned Sales
                                                                                            Manager (T1) :
                                                                                            {{ App\Models\User::where('id', $rfq->sales_man_id_T1)->value('name') }}
                                                                                            <br>
                                                                                        @endif
                                                                                        @if ($rfq->sales_man_id_T2)
                                                                                            Assigned Sales
                                                                                            Manager (T2) :
                                                                                            {{ App\Models\User::where('id', $rfq->sales_man_id_T2)->value('name') }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>{{ ucfirst($rfq->status) }}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-content">
                                                                    <div class="tab-pane fade show"
                                                                        id="product_details">
                                                                        <div class="table-responsive text-center">
                                                                            <table
                                                                                class="table table-bordered table-striped">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th> Product Name
                                                                                        </th>
                                                                                        <th> Quantity </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @if ($rfq->rfqProducts->count() > 0)
                                                                                        @foreach ($rfq->rfqProducts as $product)
                                                                                            <tr
                                                                                                class="text-black bg-white">
                                                                                                <td>{{ $product->product_name }}
                                                                                                </td>
                                                                                                <td>{{ $product->qty }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    @else
                                                                                        <tr> No Data
                                                                                            Available</tr>
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
                                                {{-- <div class="tab-pane fade show active" id="kt_tab_pane_10"
                                                            role="tabpanel">
                                                            Et et consectetur ipsum labore excepteur est proident
                                                            excepteur ad velit occaecat qui minim occaecat veniam.
                                                        </div> --}}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="py-5">
                            <h2 class="text-center text-warning"> No Pending RFQ Available</h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade {{ !empty($tab_status) && $tab_status == 'quoted' ? 'show active' : '' }}" id="quoted"
    role="tabpanel">
    <div class="row">
        <div class="card shadow-sm">
            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                data-bs-target="#quoted_rfq">
                <h3 class="card-title">Quoted RFQs</h3>
                <div class="card-toolbar rotate-180">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1"
                                transform="rotate(-90 11 18)" fill="currentColor">
                            </rect>
                            <path
                                d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                </div>
            </div>
            <div id="quoted_rfq" class="collapse show">
                <div class="card-body">
                    @if ($quoteds->count() > 0)
                        <div class="py-5">
                            <div class="d-flex flex-column flex-md-row rounded">
                                <ul
                                    class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6 min-w-lg-250px">
                                    @foreach ($quoteds as $rfq)
                                        <li class="nav-item w-100 me-0 mb-md-2">
                                            <a class="nav-link w-100 {{ $loop->first ? 'active btn-active-primary' : '' }} btn btn-flex border"
                                                data-bs-toggle="tab" href="#kt_vtab_pane_4">
                                                <i class="fa-regular fa-file fs-2 text-primary pe-3"></i>
                                                <div class="row w-100">
                                                    <div class="col-sm-12">
                                                        <div class="d-flex justify-content-between">
                                                            <span class="fs-7 fw-bold">{{ $rfq->name }}</span>
                                                            <span class="fs-7">#{{ $rfq->rfq_code }}</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <span class="fs-7 fw-bold">{{ $rfq->country }}</span>
                                                            <span class="fs-7">{{ $rfq->create_date }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="tab-content w-100 border rounded" id="myTabContent">
                                    @foreach ($quoteds as $rfq)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="rfq_details-{{ $rfq->id }}" role="tabpanel">
                                            <div
                                                class="d-flex justify-content-between align-items-center p-5 px-7 border-bottom border-bottom-black">
                                                <div class="text-center">
                                                    <h1 class="m-0">View The RFQ</h1>
                                                </div>
                                                <div>
                                                    <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6 border-0">

                                                        <li class="nav-item">
                                                            <a class="nav-link btn btn-primary active"
                                                                data-bs-toggle="tab"
                                                                href="#quoted_status-{{ $rfq->id }}">
                                                                <i class="fa-regular fa-handshake pe-2"></i>
                                                                Status
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link btn btn-primary" data-bs-toggle="tab"
                                                                href="#quoted_bypass-{{ $rfq->id }}">
                                                                <i class="fa-solid fa-signs-post pe-2"></i>
                                                                Bypass
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link btn btn-primary" data-bs-toggle="tab"
                                                                href="#quoted_st_details-{{ $rfq->id }}">
                                                                <i class="fa-solid fa-expand pe-2"></i>
                                                                Show Details
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>



                                            <div class="tab-content p-7" id="myTabContent">
                                                <div class="tab-pane fade show active"
                                                    id="quoted_status-{{ $rfq->id }}" role="tabpanel">
                                                    <div class="table-responsive" style="height:10rem;">
                                                        <div class="track">
                                                            @if ($rfq->rfq_type == 'rfq')
                                                                @php
                                                                    $steps = [
                                                                        [
                                                                            'status' => 'rfq_created',
                                                                            'label' => 'RFQ Created',
                                                                            'icon' => 'icon-user-check',
                                                                            'route' =>
                                                                                '#assign-manager-' . $rfq->rfq_code,
                                                                            'condition' =>
                                                                                $rfq->status == 'rfq_created',
                                                                        ],
                                                                        [
                                                                            'status' => 'assigned',
                                                                            'label' => 'Salesman Assigned',
                                                                            'icon' => 'icon-pen-plus',
                                                                            'route' => route('deal.convert', $rfq->id),
                                                                            'condition' => $rfq->status == 'assigned',
                                                                        ],
                                                                        [
                                                                            'status' => 'deal_created',
                                                                            'label' => 'Deal Created',
                                                                            'icon' => 'icon-file-plus2',
                                                                            'route' => route(
                                                                                'deal-sas.show',
                                                                                $rfq->rfq_code,
                                                                            ),
                                                                            'condition' =>
                                                                                $rfq->status == 'deal_created',
                                                                        ],
                                                                        [
                                                                            'status' => 'sas_created',
                                                                            'label' => 'SAS Created',
                                                                            'icon' => 'icon-pencil',
                                                                            'route' => route(
                                                                                'deal-sas.edit',
                                                                                $rfq->rfq_code,
                                                                            ),
                                                                            'condition' =>
                                                                                $rfq->status == 'sas_created',
                                                                        ],
                                                                        [
                                                                            'status' => 'sas_approved',
                                                                            'label' => 'SAS Approved',
                                                                            'icon' => 'icon-paperplane',
                                                                            'route' => route(
                                                                                'dealsasapprove',
                                                                                $rfq->rfq_code,
                                                                            ),
                                                                            'condition' =>
                                                                                $rfq->status == 'sas_created',
                                                                        ],
                                                                        [
                                                                            'status' => 'quoted',
                                                                            'label' => 'Quotation Sent',
                                                                            'icon' => 'icon-paperplane',
                                                                            'route' =>
                                                                                '#quotation-send-' . $rfq->rfq_code,
                                                                            'condition' =>
                                                                                $rfq->status == 'sas_approved',
                                                                        ],
                                                                        [
                                                                            'status' => 'workorder_uploaded',
                                                                            'label' => 'Work Order Uploaded',
                                                                            'icon' => 'icon-file-plus2',
                                                                            'route' => '#Work-order-' . $rfq->rfq_code,
                                                                            'condition' => $rfq->status == 'quoted',
                                                                        ],
                                                                        [
                                                                            'status' => 'invoice_sent',
                                                                            'label' => 'Invoice Sent',
                                                                            'icon' => 'icon-paperplane',
                                                                            'route' =>
                                                                                '#invoice-send-' . $rfq->rfq_code,
                                                                            'condition' =>
                                                                                $rfq->status == 'workorder_uploaded',
                                                                        ],
                                                                        [
                                                                            'status' => 'proof_of_payment_uploaded',
                                                                            'label' => 'Proof of Payment Uploaded',
                                                                            'icon' => 'icon-file-plus2',
                                                                            'route' =>
                                                                                '#proofpayment-' . $rfq->rfq_code,
                                                                            'condition' =>
                                                                                $rfq->status == 'invoice_sent',
                                                                        ],
                                                                    ];
                                                                @endphp

                                                                @foreach ($steps as $step)
                                                                    <div
                                                                        class="step {{ $rfq->status == $step['status'] ? 'active' : '' }}">
                                                                        <span class="icon">
                                                                            @if ($rfq->status == $step['status'])
                                                                                <i class="fa fa-check"></i>
                                                                            @else
                                                                                <i class="fa fa-times"></i>
                                                                            @endif
                                                                        </span>
                                                                        <span
                                                                            class="text">{{ $step['label'] }}</span>
                                                                        @if ($step['condition'])
                                                                            <span class="text">
                                                                                <a href="{{ $step['route'] }}"
                                                                                    class="text-primary mx-3"
                                                                                    title="Action">
                                                                                    <i
                                                                                        class="{{ $step['icon'] }}"></i>
                                                                                </a>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="quoted_bypass-{{ $rfq->id }}"
                                                    role="tabpanel">
                                                    <div class="card mt-4 w-50 mx-auto">
                                                        <div class="card-header border-0 rounded-0 bg-transparent p-0">

                                                        </div>
                                                        <div class="card-body">
                                                            <div>
                                                                <h3>Exploring Direct Quotations without
                                                                    going step by step </h3>
                                                            </div>
                                                            <a href="{{ route('single-rfq.quoation_mail', $rfq->rfq_code) }}"
                                                                target="_blank"
                                                                class="text-center main_color fw-bolder py-3">Go
                                                                to Direct
                                                                Quotation <i
                                                                    class="fa-solid fa-arrow-right ps-2"></i></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="quoted_st_details-{{ $rfq->id }}"
                                                    role="tabpanel">
                                                    <div class="card rounded-0">
                                                        <div class="card-header rounded-0 p-0">
                                                            <div>
                                                                <ul class="nav nav-tabs border-0 d-flex justify-content- align-items-center"
                                                                    style="padding-top: 0px;padding-bottom: 1px;">
                                                                    <li class="nav-item mb-0 me-1">
                                                                        <a href="#client_details"
                                                                            class="nav-link btn btn-primary active cat-tab1 p-1"
                                                                            data-bs-toggle="tab">
                                                                            <p class="m-0 p-1">
                                                                                Client Details</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item mb-0">
                                                                        <a href="#product_details"
                                                                            class="nav-link btn btn-primary cat-tab2 p-1 "
                                                                            data-bs-toggle="tab">
                                                                            <p class="m-0 p-1">
                                                                                Product Details</p>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div>
                                                                <h5 class="m-0 p-0 ps-5 fw-normal">RFQ
                                                                    Details</h5>
                                                            </div>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div class="row rounded">
                                                                <div class="tab-content">
                                                                    <div class="tab-pane fade show active"
                                                                        id="client_details">
                                                                        {{-- Save Table --}}
                                                                        <table
                                                                            class="table table-bordered table-hover text-center">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th width="10%">
                                                                                        Client Type</th>
                                                                                    <th width="20%">Name
                                                                                    </th>
                                                                                    <th width="20%">
                                                                                        Company Name</th>
                                                                                    <th width="15%">
                                                                                        Phone Number</th>
                                                                                    <th width="25%"
                                                                                        class="text-center">
                                                                                        Assigned
                                                                                        Sales Manager
                                                                                        (L1)
                                                                                    </th>
                                                                                    <th width="10%"
                                                                                        class="text-center">
                                                                                        Status</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="text-center">
                                                                                        {{ ucfirst($rfq->client_type) }}
                                                                                    </td>
                                                                                    <td> {{ ucfirst($rfq->name) }}
                                                                                    </td>
                                                                                    <td> {{ ucfirst($rfq->company_name) }}
                                                                                    </td>
                                                                                    {{-- <td>
                                                                                            @if ($rfq->rfqProducts->sum('qty') > 0)
                                                                                                {{ $rfq->rfqProducts->sum('qty') }}
                                                                                            @else
                                                                                                {{ $rfq->qty }}
                                                                                            @endif
                                                                                        </td> --}}
                                                                                    <td>{{ $rfq->phone }}
                                                                                    </td>
                                                                                    <td>{{ App\Models\User::where('id', $rfq->sales_man_id_L1)->value('name') }}
                                                                                        <br>
                                                                                        @if ($rfq->sales_man_id_T1)
                                                                                            Assigned Sales
                                                                                            Manager (T1) :
                                                                                            {{ App\Models\User::where('id', $rfq->sales_man_id_T1)->value('name') }}
                                                                                            <br>
                                                                                        @endif
                                                                                        @if ($rfq->sales_man_id_T2)
                                                                                            Assigned Sales
                                                                                            Manager (T2) :
                                                                                            {{ App\Models\User::where('id', $rfq->sales_man_id_T2)->value('name') }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>{{ ucfirst($rfq->status) }}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-content">
                                                                    <div class="tab-pane fade show"
                                                                        id="product_details">
                                                                        <div class="table-responsive text-center">
                                                                            <table
                                                                                class="table table-bordered table-striped">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th> Product Name
                                                                                        </th>
                                                                                        <th> Quantity </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @if ($rfq->rfqProducts->count() > 0)
                                                                                        @foreach ($rfq->rfqProducts as $product)
                                                                                            <tr
                                                                                                class="text-black bg-white">
                                                                                                <td>{{ $product->product_name }}
                                                                                                </td>
                                                                                                <td>{{ $product->qty }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    @else
                                                                                        <tr> No Data
                                                                                            Available</tr>
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
                                                {{-- <div class="tab-pane fade show active" id="kt_tab_pane_10"
                                                        role="tabpanel">
                                                        Et et consectetur ipsum labore excepteur est proident
                                                        excepteur ad velit occaecat qui minim occaecat veniam.
                                                    </div> --}}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="py-5">
                            <h2 class="text-center text-warning"> No Quoted RFQ Available</h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade {{ !empty($tab_status) && $tab_status == 'lost' ? 'show active' : '' }}" id="failed"
    role="tabpanel">
    <div class="row">
        <div class="card shadow-sm">
            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                data-bs-target="#lost_rfq">
                <h3 class="card-title">Lost RFQs</h3>
                <div class="card-toolbar rotate-180">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1"
                                transform="rotate(-90 11 18)" fill="currentColor">
                            </rect>
                            <path
                                d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                </div>
            </div>
            <div id="lost_rfq" class="collapse show">
                <div class="card-body">
                    @if ($losts->count() > 0)
                        <div class="py-5">
                            <div class="d-flex flex-column flex-md-row rounded">
                                <ul
                                    class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6 min-w-lg-250px">
                                    @foreach ($losts as $rfq)
                                        <li class="nav-item w-100 me-0 mb-md-2">
                                            <a class="nav-link w-100 {{ $loop->first ? 'active btn-active-primary' : '' }} btn btn-flex border"
                                                data-bs-toggle="tab" href="#kt_vtab_pane_4">
                                                <i class="fa-regular fa-file fs-2 text-primary pe-3"></i>
                                                <div class="row w-100">
                                                    <div class="col-sm-12">
                                                        <div class="d-flex justify-content-between">
                                                            <span class="fs-7 fw-bold">{{ $rfq->name }}</span>
                                                            <span class="fs-7">#{{ $rfq->rfq_code }}</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <span class="fs-7 fw-bold">{{ $rfq->country }}</span>
                                                            <span class="fs-7">{{ $rfq->create_date }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="tab-content w-100 border rounded" id="myTabContent">
                                    @foreach ($losts as $rfq)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="kt_vtab_pane_4" role="tabpanel">
                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                <div class="text-center p-5">
                                                    <h1 class="pb-5">View The RFQ</h1>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary me-2"><i
                                                            class="fa-solid fa-signs-post pe-2"></i>Bypass</button>
                                                    <button class="btn btn-primary"><i
                                                            class="fa-regular fa-handshake pe-2"></i>
                                                        Deal</button>
                                                    <button class="btn btn-primary"><i
                                                            class="fa-regular fa-pen-to-square pe-2"></i>Edit</button>
                                                    <button class="btn btn-primary"><i
                                                            class="fa-solid fa-expand pe-2"></i>View</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="py-5">
                            <h2 class="text-center text-warning"> No Lost RFQ Available</h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
