<x-admin-app-layout :title="'Marketing DMAR'">
    <div class="px-0 container-fluid">
        <div class="mb-10 row">
            <div class="col-xl-3">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="p-0 card-body">
                        <div class="d-flex flex-stack justify-content-center align-items-center h-268px">
                            <div>
                                <img class="img-fluid rounded-circle h-100px w-100px" style="border: 2px solid #296088;"
                                    src="{{ asset('https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name)) }}" alt="">
                            </div>
                            <div class="p-8 me-3 text-start">
                                <h4 class="text-black">{{ Auth::user()->name }}</h4>
                                <p class="mb-0 text-muted">{{ Auth::user()->designation }}</p>
                                <p class="mb-0 text-muted">DMAR | FY {{ date('Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="p-0 card-body">
                        <div class="px-4 d-flex flex-stack justify-content-center align-items-center h-268px">
                            <div class="d-flex align-items-center rounded-3" style="width: 50%;">
                                <div class="me-2">
                                    <img class="img-fluid" width="30px" src="{{ asset('/images/campaign.svg') }}"
                                        alt="">
                                </div>
                                <div class="ps-3">
                                    <a href="">
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-gray-800 fs-2 fw-bold lh-0">MARKETING
                                            </a> <br />
                                            <p class="mt-2 mb-0">For This Month Only</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="px-4 flex-column d-flex" style="width: 50%;">
                                <div
                                    class="p-2 mb-2 d-flex align-items-center justify-content-between bg-light rounded-2">
                                    <span class="text-black ">
                                        EMAILED
                                    </span>
                                    <span class="px-2 text-black ms-3 rounded-2">
                                        0
                                    </span>
                                </div>
                                <div
                                    class="p-2 mb-2 d-flex align-items-center justify-content-between bg-light rounded-2">
                                    <span class="text-black ">
                                        CALLED</span>
                                    <span class="px-2 text-black ms-3 rounded-2">
                                        0
                                    </span>
                                </div>
                                <div
                                    class="p-2 mb-2 d-flex align-items-center justify-content-between bg-light rounded-2">
                                    <span class="text-black ">
                                        VISITIED</span>
                                    <span class="px-2 text-black ms-3 rounded-2">
                                        0
                                    </span>
                                </div>
                                <div
                                    class="p-2 mb-2 d-flex align-items-center justify-content-between bg-light rounded-2">
                                    <span class="text-black ">
                                        POSTED</span>
                                    <span class="px-2 text-black ms-3 rounded-2">
                                        0
                                    </span>
                                </div>
                                <div class="p-2 d-flex align-items-center justify-content-between rounded-2"
                                    style="background-color: #296088;">
                                    <span class="text-white"> Total</span>
                                    <span class="px-2 text-white ms-3 rounded-2">
                                        0
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="p-0 card-body">
                        <div class="px-4 d-flex flex-stack justify-content-center align-items-center h-268px">
                            <div class="d-flex align-items-center rounded-3" style="width: 50%;">
                                <div class="me-2">
                                    <img class="img-fluid" width="30px" src="{{ asset('/images/Frame.svg') }}"
                                        alt="">
                                </div>
                                <div class="ps-3">
                                    <a href="">
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-gray-800 fs-2 fw-bold lh-0">SALES
                                            </a> <br />
                                            <p class="mt-2 mb-0">For This Month Only</p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="px-4 flex-column d-flex" style="width: 50%;">
                                <div
                                    class="p-2 mb-2 d-flex align-items-center justify-content-between bg-light rounded-2">
                                    <span class="text-black ">
                                        QUOTED</span>
                                    <span class="px-2 text-black ms-3 rounded-2">
                                        150
                                    </span>
                                </div>
                                <div
                                    class="p-2 mb-2 d-flex align-items-center justify-content-between bg-light rounded-2">
                                    <span class="text-black ">
                                        POTENTIAL</span>
                                    <span class="px-2 text-black ms-3 rounded-2">
                                        300
                                    </span>
                                </div>
                                <div
                                    class="p-2 mb-2 d-flex align-items-center justify-content-between bg-light rounded-2">
                                    <span class="text-black ">
                                        SOLD</span>
                                    <span class="px-2 text-black ms-3 rounded-2">
                                        300
                                    </span>
                                </div>
                                <div
                                    class="p-2 mb-2 d-flex align-items-center justify-content-between bg-light rounded-2">
                                    <span class="text-black ">
                                        LOST</span>
                                    <span class="px-2 text-black ms-3 rounded-2">
                                        300
                                    </span>
                                </div>
                                <div class="p-2 d-flex align-items-center justify-content-between rounded-2"
                                    style="background-color: #296088;">
                                    <span class="text-white "> Total</span>
                                    <span class="px-2 text-white ms-3 rounded-2">
                                        300
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="card-header w-100 justify-content-center align-items-center">
                        <h6 class="mb-0 fw-normal">Sectorwise Number Of Visit</h6>
                    </div>
                    <div class="pt-0 pb-5 card-body">
                        <div class="mt-3 table-responsive">
                            <table class="table border table-borderd rounded-3">
                                <thead class="bg-light rounded-3">
                                    <tr class="text-black">
                                        <th scope="col" class="py-2 ps-3">Total</th>
                                        <th scope="col" class="py-2 pe-4 text-end">Sector</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border-bottom: 1px solid #EAEAEA;">
                                        <td class="py-2 ps-3">Bank</td>
                                        <td class="py-2 pe-4 text-end">05</td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #EAEAEA;">
                                        <td class="py-2 ps-3">Government</td>
                                        <td class="py-2 pe-4 text-end">05</td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #EAEAEA;">
                                        <td class="py-2 ps-3">Education</td>
                                        <td class="py-2 pe-4 text-end">05</td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #EAEAEA;">
                                        <td class="py-2 ps-3">Small & Medium</td>
                                        <td class="py-2 pe-4 text-end">05</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="shadow-none card card-flush card-rounded">
                <div class="py-10 card-header w-100 justify-content-between align-items-center">
                    <div class="d-flex justify-content-start align-items-center">
                        <h4 class="mb-0" style="font-weight: 500;">Direct Marketing Association Research</h4>

                    </div>
                    <div class="d-flex align-items-center">
                        <div>
                            <select class="form-select form-select-sm" data-control="select2" data-placeholder="date"
                                tabindex="-1" aria-hidden="true">
                                <option>Select Date</option>
                                <option value="all">All</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>
                        <div class="mx-2">
                            <select class="form-select form-select-sm" data-control="select2"
                                data-placeholder="month" tabindex="-1" aria-hidden="true">
                                <option>Select Month</option>
                                <option value="all">All</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>
                        <div>
                            <select class="form-select form-select-sm" data-control="select2"
                                data-placeholder="subject" tabindex="-1" aria-hidden="true">
                                <option>Select Achievement</option>
                                <option value="Visit">Visit</option>
                                <option value="Call">Call</option>
                                <option value="Social">Social</option>
                                <option value="Email">Email</option>
                                <option value="Lost">Lost</option>
                                <option value="Quote">Quote</option>
                                <option value="Potential">Potential</option>
                                <option value="Sales">Sales</option>
                            </select>
                        </div>
                        <a href="marketing-dmr-target.html"
                            class="text-white btn btn-sm btn-light-primary bg-primary ms-3"
                            style="background-color: #0B6476 !important;">
                            Target <i class="text-white fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-0 card-body">
                    <div class="table-responsive" style="max-height: 630px; overflow-y: auto;">
                        <table class="table mb-0 border" style="min-width: 120%;">
                            <thead>
                                <tr class="bg-light">
                                    <th width="7%" class="ps-3">Date</th>
                                    <th width="6%">Month</th>
                                    <th width="7%">Activity</th>
                                    <th width="12%" class="text-center">Company</th>
                                    <th width="8%">Service</th>
                                    <th width="10%">Products</th>
                                    <th width="10%">Tentative</th>
                                    <th width="10%">Comments</th>
                                    <th width="10%">Action on Fail</th>
                                    <th width="10%">Current Status</th>
                                    <th width="8%">Client Type</th>
                                    <th width="8%">Sector</th>
                                    <th width="10%">Sub Sector</th>
                                    <th width="12%" class="text-end pe-5">Area</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="" style="border-bottom: 1px solid #EAEAEA;">
                                    <td class="ps-3">5 Feb 25</td>
                                    <td>Feb</td>
                                    <td>MEETING</td>
                                    <td>Grameenphone Ltd.</td>
                                    <td>Telecom</td>
                                    <td class="text-center">Software License</td>
                                    <td>$12,000</td>
                                    <td>Positive Response</td>
                                    <td>Follow Up</td>
                                    <td>Ongoing</td>
                                    <td>Existing</td>
                                    <td>Private</td>
                                    <td>Corporate</td>
                                    <td class="text-end pe-5">Banani, Dhaka</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #EAEAEA;">
                                    <td class="ps-3">8 Feb 25</td>
                                    <td>Feb</td>
                                    <td>PRESENTATION</td>
                                    <td>BRAC Bank</td>
                                    <td>Banking</td>
                                    <td class="text-center">IT Equipment</td>
                                    <td>$25,000</td>
                                    <td>Need Proposal</td>
                                    <td>Resubmit</td>
                                    <td>Pending</td>
                                    <td>New</td>
                                    <td>Private</td>
                                    <td>Finance</td>
                                    <td class="text-end pe-5">Gulshan, Dhaka</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #EAEAEA;">
                                    <td class="ps-3">12 Feb 25</td>
                                    <td>Feb</td>
                                    <td>VISIT</td>
                                    <td>Dhaka University</td>
                                    <td>Education</td>
                                    <td class="text-center">Networking</td>
                                    <td>$8,500</td>
                                    <td>Site Survey Completed</td>
                                    <td>Technical Clarification</td>
                                    <td>In Progress</td>
                                    <td>New</td>
                                    <td>Public</td>
                                    <td>Education</td>
                                    <td class="text-end pe-5">Nilkhet</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #EAEAEA;">
                                    <td class="ps-3">15 Feb 25</td>
                                    <td>Feb</td>
                                    <td>FOLLOW UP</td>
                                    <td>Bangladesh Navy</td>
                                    <td>Defense</td>
                                    <td class="text-center">Security System</td>
                                    <td>$40,000</td>
                                    <td>Under Review</td>
                                    <td>Provide Demo</td>
                                    <td>Ongoing</td>
                                    <td>Existing</td>
                                    <td>Government</td>
                                    <td>Defense</td>
                                    <td class="text-end pe-5">Chattogram</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #EAEAEA;">
                                    <td class="ps-3">20 Feb 25</td>
                                    <td>Feb</td>
                                    <td>WORKSHOP</td>
                                    <td>Beximco Pharma</td>
                                    <td>Healthcare</td>
                                    <td class="text-center">Medical Software</td>
                                    <td>$18,000</td>
                                    <td>Management Interested</td>
                                    <td>Prepare Proposal</td>
                                    <td>Prospect</td>
                                    <td>New</td>
                                    <td>Private</td>
                                    <td>Pharmaceuticals</td>
                                    <td class="text-end pe-5">Tongi</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    @endpush
</x-admin-app-layout>
