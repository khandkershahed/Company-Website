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
                                                    <ul class="nav nav-tabs nav-line-tabs fs-6 border-0">

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
                                                        <div class="card-header rounded-0 p-0 h-40px min-h-40px">
                                                            <div>
                                                                <h3 class="m-0 p-0 ps-5 fw-bold card-title">RFQ Details
                                                                    ({{ $rfq->rfq_code }})
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div class="row rounded">
                                                                @include('metronic.pages.rfq.partials.rfq_details')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

                    <div class="row g-4">
                        <div class="col-lg-5 h-lg-500px h-500px overflow-scroll">
                            <ul class="nav nav-tabs nav-pills border-0">
                                <!-- Filter Bar -->
                                <li class="nav-item w-100 me-0 mb-md-2">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="bg-primary text-white px-4 py-2 me-2 rounded d-flex align-items-center w-auto">
                                            <i class="fas fa-search me-2"></i> Search
                                        </div>
                                        <div class="me-2">
                                            <select class="form-select form-select-sm w-auto me-2"
                                                data-control="select2">
                                                <option selected disabled>Country</option>
                                                <option value="1">United States</option>
                                                <option value="2">Canada</option>
                                                <option value="3">United Kingdom</option>
                                                <option value="4">Australia</option>
                                                <option value="5">Germany</option>
                                                <option value="6">France</option>
                                                <option value="7">India</option>
                                                <option value="8">China</option>
                                                <option value="9">Brazil</option>
                                                <option value="10">South Africa</option>
                                            </select>
                                        </div>
                                        <div class="me-2">
                                            <select class="form-select form-select-sm w-auto me-2"
                                                data-control="select2">
                                                <option selected disabled>
                                                    Sales Man
                                                </option>
                                                <option value="1">John Doe</option>
                                                <option value="2">Jane Smith</option>
                                                <option value="3">Michael Johnson</option>
                                                <option value="4">Emily Davis</option>
                                                <option value="5">Robert Brown</option>
                                                <option value="6">Olivia Wilson</option>
                                                <option value="7">Daniel Martinez</option>
                                                <option value="8">Sophia Taylor</option>
                                            </select>
                                        </div>
                                        <div class="me-2">
                                            <select class="form-select form-select-sm w-auto me-2"
                                                data-control="select2">
                                                <option selected disabled>Company</option>
                                                <option value="1">
                                                    Acme Corporation
                                                </option>
                                                <option value="2">
                                                    Globex Industries
                                                </option>
                                                <option value="3">Initech</option>
                                                <option value="4">Hooli</option>
                                                <option value="5">
                                                    Stark Enterprises
                                                </option>
                                                <option value="6">Wayne Tech</option>
                                                <option value="7">Umbrella Corp</option>
                                                <option value="8">
                                                    Wonka Industries
                                                </option>
                                            </select>
                                        </div>
                                        <div class="me-2">
                                            <select class="form-select form-select-sm w-auto" data-control="select2">
                                                <option selected disabled>
                                                    RFQ Date & Time
                                                </option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                    </div>
                                </li>

                                <!-- RFQ Card -->
                                @foreach ($rfqs as $rfq)
                                    <li class="nav-item w-100 me-0 mb-md-2 mt-2">
                                        <a class="nav-link {{ $loop->first ? 'active btn-active-primary' : '' }} w-100 btn btn-flex border p-3"
                                            data-bs-toggle="tab" href="#kt_vtab_pane_4">
                                            <div class="row w-100 align-items-center">
                                                <div class="col-md-4 d-flex align-items-center">
                                                    <i class="fa-regular fa-file fs-2 text-primary pe-3"></i>
                                                    <div>
                                                        <div class="fw-semibold">
                                                            {{ $rfq->name }}
                                                        </div>
                                                        <div class="fs-7 text-muted">
                                                            {{ $rfq->country }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="fs-7">{{ $rfq->rfq_code }}</div>
                                                    <div class="fs-7">
                                                        {{ optional($rfq->created_at)->format('d M Y | h:i A') }}
                                                    </div>
                                                </div>
                                                <div class="col-md-4 text-end">
                                                    <div class="d-flex gap-2 justify-content-end mb-1">
                                                        <button class="btn btn-sm w-50 btn-outline-primary"
                                                            onclick="window.location.href='deal-form.html';">
                                                            Deal
                                                        </button>
                                                    </div>
                                                    <div
                                                        class="fs-7 text-muted d-flex align-items-center justify-content-end">
                                                        <i class="fas fa-bell fa-shake me-2 text-muted"></i>
                                                        2 Days Pending
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                        <div class="col-lg-7">
                            <div class="tab-content border rounded" id="myTabContent">
                                <div class="tab-pane fade show active" id="kt_vtab_pane_4" role="tabpanel">
                                    <div class="card shadow-none">
                                        <div
                                            class="bg-light rounded-3 d-flex justify-content-between align-items-center w-100 p-2">
                                            <div>
                                                <h3 class="mb-0 text-primary ps-3">
                                                    {{ $rfq->rfq_code }}
                                                </h3>
                                            </div>
                                            <div>{{ $rfq->company_name }} @if (!empty($rfq->country)) | {{ $rfq->country }} @endif</div>
                                            <div>
                                                <!-- Dropdown Selector -->
                                                <div>
                                                    <select class="form-select form-select-sm" id="tabSelector">
                                                        <option value="track_tab">
                                                            Track
                                                        </option>
                                                        <option value="message_tab">
                                                            Messages
                                                        </option>
                                                        <option value="message_tab">
                                                            Delete
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Tab Content -->
                                        <div>
                                            <div id="track_tab" class="tab-visible">
                                                <div class="row justify-content-center align-items-center">
                                                    <div class="col-lg-12">
                                                        <div class="trackNavbar">
                                                            <ul class="nav nav-tabs justify-content-between"
                                                                role="tablist">
                                                                <li class="nav-item inactive">
                                                                    <a class="nav-link disabled">
                                                                        <i class="fas fa-hamburger">
                                                                            <span class="text-capitalize">order
                                                                                placed</span>
                                                                        </i>
                                                                    </a>
                                                                    <div class="line"></div>
                                                                </li>
                                                                <li class="nav-item active">
                                                                    <a class="nav-link ripple active">
                                                                        <i class="fas fa-truck-moving jump">
                                                                            <span class="text-capitalize">on the
                                                                                way</span>
                                                                        </i>
                                                                    </a>
                                                                    <div class="line"></div>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link ripple">
                                                                        <i class="fas fa-truck-moving jump">
                                                                            <span class="text-capitalize">on the
                                                                                way</span>
                                                                        </i>
                                                                    </a>
                                                                    <div class="line"></div>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link ripple">
                                                                        <i class="fas fa-truck-moving jump">
                                                                            <span class="text-capitalize">on the
                                                                                way</span>
                                                                        </i>
                                                                    </a>
                                                                    <div class="line"></div>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link disabled">
                                                                        <i class="fas fa-user">
                                                                            <span
                                                                                class="text-capitalize">delivered</span>
                                                                        </i>
                                                                    </a>
                                                                    <div class="line"></div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                                                <td>Jhone Doe</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Email</th>
                                                                                <td>jhonedoe@mail.com</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    Company
                                                                                </th>
                                                                                <td>Ngen It LTD</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Phone</th>
                                                                                <td>01586548586</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    Tentative Budget
                                                                                </th>
                                                                                <td>$5000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    Purchase Date
                                                                                </th>
                                                                                <td>2 Month</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    Delivery Country
                                                                                </th>
                                                                                <td>Singapore</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    Delivery Zip Code
                                                                                </th>
                                                                                <td>2515</td>
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
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td>
                                                                                    Lorem ipsum dolor sit,
                                                                                    amet consectetur.
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2</td>
                                                                                <td>
                                                                                    Lorem ipsum dolor sit,
                                                                                    amet consectetur.
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3</td>
                                                                                <td>
                                                                                    Lorem ipsum dolor sit,
                                                                                    amet consectetur.
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>4</td>
                                                                                <td>
                                                                                    Lorem ipsum dolor sit,
                                                                                    amet consectetur.
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>5</td>
                                                                                <td>
                                                                                    Lorem ipsum dolor sit,
                                                                                    amet consectetur.
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>6</td>
                                                                                <td>
                                                                                    Lorem ipsum dolor sit,
                                                                                    amet consectetur.
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>6</td>
                                                                                <td>
                                                                                    Lorem ipsum dolor sit,
                                                                                    amet consectetur.
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>6</td>
                                                                                <td>
                                                                                    Lorem ipsum dolor sit,
                                                                                    amet consectetur amet
                                                                                    sit
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="message_tab" class="tab-hidden">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card w-100 border-0 rounded-0"
                                                            id="kt_drawer_chat_messenger">
                                                            <div class="card-header pe-5"
                                                                id="kt_drawer_chat_messenger_header">
                                                                <div class="card-title">
                                                                    <div
                                                                        class="d-flex justify-content-center flex-column me-3">
                                                                        <a href="#"
                                                                            class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">Brian
                                                                            Cox</a>

                                                                        <div class="mb-0 lh-1">
                                                                            <span
                                                                                class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                                                            <span
                                                                                class="fs-7 fw-semibold text-muted">Active</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="card-toolbar">
                                                                    <div class="me-0">
                                                                        <button
                                                                            class="btn btn-sm btn-icon btn-active-color-primary"
                                                                            data-kt-menu-trigger="click"
                                                                            data-kt-menu-placement="bottom-end">
                                                                            <i class="fas fa-dots-square fs-2"><span
                                                                                    class="path1"></span><span
                                                                                    class="path2"></span><span
                                                                                    class="path3"></span><span
                                                                                    class="path4"></span></i>
                                                                        </button>

                                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                                            data-kt-menu="true">
                                                                            <div class="menu-item px-3">
                                                                                <div
                                                                                    class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                                                    Contacts
                                                                                </div>
                                                                            </div>

                                                                            <div class="menu-item px-3">
                                                                                <a href="#"
                                                                                    class="menu-link px-3"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#kt_modal_users_search">
                                                                                    Add Contact
                                                                                </a>
                                                                            </div>

                                                                            <div class="menu-item px-3">
                                                                                <a href="#"
                                                                                    class="menu-link flex-stack px-3"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#kt_modal_invite_friends">
                                                                                    Invite Contacts

                                                                                    <span class="ms-2"
                                                                                        data-bs-toggle="tooltip"
                                                                                        aria-label="Specify a contact email to send an invitation"
                                                                                        data-bs-original-title="Specify a contact email to send an invitation"
                                                                                        data-kt-initialized="1">
                                                                                        <i
                                                                                            class="fas fa-information fs-7"><span
                                                                                                class="path1"></span><span
                                                                                                class="path2"></span><span
                                                                                                class="path3"></span></i>
                                                                                    </span>
                                                                                </a>
                                                                            </div>

                                                                            <div class="menu-item px-3"
                                                                                data-kt-menu-trigger="hover"
                                                                                data-kt-menu-placement="right-start">
                                                                                <a href="#"
                                                                                    class="menu-link px-3">
                                                                                    <span
                                                                                        class="menu-title">Groups</span>
                                                                                    <span class="menu-arrow"></span>
                                                                                </a>

                                                                                <div
                                                                                    class="menu-sub menu-sub-dropdown w-175px py-4">
                                                                                    <div class="menu-item px-3">
                                                                                        <a href="#"
                                                                                            class="menu-link px-3"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-original-title="Coming soon"
                                                                                            data-kt-initialized="1">
                                                                                            Create Group
                                                                                        </a>
                                                                                    </div>

                                                                                    <div class="menu-item px-3">
                                                                                        <a href="#"
                                                                                            class="menu-link px-3"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-original-title="Coming soon"
                                                                                            data-kt-initialized="1">
                                                                                            Invite Members
                                                                                        </a>
                                                                                    </div>

                                                                                    <div class="menu-item px-3">
                                                                                        <a href="#"
                                                                                            class="menu-link px-3"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-original-title="Coming soon"
                                                                                            data-kt-initialized="1">
                                                                                            Settings
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="menu-item px-3 my-1">
                                                                                <a href="#"
                                                                                    class="menu-link px-3"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-original-title="Coming soon"
                                                                                    data-kt-initialized="1">
                                                                                    Settings
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="btn btn-sm btn-icon btn-active-color-primary"
                                                                        id="kt_drawer_chat_close">
                                                                        <i class="fas fa-cross-square fs-2"><span
                                                                                class="path1"></span><span
                                                                                class="path2"></span></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-body" id="kt_drawer_chat_messenger_body">
                                                                <div class="scroll-y me-n5 pe-5"
                                                                    data-kt-element="messages" data-kt-scroll="true"
                                                                    data-kt-scroll-activate="true"
                                                                    data-kt-scroll-height="auto"
                                                                    data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer"
                                                                    data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body"
                                                                    data-kt-scroll-offset="0px" style="height: 104px">
                                                                    <div class="d-flex justify-content-start mb-10">
                                                                        <div
                                                                            class="d-flex flex-column align-items-start">
                                                                            <div
                                                                                class="d-flex align-items-center mb-2">
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="	https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-25.jpg" />
                                                                                </div>
                                                                                <div class="ms-3">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian
                                                                                        Cox</a>
                                                                                    <span
                                                                                        class="text-muted fs-7 mb-1">2
                                                                                        mins</span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start"
                                                                                data-kt-element="message-text">
                                                                                How likely are you to
                                                                                recommend our company to
                                                                                your friends and family ?
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex justify-content-end mb-10">
                                                                        <div
                                                                            class="d-flex flex-column align-items-end">
                                                                            <div
                                                                                class="d-flex align-items-center mb-2">
                                                                                <div class="me-3">
                                                                                    <span
                                                                                        class="text-muted fs-7 mb-1">5
                                                                                        mins</span>
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                                                                </div>

                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="	https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-25.jpg" />
                                                                                </div>
                                                                            </div>

                                                                            <div class="p-5 rounded bg-light-primary text-gray-900 fw-semibold mw-lg-400px text-end"
                                                                                data-kt-element="message-text">
                                                                                Hey there, we’re just
                                                                                writing to let you know
                                                                                that you’ve been
                                                                                subscribed to a repository
                                                                                on GitHub.
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex justify-content-start mb-10">
                                                                        <div
                                                                            class="d-flex flex-column align-items-start">
                                                                            <div
                                                                                class="d-flex align-items-center mb-2">
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="	https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-25.jpg" />
                                                                                </div>
                                                                                <div class="ms-3">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian
                                                                                        Cox</a>
                                                                                    <span
                                                                                        class="text-muted fs-7 mb-1">1
                                                                                        Hour</span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start"
                                                                                data-kt-element="message-text">
                                                                                Ok, Understood!
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex justify-content-end mb-10">
                                                                        <div
                                                                            class="d-flex flex-column align-items-end">
                                                                            <div
                                                                                class="d-flex align-items-center mb-2">
                                                                                <div class="me-3">
                                                                                    <span
                                                                                        class="text-muted fs-7 mb-1">2
                                                                                        Hours</span>
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                                                                </div>

                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="	https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-25.jpg" />
                                                                                </div>
                                                                            </div>

                                                                            <div class="p-5 rounded bg-light-primary text-gray-900 fw-semibold mw-lg-400px text-end"
                                                                                data-kt-element="message-text">
                                                                                You’ll receive
                                                                                notifications for all
                                                                                issues, pull requests!
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex justify-content-start mb-10">
                                                                        <div
                                                                            class="d-flex flex-column align-items-start">
                                                                            <div
                                                                                class="d-flex align-items-center mb-2">
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="	https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-25.jpg" />
                                                                                </div>
                                                                                <div class="ms-3">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian
                                                                                        Cox</a>
                                                                                    <span
                                                                                        class="text-muted fs-7 mb-1">3
                                                                                        Hours</span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start"
                                                                                data-kt-element="message-text">
                                                                                You can unwatch this
                                                                                repository immediately by
                                                                                clicking here:
                                                                                <a
                                                                                    href="https://keenthemes.com">Keenthemes.com</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex justify-content-end mb-10">
                                                                        <div
                                                                            class="d-flex flex-column align-items-end">
                                                                            <div
                                                                                class="d-flex align-items-center mb-2">
                                                                                <div class="me-3">
                                                                                    <span
                                                                                        class="text-muted fs-7 mb-1">4
                                                                                        Hours</span>
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                                                                </div>

                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="	https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-25.jpg" />
                                                                                </div>
                                                                            </div>

                                                                            <div class="p-5 rounded bg-light-primary text-gray-900 fw-semibold mw-lg-400px text-end"
                                                                                data-kt-element="message-text">
                                                                                Most purchased Business
                                                                                courses during this sale!
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex justify-content-start mb-10">
                                                                        <div
                                                                            class="d-flex flex-column align-items-start">
                                                                            <div
                                                                                class="d-flex align-items-center mb-2">
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="	https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-25.jpg" />
                                                                                </div>
                                                                                <div class="ms-3">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian
                                                                                        Cox</a>
                                                                                    <span
                                                                                        class="text-muted fs-7 mb-1">5
                                                                                        Hours</span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start"
                                                                                data-kt-element="message-text">
                                                                                Company BBQ to celebrate
                                                                                the last quater
                                                                                achievements and goals.
                                                                                Food and drinks provided
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex justify-content-end mb-10 d-none"
                                                                        data-kt-element="template-out">
                                                                        <div
                                                                            class="d-flex flex-column align-items-end">
                                                                            <div
                                                                                class="d-flex align-items-center mb-2">
                                                                                <div class="me-3">
                                                                                    <span
                                                                                        class="text-muted fs-7 mb-1">Just
                                                                                        now</span>
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                                                                </div>

                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="	https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-25.jpg" />
                                                                                </div>
                                                                            </div>

                                                                            <div class="p-5 rounded bg-light-primary text-gray-900 fw-semibold mw-lg-400px text-end"
                                                                                data-kt-element="message-text"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex justify-content-start mb-10 d-none"
                                                                        data-kt-element="template-in">
                                                                        <div
                                                                            class="d-flex flex-column align-items-start">
                                                                            <div
                                                                                class="d-flex align-items-center mb-2">
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="	https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-25.jpg" />
                                                                                </div>
                                                                                <div class="ms-3">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian
                                                                                        Cox</a>
                                                                                    <span
                                                                                        class="text-muted fs-7 mb-1">Just
                                                                                        now</span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start"
                                                                                data-kt-element="message-text">
                                                                                Right before vacation
                                                                                season we have the next
                                                                                Big Deal for you.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-footer pt-4"
                                                                id="kt_drawer_chat_messenger_footer">
                                                                <textarea class="form-control form-control-flush mb-3 border" rows="1" data-kt-element="input"
                                                                    placeholder="Type a message"></textarea>

                                                                <div class="d-flex flex-stack">
                                                                    <div class="d-flex align-items-center me-2">
                                                                        <button
                                                                            class="btn btn-sm btn-icon btn-active-light-primary me-1"
                                                                            type="button" data-bs-toggle="tooltip"
                                                                            aria-label="Coming soon"
                                                                            data-bs-original-title="Coming soon"
                                                                            data-kt-initialized="1">
                                                                            <i class="fas fa-paperclip fs-3"></i>
                                                                        </button>
                                                                        <button
                                                                            class="btn btn-sm btn-icon btn-active-light-primary me-1"
                                                                            type="button" data-bs-toggle="tooltip"
                                                                            aria-label="Coming soon"
                                                                            data-bs-original-title="Coming soon"
                                                                            data-kt-initialized="1">
                                                                            <i class="fas fa-cloud-arrow-up fs-3"></i>
                                                                        </button>
                                                                    </div>

                                                                    <button class="btn btn-primary" type="button"
                                                                        data-kt-element="send">
                                                                        Send
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="kt_vtab_pane_5" role="tabpanel">
                                    <p>
                                        Nulla est ullamco ut irure incididunt nulla
                                        Lorem Lorem minim irure officia enim
                                        reprehenderit. Magna duis labore cillum sint
                                        adipisicing exercitation ipsum. Nostrud ut
                                        anim non exercitation velit laboris fugiat
                                        cupidatat. Commodo esse dolore fugiat sint
                                        velit ullamco magna consequat voluptate minim
                                        amet aliquip ipsum aute laboris nisi. Labore
                                        labore veniam irure irure ipsum pariatur
                                        mollit magna in cupidatat dolore magna irure
                                        esse tempor ad mollit. Dolore commodo nulla
                                        minim amet ipsum officia consectetur amet
                                        ullamco voluptate nisi commodo ea sit eu.
                                    </p>
                                </div>

                                <div class="tab-pane fade" id="kt_vtab_pane_6" role="tabpanel">
                                    <p>
                                        Sint sit mollit irure quis est nostrud cillum
                                        consequat Lorem esse do quis dolor esse fugiat
                                        sunt do. Eu ex commodo veniam Lorem aliquip
                                        laborum occaecat qui Lorem esse mollit dolore
                                        anim cupidatat. eserunt officia id Lorem
                                        nostrud aute id commodo elit eiusmod enim
                                        irure amet eiusmod qui reprehenderit nostrud
                                        tempor. Fugiat ipsum excepteur in aliqua non
                                        et quis aliquip ad irure in labore cillum elit
                                        enim. Consequat aliquip incididunt ipsum et
                                        minim laborum laborum laborum et cillum
                                        labore. Deserunt adipisicing cillum id nulla
                                        minim nostrud labore eiusmod et amet.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                data-bs-toggle="tab" href="#quoted_rfq-{{ $rfq->id }}">
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
                                            id="quoted_rfq-{{ $rfq->id }}" role="tabpanel">
                                            <div
                                                class="d-flex justify-content-between align-items-center p-5 px-7 border-bottom border-bottom-black">
                                                <div class="text-center">
                                                    <h1 class="m-0">View The RFQ</h1>
                                                </div>
                                                <div>
                                                    <ul class="nav nav-tabs nav-line-tabs fs-6 border-0">

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
                                                        <div class="card-header rounded-0 p-0 h-40px min-h-40px">
                                                            <div>
                                                                <h3 class="m-0 p-0 ps-5 fw-bold card-title">RFQ Details
                                                                    ({{ $rfq->rfq_code }})
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div class="row rounded">
                                                                @include('metronic.pages.rfq.partials.rfq_details')

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                data-bs-toggle="tab" href="#lost_rfq-{{ $rfq->id }}">
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
                                            id="lost_rfq-{{ $rfq->id }}" role="tabpanel">
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
