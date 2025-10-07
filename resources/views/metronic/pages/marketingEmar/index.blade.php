<x-admin-app-layout :title="'Marketing EMAR'">
    <div class="px-0 container-fluid">
        <div class="row">
            <div class="col">
                <div class="border-0 shadow-none card card-flush card-rounded">
                    <div class="pt-5 card-header">
                        <div class="card-title d-flex flex-column">
                            <div class="d-flex align-items-center">
                                <span class="text-gray-900 fs-2hx fw-bold me-2 lh-1 ls-n2">0</span>

                                <span class="px-4 py-2 badge badge-light-danger fs-base ms-5">
                                    <i class="fas fa-arrow-down fs-5 text-danger ms-n1" aria-hidden="true"></i>
                                    0%
                                </span>
                            </div>
                            <span class="pt-1 text-gray-500 fw-semibold fs-6">Total Mail</span>
                        </div>
                    </div>

                    <div class="card-body d-flex align-items-end pt-9">
                        <div class="mt-3 d-flex align-items-center flex-column w-100">
                            <div class="mt-auto mb-2 d-flex justify-content-between w-100">
                                <span class="text-gray-900 fw-bolder fs-6">0 to Goal</span>
                                <span class="text-gray-500 fw-bold fs-6">0%</span>
                            </div>
                            <div class="mx-3 rounded h-8px w-100 bg-light-blue">
                                <div class="rounded bg-gr-blue h-8px" role="progressbar" style="width: 0%"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="border-0 shadow-none card card-flush card-rounded">
                    <div class="pt-5 card-header">
                        <div class="card-title d-flex flex-column">
                            <div class="d-flex align-items-center">
                                <span class="text-gray-900 fs-2hx fw-bold me-2 lh-1 ls-n2">0/0</span>

                                <span class="px-4 py-2 badge badge-light-primary fs-base ms-5">
                                    <i class="fas fa-arrow-up fs-5 text-primary ms-n1" aria-hidden="true"></i>
                                    2.2%
                                </span>
                            </div>
                            <span class="pt-1 text-gray-500 fw-semibold fs-6">Target Vs Achv.</span>
                        </div>
                    </div>

                    <div class="card-body d-flex align-items-end pt-9">
                        <div class="mt-3 d-flex align-items-center flex-column w-100">
                            <div class="mt-auto mb-2 d-flex justify-content-between w-100">
                                <span class="text-gray-900 fw-bolder fs-6">0 to Goal</span>
                                <span class="text-gray-500 fw-bold fs-6">0%</span>
                            </div>

                            <div class="mx-3 rounded h-8px w-100 bg-light-blue">
                                <div class="rounded bg-gr-blue h-8px" role="progressbar" style="width: 0%"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="border-0 shadow-none card card-flush card-rounded">
                    <div class="pt-5 card-header">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="text-gray-900 card-label fw-bold">Sector Cover</span>
                            <span class="mt-1 text-gray-500 fw-semibold fs-6">0 Sector We Cover</span>
                        </h3>
                        <div class="card-toolbar">
                            <span class="px-4 py-2 badge badge-light-danger fs-base mt-n3">
                                <i class="fas fa-arrow-down fs-5 text-danger ms-n1 me-2" aria-hidden="true"></i>
                                <span class="fs-4">0</span>
                            </span>
                        </div>
                    </div>
                    <div class="pt-6 card-body d-flex align-items-end">
                        <div class="mx-0 row align-items-center w-100">
                            <div class="px-0 col-12">
                                <div class="d-flex flex-column content-justify-center">
                                    <div class="mt-5 d-flex fs-6 fw-semibold align-items-center">
                                        <div class="bullet bg-success me-3 rounded-circle"
                                            style="
                                            width: 12px;
                                            height: 12px;
                                          ">
                                        </div>

                                        <div class="text-gray-600 fw-normal me-5">
                                            Product Mail:
                                        </div>

                                        <div class="text-gray-700 ms-auto fw-bolder text-end">
                                            0
                                        </div>
                                    </div>

                                    <div class="my-2 d-flex fs-6 fw-semibold align-items-center">
                                        <div class="bullet bg-primary me-3 rounded-circle"
                                            style="
                                            border-radius: 3px;
                                            width: 12px;
                                            height: 12px;
                                          ">
                                        </div>

                                        <div class="text-gray-600 fw-normal me-5">
                                            Solution Mail:
                                        </div>

                                        <div class="text-gray-700 ms-auto fw-bolder text-end">
                                            0
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="border-0 shadow-none card card-flush card-rounded">
                    <div class="pt-5 card-header">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="text-gray-900 card-label fw-bold">New Client Mailed</span>
                            <span class="mt-1 text-gray-500 fw-semibold fs-6">0 Current Client</span>
                        </h3>
                        <div class="card-toolbar">
                            <span class="px-4 py-2 badge badge-light-danger fs-base mt-n3">
                                <i class="fas fa-arrow-down fs-5 text-danger ms-n1 me-2" aria-hidden="true"></i>
                                <span class="fs-4">0</span>
                            </span>
                        </div>
                    </div>
                    <div class="pt-6 card-body d-flex align-items-end">
                        <div class="mx-0 row align-items-center w-100">
                            <div class="px-0 col-12">
                                <div class="mt-5 d-flex flex-column content-justify-center">
                                    <div class="d-flex fs-6 fw-semibold align-items-center">
                                        <div class="bullet bg-success me-3 rounded-circle"
                                            style="
                                            border-radius: 3px;
                                            width: 12px;
                                            height: 12px;
                                          ">
                                        </div>

                                        <div class="text-gray-600 fw-normal me-5">
                                            Existing Follow-up:
                                        </div>

                                        <div class="text-gray-700 ms-auto fw-bolder text-end">
                                            0
                                        </div>
                                    </div>

                                    <div class="my-2 d-flex fs-6 fw-semibold align-items-center">
                                        <div class="bullet bg-primary me-3 rounded-circle"
                                            style="
                                            border-radius: 3px;
                                            width: 12px;
                                            height: 12px;
                                          ">
                                        </div>

                                        <div class="text-gray-600 fw-normal me-5">
                                            This Month New Client:
                                        </div>

                                        <div class="text-gray-700 ms-auto fw-bolder text-end">
                                            0
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
            <div class="col-lg-12 ps-0">
                <div class="my-10 d-flex align-items-center">
                    <span class="px-5 py-5 rounded-pill sub_title badge badge-primary w-100px ms-5"
                        style="background-color: #296088 ;margin-bottom: -10px; z-index: 5">Mail Details</span>
                    <div class="mt-3" style="height: 2px; width: 100%; background-color: #EBEBEB;"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Email Option Column -->
            <div class="col-lg-3">
                <div class="border-0 shadow-none card card-flush card-rounded">
                    <div class="pt-0 card-body">
                        <h3 class="pt-10 text-gray-800 fw-bold">
                            Choose Email Option
                        </h3>
                        <div class="mt-10 mb-3 form-check">
                            <input class="form-check-input email-option-radio" type="radio" value="Email"
                                id="inbox-radio-120" name="inbox">
                            <label class="form-check-label d-block" for="inbox-radio-120">
                                <span class="fw-semibold">Send Individual Email</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input email-option-radio" type="radio" value="Bulk"
                                id="inbox-radio-122" name="inbox">
                            <label class="form-check-label d-block" for="inbox-radio-122">
                                <span class="fw-semibold">Send Bulk Email</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Client Select Column -->
            <div class="col-lg-3">
                <div class="">
                    <div class="border-0 shadow-none card card-flush card-rounded client-default-text">
                        <div class="pt-5 card-header">
                            <h3 class="text-gray-800 card-title fw-bold">
                                Select Client’s Mail
                            </h3>
                            <p class="text-gray-500">Pick an email to continue</p>
                        </div>
                        <div class="pt-5 card-body">
                            <select class="form-select form-select-solid" data-control="select2"
                                data-placeholder="Client Email" name="client_email">
                                <option></option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->email }}">{{ $client->name }}
                                        [{{ $client->company_name }}]</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- if chose single email -->
                    <div class="single-email-div" style="display: none">
                        <div class="border-0 shadow-none card card-flush card-rounded">
                            <div class="pt-5 card-header">
                                <h3 class="text-gray-800 card-title fw-bold">
                                    Select Product
                                </h3>
                                <p class="text-gray-500">Type product name</p>
                            </div>
                            <div class="pt-5 card-body">
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-placeholder="Select Product" name="product_id">
                                    <option></option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->email }}">{{ $product->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- if chose bulk -->
                    <div class="bulk-email-div" style="display: none">
                        <div class="border-0 shadow-none card card-flush card-rounded">
                            <div class="pt-5 card-header">
                                <h3 class="text-gray-800 card-title fw-bold">
                                    Multi Client
                                </h3>
                            </div>
                            <div class="pt-5 card-body">
                                <tags
                                    class="tagify form-control d-flex align-items-center tagify--noTags tagify--empty"
                                    tabindex="-1">
                                    <span contenteditable="" tabindex="0" data-placeholder="Choose Multi Client"
                                        aria-placeholder="Choose Multi Client" class="tagify__input" role="textbox"
                                        aria-autocomplete="both" aria-multiline="false"></span>

                                </tags><input class="form-control d-flex align-items-center" value=""
                                    placeholder="Choose Multi Client" id="kt_tagify_users">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="border-0 shadow-none card card-flush card-rounded">
                    <div class="pt-5 card-header flex-column">
                        <h3 class="text-gray-800 card-title fw-bold">
                            Select Client’s Mail
                        </h3>
                        <p class="text-gray-500">Type product name</p>
                    </div>
                    <div class="pt-5 card-body">
                        <tags class="tagify form-control d-flex align-items-center tagify--noTags tagify--empty"
                            tabindex="-1">
                            <span contenteditable="" tabindex="0" data-placeholder="" aria-placeholder=""
                                class="tagify__input" role="textbox" aria-autocomplete="both"
                                aria-multiline="false"></span>

                        </tags><input class="form-control d-flex align-items-center" value=""
                            id="kt_tagify_country">
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="border-0 shadow-none card card-flush card-rounded">
                    <div class="pt-5 card-header flex-column">
                        <h3 class="text-gray-800 card-title fw-bold">
                            Attachment
                        </h3>
                        <p class="text-gray-500">Choose file from here</p>
                    </div>
                    <div class="pt-5 card-body">
                        <input type="file" class="form-control" placeholder="name@example.com" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 ps-0">
                <div class="my-10 d-flex align-items-center">
                    <span class="px-5 py-5 rounded-pill sub_title badge badge-primary w-150px ms-5"
                        style="background-color: #296088 ;margin-bottom: -10px; z-index: 5">Preview &amp;Create
                        Mail</span>
                    <div class="mt-3" style="height: 2px; width: 100%; background-color: #EBEBEB;"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <div class="border-0 shadow-none card card-flush card-rounded">
                    <div class="card-body">
                        {{-- <div class="p-3 mb-3 border rounded-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Email Template One"
                                    id="inbox-radio-1" name="inbox">
                                <label class="form-check-label d-block" for="inbox-radio-1" data-bs-toggle="modal"
                                    data-bs-target="#inboxModal">
                                    <span class="fw-semibold">Businness</span>
                                </label>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="border-0 shadow-none card card-flush card-rounded">
                    <div class="pb-2 card-body pe-0">
                        <form action="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="toField" class="form-label fw-semibold">To</label>
                                        <textarea id="toField" class="py-0 form-control border-top-0 border-right-0 border-left-0" rows="1"
                                            placeholder="Enter recipient email"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="subjectField" class="form-label fw-semibold">Subject</label>
                                        <textarea id="subjectField" class="py-0 form-control border-top-0 border-right-0 border-left-0" rows="1"
                                            placeholder="Enter subject"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="messageField" class="form-label fw-semibold">Message</label>
                                        <textarea id="messageField" class="py-0 form-control border-top-0 border-right-0 border-left-0" rows="6"
                                            placeholder="Type your message here"></textarea>
                                    </div>
                                    <div class="mt-2 mb-1 d-flex align-items-center">
                                        <button type="submit" class="px-10 py-3 btn btn-primary rounded-pill"
                                            style="background-color: #0B57D0;">Send</button>
                                        <div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-15 row">
            <div class="col-lg-12">
                <div class="mb-5 bg-transparent border-0 shadow-none card card-flush card-rounded">
                    <div class="p-0 card-header align-items-center">
                        <!-- Main Tabs -->
                        <ul class="border-0 nav nav-tabs nav-line-tabs fs-6 align-items-center" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="border-0 nav-link active" data-bs-toggle="tab" href="#tab_all"
                                    role="tab">All Email</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="border-0 nav-link" data-bs-toggle="tab" href="#tab_draft"
                                    role="tab">Draft Email</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="border-0 nav-link" data-bs-toggle="tab" href="#tab_draft"
                                    role="tab">Sent Email</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="border-0 nav-link" data-bs-toggle="tab" href="#tab_deleted"
                                    role="tab">Deleted Email</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="bg-white border-0 shadow-none card card-flush card-rounded">
                    <div class="p-5 card-body">
                        <div class="tab-content">
                            <!-- ALL Tab -->
                            <div class="tab-pane fade show active" id="tab_all">
                                <div class="border-0 table-responsive rounded-4">
                                    <table class="table table-row-bordered gy-5 gs-7 dataTable no-footer"
                                        id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                            <tr class="bg-light fw-bold ">
                                                <th style="width: 55.7031px;" class="sorting sorting_asc"
                                                    tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label=": activate to sort column descending">
                                                    <input type="checkbox">
                                                </th>
                                                <th style="width: 380px;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="From: activate to sort column ascending">From</th>
                                                <th style="width: 690.359px;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="Subject: activate to sort column ascending">Subject
                                                </th>
                                                <th style="width: 302.375px;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="Date: activate to sort column ascending">Date</th>
                                                <th style="width: 70.0625px;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="Status: activate to sort column ascending">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($emails as $email)
                                                <tr class="odd">
                                                    <td class="sorting_1"><input type="checkbox"></td>
                                                    <td>John Doe</td>
                                                    <td>Meeting rescheduled to Friday</td>
                                                    <td>2025/04/22</td>
                                                    <td>
                                                        <span class="badge bg-success">Read</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Draft and Deleted tabs can be added similarly -->
                            <div class="tab-pane fade" id="tab_draft">
                                <div class="border-0 table-responsive rounded-4">
                                    <table class="table table-row-bordered gy-5 gs-7 dataTable no-footer"
                                        id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                            <tr class="bg-light fw-bold ">
                                                <th style="width: 55.7031px;" class="sorting sorting_asc"
                                                    tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label=": activate to sort column descending">
                                                    <input type="checkbox">
                                                </th>
                                                <th style="width: 380px;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="From: activate to sort column ascending">From</th>
                                                <th style="width: 690.359px;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="Subject: activate to sort column ascending">Subject
                                                </th>
                                                <th style="width: 302.375px;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="Date: activate to sort column ascending">Date</th>
                                                <th style="width: 70.0625px;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="Status: activate to sort column ascending">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($emails as $email)
                                                <tr class="odd">
                                                    <td class="sorting_1"><input type="checkbox"></td>
                                                    <td>John Doe</td>
                                                    <td>Meeting rescheduled to Friday</td>
                                                    <td>2025/04/22</td>
                                                    <td>
                                                        <span class="badge bg-success">Read</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tab_deleted">
                                <div class="border-0 table-responsive rounded-4">
                                    <table class="table table-row-bordered gy-5 gs-7 dataTable no-footer"
                                        id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                            <tr class="bg-light fw-bold ">
                                                <th style="width: 55.7031px;" class="sorting sorting_asc"
                                                    tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label=": activate to sort column descending">
                                                    <input type="checkbox">
                                                </th>
                                                <th style="width: 380px;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="From: activate to sort column ascending">From</th>
                                                <th style="width: 690.359px;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="Subject: activate to sort column ascending">Subject
                                                </th>
                                                <th style="width: 302.375px;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="Date: activate to sort column ascending">Date</th>
                                                <th style="width: 70.0625px;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="Status: activate to sort column ascending">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($emails as $email)
                                                <tr class="odd">
                                                    <td class="sorting_1"><input type="checkbox"></td>
                                                    <td>John Doe</td>
                                                    <td>Meeting rescheduled to Friday</td>
                                                    <td>2025/04/22</td>
                                                    <td>
                                                        <span class="badge bg-success">Read</span>
                                                    </td>
                                                </tr>
                                            @endforeach
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
    @push('scripts')
    @endpush
</x-admin-app-layout>
