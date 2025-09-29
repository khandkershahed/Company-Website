<x-admin-app-layout :title="'CRM :- ' . $rfq->rfq_code">

    <div class="card card-flash">

        <div class="card-header">
            <div class="card-title">
                <h3 class="card-title">#{{ $rfq->rfq_code }} || {{ $rfq->country }}</h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('admin.job-post.index') }}" class="btn btn-light-info">
                    <span class="svg-icon svg-icon-3">
                        <!-- SVG content omitted for brevity -->
                    </span>
                    Back to the list
                </a>
            </div>
        </div>
        <form method="post" action="{{ route('assign.salesman', $rfq->rfq_code) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body pt-0">
                <div class="row gx-1 mt-2">
                    <div class="col-lg-7">
                        <!--begin::Accordion-->
                        <div class="accordion" id="kt_accordion_1">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                    <button class="accordion-button bg-light fs-4 fw-bold collapsed py-4" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#client_information"
                                        aria-expanded="false" aria-controls="client_information">
                                        Client Information
                                    </button>
                                </h2>
                                <div id="client_information" class="accordion-collapse collapse"
                                    aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            @php
                                                $infoTables = [];
                                                // User Info
                                                $infoTables[] = [
                                                    'title' => 'User Info',
                                                    'rows' => [
                                                        ['Name', $rfq->name],
                                                        [
                                                            'Email',
                                                            '<a href="mailto:' .
                                                            $rfq->email .
                                                            '" style="color:#ae0a46;">' .
                                                            $rfq->email .
                                                            '</a>',
                                                        ],
                                                        ['Phone', $rfq->phone],
                                                        ['Company Name', $rfq->company_name],
                                                        ['Designation', $rfq->designation],
                                                        ['Address', $rfq->address],
                                                        ['Country', $rfq->country],
                                                        ['City', $rfq->city],
                                                        ['Zip Code', $rfq->zip_code],
                                                        ['Reseller', $rfq->reseller == 1 ? 'Yes' : 'No'],
                                                    ],
                                                ];

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
                                                            ['Company Name', $rfq->shipping_company_name],
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
                                                            ['Company Name', $rfq->end_user_company_name],
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
                                                            ['Purchase Date', $rfq->approximate_delivery_time],
                                                        ],
                                                    ];
                                                }
                                            @endphp

                                            @foreach (array_chunk($infoTables, 2) as $tablePair)
                                                <table class="stack-table" width="100%" cellpadding="0"
                                                    cellspacing="0" border="0"
                                                    style="margin-top:10px; table-layout:fixed;">
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
                        <!--end::Accordion-->
                    </div>
                    <div class="col-lg-5">
                        <div class="accordion" id="kt_accordion_2">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="kt_accordion_2_header_1">
                                    <button class="accordion-button bg-light fs-4 fw-bold collapsed py-4" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#product_information"
                                        aria-expanded="false" aria-controls="product_information">
                                        Product Information
                                    </button>
                                </h2>
                                <div id="product_information" class="accordion-collapse collapse"
                                    aria-labelledby="kt_accordion_2_header_1" data-bs-parent="#kt_accordion_2">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <tbody>
                                                    @forelse ($rfq->rfqProducts as $product)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $product->product_name }}</td>
                                                            <td>{{ $product->qty }}</td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="3" class="text-center">No Product Data
                                                                Available
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
                </div>

                <div class="row mt-5 gx-1">
                    {{-- <div class="col-lg-3">
                        <div class="card shadow-none border">
                            <div class="card-header py-0 bg-light min-h-45px">
                                <h5 class="card-title fw-semibold m-0">
                                    Assign Sales Manager
                                </h5>
                            </div>
                            <div class="card-body p-2">

                                <div class="mb-5">
                                    <label for="sales_man_id_L1" class="form-label">Sales Manager Name (Leader -
                                        L1)</label>
                                    <select name="sales_man_id_L1" id="sales_man_id_L1" class="form-control select"
                                        data-control="select2" data-placeholder="Select Sales Manager"
                                        data-allow-clear="true" data-minimum-results-for-search="0" required>
                                        <option></option>
                                        @foreach ($users as $manager)
                                            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5">
                                    <label for="sales_man_id_T1" class="form-label">Sales Manager Name (Team -
                                        T1)</label>
                                    <select name="sales_man_id_T1" id="sales_man_id_T1" class="form-control select"
                                        data-control="select2" data-placeholder="Select Sales Manager"
                                        data-allow-clear="true" data-minimum-results-for-search="0">
                                        <option></option>
                                        @foreach ($users as $manager)
                                            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5">
                                    <label for="sales_man_id_T2" class="form-label">Sales Manager Name (Team -
                                        T2)</label>
                                    <select name="sales_man_id_T2" id="sales_man_id_T2" class="form-control select"
                                        data-control="select2" data-placeholder="Select Sales Manager"
                                        data-allow-clear="true" data-minimum-results-for-search="0">
                                        <option></option>
                                        @foreach ($users as $manager)
                                            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-8 offset-lg-2">
                        <div class="card shadow-none border">
                            <div class="card-header py-0 bg-light min-h-45px">
                                <h5 class="card-title fw-semibold m-0">
                                    Create Client/Partner Account for this RFQ
                                </h5>
                            </div>
                            <div class="card-body p-2">
                                <div class="row">
                                    <div class="col-12 mt-5 mb-7 text-center">
                                        <p class="mb-0 p-0 d-flex align-items-center justify-content-center fs-3">
                                            Register
                                            as <span class="text-danger">*</span>
                                            <label class="form-check-label ms-7 me-2 d-flex align-items-center"
                                                for="account_type_client">
                                                <input class="form-check-input me-2" type="radio" value="client"
                                                    id="account_type_client" name="account_type" checked>
                                                Client
                                            </label>
                                            <label class="form-check-label d-flex align-items-center ms-7"
                                                for="account_type_partner">
                                                <input class="form-check-input me-2" type="radio" value="partner"
                                                    id="account_type_partner" name="account_type">
                                                Partner
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col-lg-6 mb-5">
                                        <div class="mb-3">
                                            <label class="form-label">Name <span class="text-danger">*</span></label>
                                            <div class="form-control-feedback form-control-feedback-start">
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="John Doe" value="{{ $rfq->name }}" required />
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-5">
                                        <div class="mb-3">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <div class="form-control-feedback form-control-feedback-start">
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="example@example.com" value="{{ $rfq->email }}"
                                                    required />
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="form-control-feedback-icon">
                                                    <i class="ph-user-circle-plus text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-5">
                                        <div class="mb-3">
                                            <label class="form-label">Phone</label>
                                            <div class="form-control-feedback form-control-feedback-start">
                                                <input type="tel" class="form-control" name="phone"
                                                    placeholder="Phone" value="{{ $rfq->phone }}" />
                                                <div class="form-control-feedback-icon">
                                                    <i class="ph-user-circle-plus text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-5">
                                        <div class="mb-3">
                                            <label class="form-label">Company name</label>
                                            <div class="form-control-feedback form-control-feedback-start">
                                                <input type="text" class="form-control" name="company_name"
                                                    placeholder="Company Name" value="{{ $rfq->company_name }}" />
                                                <div class="form-control-feedback-icon">
                                                    <i class="ph-user-circle-plus text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- password -->
                                    <div class="col-lg-4 mb-5">
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="fv-row" data-kt-password-meter="true">
                                                <div class="position-relative mb-3">
                                                    @php
                                                        $name = trim($rfq->name ?? '');
                                                        $firstName = explode(' ', $name)[0] ?? 'User';
                                                        $phone = $rfq->phone ?? rand(1000, 9999);
                                                    @endphp
                                                    <input class="form-control form-control-lg" type="password"
                                                        placeholder="" value="{{ $firstName . $phone }}"
                                                        name="password" autocomplete="off" />

                                                    <!--begin::Visibility toggle-->
                                                    <span
                                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                        data-kt-password-meter-control="visibility">
                                                        <i class="fas fa-eye-slash fs-1"><span
                                                                class="path1"></span><span
                                                                class="path2"></span><span
                                                                class="path3"></span><span class="path4"></span></i>
                                                        <i class="fas fa-eye d-none fs-1"><span
                                                                class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span></i>
                                                    </span>
                                                    <!--end::Visibility toggle-->
                                                </div>
                                            </div>
                                            <!--begin::Hint-->
                                            <div class="text-muted">
                                                Use 8 or more characters with a mix of letters, numbers & symbols.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

</x-admin-app-layout>
