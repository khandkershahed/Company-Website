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
        <div class="card-body pt-0">
            <div class="row gx-1 mt-2">
                <!-- Left Column -->
                <div class="col-lg-7">
                    <!--begin::Accordion-->
                    <div class="accordion" id="kt_accordion_1">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                <button class="accordion-button bg-light fs-4 fw-bold collapsed py-4" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#client_information" aria-expanded="false"
                                    aria-controls="client_information">
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
                    <!--end::Accordion-->
                </div>

                <!-- Right Column: Product Info -->
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
                                                        <td colspan="3" class="text-center">No Product Data Available
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

            </div> <!-- row -->

            <div class="row mt-5 gx-1">
                <div class="col-lg-3">
                    <div class="card shadow-none border">
                        <div class="card-header py-0 bg-light min-h-45px">
                            <h5 class="card-title fw-semibold m-0">
                                Assign Sales Manager
                            </h5>
                        </div>
                        <div class="card-body p-2">
                            <form action="{{ route('assign.salesman', $rfq->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="sales_manager" class="form-label">Select Sales Manager</label>
                                    <select name="sales_manager" id="sales_manager" class="form-select">
                                        <option value="">Select Manager</option>
                                        @foreach ($users as $manager)
                                            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Assign</button>
                            </form>
                            <form method="post" action="{{ route('assign.salesman', $rfq->rfq_code) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="card">

                                        <div class="row p-2">
                                            <div class="col-12">
                                                Assign Sales Manager :
                                                <a class="p-1 editRfquser" href="javascript:void(0);">
                                                    <i class="ph-note-pencil" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="col-12 Rfquser" style="display:none">
                                                <div class="row mb-3 p-2 border">
                                                    <div class="col-12">
                                                        <h5 class="text-center">Assigned Sales Manager</h5>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="col-sm-12">
                                                            <p class="mb-0">Sales Manager Name (Leader -
                                                                L1) <span class="text-danger">*</span></p>
                                                        </div>
                                                        <div class="form-group text-secondary col-sm-12">
                                                            <select name="sales_man_id_L1" class="form-control select"
                                                                data-minimum-results-for-search="Infinity"
                                                                data-placeholder="Choose  ">
                                                                <option></option>
                                                                @foreach ($users as $user)
                                                                    <option value="{{ $user->id }}">
                                                                        {{ $user->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="col-sm-12">
                                                            <p class="mb-0">Sales Manager Name (Team -
                                                                T1)</p>
                                                        </div>
                                                        <div class="form-group text-secondary col-sm-12">
                                                            <select name="sales_man_id_T1" class="form-control select"
                                                                data-minimum-results-for-search="Infinity"
                                                                data-placeholder="Choose  ">
                                                                <option></option>
                                                                @foreach ($users as $user)
                                                                    <option value="{{ $user->id }}">
                                                                        {{ $user->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="col-sm-12">
                                                            <p class="mb-0">Sales Manager Name (Team -
                                                                T2)</p>
                                                        </div>
                                                        <div class="form-group text-secondary col-sm-12">
                                                            <select name="sales_man_id_T2" class="form-control select"
                                                                data-minimum-results-for-search="Infinity"
                                                                data-placeholder="Choose ">
                                                                <option></option>
                                                                @foreach ($users as $user)
                                                                    <option value="{{ $user->id }}">
                                                                        {{ $user->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card shadow-none border">
                        <div class="card-header py-0 bg-light min-h-45px">
                            <h5 class="card-title fw-semibold m-0">
                                Create Client/Partner Account for this RFQ
                            </h5>
                        </div>
                        <div class="card-body p-2">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-app-layout>
