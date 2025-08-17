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
                        @if (!Route::is('admin.archived.rfq')) RFQ# @endif{{ $rfq->rfq_code }}
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
                            <ul class="mb-5 nav nav-tabs nav-line-tabs fs-6">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#companyInfo">Company Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#shippingInfo">Shipping Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#endUserInfo">End User Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#aditionalInfo">Additional Info</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="companyInfo" role="tabpanel">
                                    <div class="border shadow-none card">
                                        <div class="py-0 card-header bg-light">
                                            <h5 class="m-0 card-title fw-semibold">
                                                Client Information
                                            </h5>
                                        </div>
                                        <div class="p-2 card-body">
                                            <!-- Responsive Table -->
                                            <div class="table-responsive">
                                                <table class="table mb-0 table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Name</th>
                                                            <td>{{ $rfq->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Email</th>
                                                            <td>{{ $rfq->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Company
                                                            </th>
                                                            <td>{{ $rfq->company_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Phone</th>
                                                            <td>{{ $rfq->phone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Tentative Budget
                                                            </th>
                                                            <td>{{ $rfq->budget }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Purchase Date
                                                            </th>
                                                            <td>{{ $rfq->approximate_delivery_time }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Delivery Country
                                                            </th>
                                                            <td>{{ $rfq->shipping_country }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Delivery Zip Code
                                                            </th>
                                                            <td>{{ $rfq->shipping_zip_code }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="shippingInfo" role="tabpanel">
                                    <div class="border shadow-none card">
                                        <div class="py-0 card-header bg-light">
                                            <h5 class="m-0 card-title fw-semibold">
                                                Product Information
                                            </h5>
                                        </div>
                                        <div class="p-2 card-body">
                                            <!-- Second table (products list) -->
                                            <div class="table-responsive">
                                                <table class="table mb-0 table-bordered">
                                                    <tbody>
                                                        @if ($rfq->rfqProducts->count() > 0)
                                                            @foreach ($rfq->rfqProducts as $product)
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
                                <div class="tab-pane fade" id="endUserInfo" role="tabpanel">
                                    Upcomming
                                </div>
                                <div class="tab-pane fade" id="aditionalInfo" role="tabpanel">
                                    Comming Soon
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div id="message_container_{{ $rfq->id }}" class="container-hidden_{{ $rfq->id }}">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="border-0 card w-100 rounded-0" id="kt_drawer_chat_messenger">
                                <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
                                    <div class="card-title">
                                        <div class="d-flex justify-content-center flex-column me-3">
                                            <a href="#"
                                                class="mb-2 text-gray-900 fs-4 fw-bold text-hover-primary me-1 lh-1">{{ $rfq->name }}</a>

                                            <div class="mb-0 lh-1">
                                                <span
                                                    class="badge badge-danger badge-circle w-10px h-10px me-1"></span>
                                                <span class="fs-7 fw-semibold text-muted">In Active</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-toolbar">
                                        <div class="me-0">
                                            <button class="btn btn-sm btn-icon btn-active-color-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="fas fa-bars fs-2 text-primary"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span><span class="path4"></span></i>
                                            </button>

                                            <div class="py-3 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                data-kt-menu="true">
                                                <div class="px-3 menu-item">
                                                    <div class="px-3 pb-2 menu-content text-muted fs-7 text-uppercase">
                                                        Contacts
                                                    </div>
                                                </div>

                                                <div class="px-3 menu-item">
                                                    <a href="#" class="px-3 menu-link" data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_users_search">
                                                        Add Contact
                                                    </a>
                                                </div>

                                                <div class="px-3 menu-item">
                                                    <a href="#" class="px-3 menu-link flex-stack"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_invite_friends">
                                                        Invite Contacts

                                                        <span class="ms-2" data-bs-toggle="tooltip"
                                                            aria-label="Specify a contact email to send an invitation"
                                                            data-bs-original-title="Specify a contact email to send an invitation"
                                                            data-kt-initialized="1">
                                                            <i class="fas fa-information fs-7"><span
                                                                    class="path1"></span><span
                                                                    class="path2"></span><span
                                                                    class="path3"></span></i>
                                                        </span>
                                                    </a>
                                                </div>

                                                <div class="px-3 menu-item" data-kt-menu-trigger="hover"
                                                    data-kt-menu-placement="right-start">
                                                    <a href="#" class="px-3 menu-link">
                                                        <span class="menu-title">Groups</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>

                                                    <div class="py-4 menu-sub menu-sub-dropdown w-175px">
                                                        <div class="px-3 menu-item">
                                                            <a href="#" class="px-3 menu-link"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-original-title="Coming soon"
                                                                data-kt-initialized="1">
                                                                Create Group
                                                            </a>
                                                        </div>

                                                        <div class="px-3 menu-item">
                                                            <a href="#" class="px-3 menu-link"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-original-title="Coming soon"
                                                                data-kt-initialized="1">
                                                                Invite Members
                                                            </a>
                                                        </div>

                                                        <div class="px-3 menu-item">
                                                            <a href="#" class="px-3 menu-link"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-original-title="Coming soon"
                                                                data-kt-initialized="1">
                                                                Settings
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="px-3 my-1 menu-item">
                                                    <a href="#" class="px-3 menu-link" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Coming soon" data-kt-initialized="1">
                                                        Settings
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="btn btn-sm btn-icon btn-active-color-primary"
                                            id="kt_drawer_chat_close">
                                            <i class="fas fa-cross-square fs-2"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body" id="kt_drawer_chat_messenger_body">
                                    <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true"
                                        data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                                        data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer"
                                        data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body"
                                        data-kt-scroll-offset="0px" style="height: 104px">

                                        <div class="mb-10 d-flex justify-content-center">
                                            <div class="d-flex flex-column align-items-center">

                                                <div class="p-5 text-gray-900 rounded bg-light-info fw-semibold mw-lg-400px text-start"
                                                    data-kt-element="message-text">
                                                    No Message Yet.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-4 card-footer" id="kt_drawer_chat_messenger_footer">
                                    <textarea class="mb-3 border form-control form-control-flush" rows="1" data-kt-element="input"
                                        placeholder="Type a message"></textarea>

                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center me-2">
                                            <button class="btn btn-sm btn-icon btn-active-light-primary me-1"
                                                type="button" data-bs-toggle="tooltip" aria-label="Coming soon"
                                                data-bs-original-title="Coming soon" data-kt-initialized="1">
                                                <i class="fas fa-paperclip fs-3"></i>
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-active-light-primary me-1"
                                                type="button" data-bs-toggle="tooltip" aria-label="Coming soon"
                                                data-bs-original-title="Coming soon" data-kt-initialized="1">
                                                <i class="fas fa-cloud-arrow-up fs-3"></i>
                                            </button>
                                        </div>

                                        <button class="btn btn-primary" type="button" data-kt-element="send">
                                            Send
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endforeach
