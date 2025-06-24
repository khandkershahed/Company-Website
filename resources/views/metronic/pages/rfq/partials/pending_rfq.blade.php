@foreach ($rfqs as $rfq)
    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="pending_rfq_{{ $rfq->id }}"
        role="tabpanel">
        <div class="card shadow-none">
            <div class="bg-light rounded-3 d-flex justify-content-between align-items-center w-100 p-2">
                <div>
                    <h3 class="mb-0 text-primary ps-3">
                        {{ $rfq->rfq_code }}
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
                            <option value="message_tab_{{ $rfq->id }}">Messages</option>
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
                    </div>
                </div>
                <div id="message_container_{{ $rfq->id }}" class="container-hidden_{{ $rfq->id }}">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card w-100 border-0 rounded-0" id="kt_drawer_chat_messenger">
                                <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
                                    <div class="card-title">
                                        <div class="d-flex justify-content-center flex-column me-3">
                                            <a href="#"
                                                class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{ $rfq->name }}</a>

                                            <div class="mb-0 lh-1">
                                                <span class="badge badge-danger badge-circle w-10px h-10px me-1"></span>
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

                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                        Contacts
                                                    </div>
                                                </div>

                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_users_search">
                                                        Add Contact
                                                    </a>
                                                </div>

                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link flex-stack px-3"
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

                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                    data-kt-menu-placement="right-start">
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">Groups</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>

                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-original-title="Coming soon"
                                                                data-kt-initialized="1">
                                                                Create Group
                                                            </a>
                                                        </div>

                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-original-title="Coming soon"
                                                                data-kt-initialized="1">
                                                                Invite Members
                                                            </a>
                                                        </div>

                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-original-title="Coming soon"
                                                                data-kt-initialized="1">
                                                                Settings
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="menu-item px-3 my-1">
                                                    <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
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
                                        {{-- <div class="d-flex justify-content-start mb-10">
                                            <div class="d-flex flex-column align-items-start">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic"
                                                            src="	https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-25.jpg" />
                                                    </div>
                                                    <div class="ms-3">
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian
                                                            Cox</a>
                                                        <span class="text-muted fs-7 mb-1">2
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
                                            <div class="d-flex flex-column align-items-end">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="me-3">
                                                        <span class="text-muted fs-7 mb-1">5
                                                            mins</span>
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                                    </div>

                                                    <div class="symbol symbol-35px symbol-circle">
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
                                        </div> --}}
                                        <div class="d-flex justify-content-center mb-10">
                                            <div class="d-flex flex-column align-items-center">

                                                <div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start"
                                                    data-kt-element="message-text">
                                                    No Message Yet.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
                                    <textarea class="form-control form-control-flush mb-3 border" rows="1" data-kt-element="input"
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
                </div>
            </div>
        </div>
    </div>
@endforeach
