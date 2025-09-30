
<x-admin-app-layout :title="'Sales Dashboard'">
    <div
        class="px-0 container-fluid">
        <div class="row">
            <div class="col-xl-4 ps-0">
                <a href="#" class="text-decoration-none">
                    <div class="shadow-none card card-flush card-rounded">
                        <div class="p-10 card-body px-15">
                            <div class="d-flex flex-stack justify-content-between">
                                <div class="d-flex align-items-center me-3 w-50 rounded-3">
                                    <div class="flex-grow-1">
                                        <p class="mb-0 text-black fw-bold" style="font-size: 20px;">
                                            Today’s Sales
                                        </p>
                                        <span class="pt-1 text-gray-500 fw-semibold d-block fs-6">{{ date('d M Y') }}</span>
                                    </div>
                                </div>
                                <div class="flex-column d-flex w-50">
                                    <div class="d-flex align-items-center justify-content-between pe-3">
                                        <span class="text-gray-500 fw-semibold"></span>
                                        <span class="px-2 ms-3 rounded-2 fs-1 fw-bold">0$</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 d-flex flex-stack justify-content-between">
                                <div class="d-flex align-items-center w-50 rounded-3">
                                    <div class="flex-grow-1">
                                        <p class="mb-0 text-black fw-bold" style="font-size: 20px;">
                                            Total Sales
                                        </p>
                                        <span class="pt-1 text-gray-500 fw-semibold d-block fs-6">FY{{ date('Y') }}</span>
                                    </div>
                                </div>
                                <div class="flex-column d-flex w-50">
                                    <div class="d-flex align-items-center justify-content-between pe-3">
                                        <span class="text-gray-500 fw-semibold"></span>
                                        <span class="px-2 ms-3 rounded-2 fs-1 fw-bold">0$</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4">
                <a href="#" class="text-decoration-none">
                    <div class="shadow-none card card-flush card-rounded">
                        <div class="p-15 card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-9">
                                    <div class="d-flex flex-stack justify-content-between">
                                        <div class="d-flex align-items-center me-3 w-50 rounded-3">
                                            <span class="p-3 rounded-3 me-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M15.091 15.997C21.662 15.964 24 12.484 24 9.50003C23.9986 8.70027 23.7237 7.92504 23.2209 7.3031C22.7181 6.68116 22.0177 6.24993 21.236 6.08103C21.372 5.69403 21.49 5.33903 21.57 5.07003C21.7445 4.48474 21.7787 3.86658 21.6698 3.26562C21.5608 2.66466 21.3118 2.09782 20.943 1.61103C20.5711 1.10927 20.0865 0.70202 19.5282 0.422166C18.9698 0.142312 18.3535 -0.00229433 17.729 2.85174e-05H6.271C5.64622 -0.00233582 5.02965 0.142349 4.47114 0.422386C3.91263 0.702423 3.42785 1.10995 3.056 1.61203C2.68741 2.09876 2.43866 2.66547 2.3299 3.26624C2.22114 3.86702 2.25543 4.48497 2.43 5.07003C2.51 5.33903 2.627 5.69403 2.764 6.08103C1.98228 6.24993 1.28186 6.68116 0.779063 7.3031C0.27627 7.92504 0.00136274 8.70027 0 9.50003C0 12.484 2.339 15.964 8.909 15.997C8.965 16.299 9 16.607 9 16.92V20C9 21.826 7.464 21.992 7 22H6C5.73478 22 5.48043 22.1054 5.29289 22.2929C5.10536 22.4805 5 22.7348 5 23C5 23.2652 5.10536 23.5196 5.29289 23.7071C5.48043 23.8947 5.73478 24 6 24H18C18.2652 24 18.5196 23.8947 18.7071 23.7071C18.8946 23.5196 19 23.2652 19 23C19 22.7348 18.8946 22.4805 18.7071 22.2929C18.5196 22.1054 18.2652 22 18 22H17.008C16.536 21.992 15 21.826 15 20V16.92C15 16.607 15.035 16.299 15.091 15.997ZM20.5 8.00003C21.327 8.00003 22 8.67303 22 9.50003C22 11.534 20.391 13.697 15.964 13.97C16.185 13.671 16.438 13.394 16.726 13.149C18.465 11.671 19.659 9.69603 20.453 7.99003C20.47 7.99003 20.483 8.00003 20.5 8.00003ZM2 9.50003C2 8.67303 2.673 8.00003 3.5 8.00003C3.517 8.00003 3.531 7.99103 3.547 7.99003C4.341 9.69603 5.534 11.67 7.274 13.149C7.562 13.394 7.815 13.67 8.036 13.97C3.609 13.697 2 11.534 2 9.50003ZM10.513 22C10.808 21.459 11 20.806 11 20V16.92C11.0033 15.914 10.7876 14.9194 10.3678 14.0052C9.94799 13.091 9.33417 12.2791 8.569 11.626C6.8 10.122 5.222 7.45903 4.348 4.50403C4.26275 4.21713 4.24649 3.91414 4.30053 3.61977C4.35458 3.32539 4.4774 3.04794 4.659 2.81003C5.043 2.29503 5.631 2.00003 6.271 2.00003H17.728C18.368 2.00003 18.956 2.29503 19.34 2.80903C19.5209 3.04731 19.6433 3.32474 19.6973 3.61898C19.7513 3.91322 19.7354 4.21604 19.651 4.50303C18.776 7.46003 17.198 10.122 15.43 11.626C14.6647 12.279 14.0508 13.0909 13.631 14.0051C13.2112 14.9193 12.9955 15.914 12.999 16.92V20C12.999 20.806 13.19 21.459 13.486 22H10.513ZM9.791 9.76303C9.66236 9.67434 9.56632 9.54595 9.51756 9.3975C9.4688 9.24906 9.47001 9.08872 9.521 8.94103L10.04 7.33503L8.674 6.33503C8.54926 6.2436 8.45659 6.11509 8.40921 5.96787C8.36183 5.82064 8.36217 5.66221 8.41018 5.51518C8.45819 5.36816 8.55142 5.24006 8.67655 5.14916C8.80169 5.05827 8.95234 5.00922 9.107 5.00903H10.788L11.299 3.41603C11.348 3.26918 11.442 3.14147 11.5676 3.05097C11.6933 2.96048 11.8442 2.91179 11.999 2.91179C12.1538 2.91179 12.3047 2.96048 12.4304 3.05097C12.556 3.14147 12.65 3.26918 12.699 3.41603L13.209 5.00903H14.89C15.0449 5.00894 15.1959 5.05787 15.3213 5.14881C15.4467 5.23976 15.5402 5.36806 15.5882 5.51534C15.6363 5.66262 15.6365 5.82133 15.5889 5.96875C15.5412 6.11617 15.4482 6.24473 15.323 6.33603L13.957 7.33603L14.476 8.94203C14.5228 9.08974 14.5218 9.24846 14.4732 9.39558C14.4245 9.5427 14.3307 9.6707 14.205 9.76136C14.0793 9.85201 13.9282 9.90069 13.7733 9.90045C13.6183 9.90021 13.4674 9.85107 13.342 9.76003L11.999 8.77203L10.655 9.75903C10.5303 9.85187 10.3791 9.90234 10.2237 9.90306C10.0682 9.90378 9.91657 9.85471 9.791 9.76303Z" fill="#296088" />
                                                </svg>
                                            </span>
                                            <div class="flex-grow-1">
                                                <span class="text-black w-100 fs-6">
                                                    Target
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-column d-flex w-50">
                                            <div class="d-flex align-items-center justify-content-between pe-3">
                                                <span class="text-black fw-semibold"></span>
                                                <span class="px-2 text-black ms-3 rounded-2 fs-1">0$</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-stack justify-content-between">
                                        <div class="d-flex align-items-center me-3 w-50 rounded-3">
                                            <span class="p-3 rounded-3 me-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <mask id="mask0_1058_4843" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                                        <rect width="24" height="24" fill="#D9D9D9" />
                                                    </mask>
                                                    <g mask="url(#mask0_1058_4843)">
                                                        <path d="M5 21C4.45 21 3.97917 20.8042 3.5875 20.4125C3.19583 20.0208 3 19.55 3 19V5C3 4.45 3.19583 3.97917 3.5875 3.5875C3.97917 3.19583 4.45 3 5 3H19C19.55 3 20.0208 3.19583 20.4125 3.5875C20.8042 3.97917 21 4.45 21 5V19C21 19.55 20.8042 20.0208 20.4125 20.4125C20.0208 20.8042 19.55 21 19 21H5ZM17.275 19H19V17.275L17.275 19ZM5.85 19H7.675L10.675 16H12.8L9.8 19H11.4L14.4 16H16.525L13.525 19H15.15L18.15 16H19V5H5V17.725L6.725 16H8.85L5.85 19ZM7.65 14L6.25 12.6L10.675 8.175L12.675 10.175L16.35 6.5L17.75 7.9L12.675 13L10.675 11L7.65 14Z" fill="#296088" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <div class="flex-grow-1">
                                                <span class="text-black w-100 fs-6">
                                                    Achievement
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-column d-flex w-50">
                                            <div class="d-flex align-items-center justify-content-between pe-3">
                                                <span class="text-black fw-semibold"></span>
                                                <span class="px-2 text-black ms-3 rounded-2 fs-1 ">0$</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 d-flex justify-content-end">
                                    <div class="w-70px h-70px rounded-circle d-flex justify-content-center align-items-center" style="background-color: #296088;">
                                        <p class="mb-0 text-white">0%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4">
                <a href="{{ route('admin.rfq.index') }}" class="text-decoration-none">
                    <div class="shadow-none card card-flush card-rounded">
                        <div class="p-15 card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="d-flex flex-stack justify-content-between">
                                        <div class="d-flex align-items-center me-3 w-50 rounded-3">
                                            <span class="p-3 rounded-3 me-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <mask id="mask0_300_1454" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                                        <rect width="24" height="24" fill="#D9D9D9" />
                                                    </mask>
                                                    <g mask="url(#mask0_300_1454)">
                                                        <path d="M15.3 16.7L16.7 15.3L13 11.6V7H11V12.4L15.3 16.7ZM12 22C10.6167 22 9.31667 21.7375 8.1 21.2125C6.88333 20.6875 5.825 19.975 4.925 19.075C4.025 18.175 3.3125 17.1167 2.7875 15.9C2.2625 14.6833 2 13.3833 2 12C2 10.6167 2.2625 9.31667 2.7875 8.1C3.3125 6.88333 4.025 5.825 4.925 4.925C5.825 4.025 6.88333 3.3125 8.1 2.7875C9.31667 2.2625 10.6167 2 12 2C13.3833 2 14.6833 2.2625 15.9 2.7875C17.1167 3.3125 18.175 4.025 19.075 4.925C19.975 5.825 20.6875 6.88333 21.2125 8.1C21.7375 9.31667 22 10.6167 22 12C22 13.3833 21.7375 14.6833 21.2125 15.9C20.6875 17.1167 19.975 18.175 19.075 19.075C18.175 19.975 17.1167 20.6875 15.9 21.2125C14.6833 21.7375 13.3833 22 12 22ZM12 20C14.2167 20 16.1042 19.2208 17.6625 17.6625C19.2208 16.1042 20 14.2167 20 12C20 9.78333 19.2208 7.89583 17.6625 6.3375C16.1042 4.77917 14.2167 4 12 4C9.78333 4 7.89583 4.77917 6.3375 6.3375C4.77917 7.89583 4 9.78333 4 12C4 14.2167 4.77917 16.1042 6.3375 17.6625C7.89583 19.2208 9.78333 20 12 20Z" fill="#296088" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <div class="flex-grow-1">
                                                <span class="text-black w-100 fs-6">
                                                    RFQ’s Pending
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-column d-flex w-50">
                                            <div class="d-flex align-items-center justify-content-between pe-3">
                                                <span class="text-black fw-semibold"></span>
                                                <span class="px-2 text-black ms-3 rounded-2 fs-1">{{ $pendings->count() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-stack justify-content-between">
                                        <div class="d-flex align-items-center me-3 w-50 rounded-3">
                                            <span class="p-3 rounded-3 me-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <mask id="mask0_300_1461" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                                        <rect width="24" height="24" fill="#D9D9D9" />
                                                    </mask>
                                                    <g mask="url(#mask0_300_1461)">
                                                        <path d="M6 23H3C2.45 23 1.97917 22.8042 1.5875 22.4125C1.19583 22.0208 1 21.55 1 21V18H3V21H6V23ZM18 23V21H21V18H23V21C23 21.55 22.8042 22.0208 22.4125 22.4125C22.0208 22.8042 21.55 23 21 23H18ZM12 18.5C10 18.5 8.1875 17.9083 6.5625 16.725C4.9375 15.5417 3.75 13.9667 3 12C3.75 10.0333 4.9375 8.45833 6.5625 7.275C8.1875 6.09167 10 5.5 12 5.5C14 5.5 15.8125 6.09167 17.4375 7.275C19.0625 8.45833 20.25 10.0333 21 12C20.25 13.9667 19.0625 15.5417 17.4375 16.725C15.8125 17.9083 14 18.5 12 18.5ZM12 16.5C13.4667 16.5 14.8083 16.1 16.025 15.3C17.2417 14.5 18.175 13.4 18.825 12C18.175 10.6 17.2417 9.5 16.025 8.7C14.8083 7.9 13.4667 7.5 12 7.5C10.5333 7.5 9.19167 7.9 7.975 8.7C6.75833 9.5 5.825 10.6 5.175 12C5.825 13.4 6.75833 14.5 7.975 15.3C9.19167 16.1 10.5333 16.5 12 16.5ZM12 15.5C12.9667 15.5 13.7917 15.1583 14.475 14.475C15.1583 13.7917 15.5 12.9667 15.5 12C15.5 11.0333 15.1583 10.2083 14.475 9.525C13.7917 8.84167 12.9667 8.5 12 8.5C11.0333 8.5 10.2083 8.84167 9.525 9.525C8.84167 10.2083 8.5 11.0333 8.5 12C8.5 12.9667 8.84167 13.7917 9.525 14.475C10.2083 15.1583 11.0333 15.5 12 15.5ZM12 13.5C11.5833 13.5 11.2292 13.3542 10.9375 13.0625C10.6458 12.7708 10.5 12.4167 10.5 12C10.5 11.5833 10.6458 11.2292 10.9375 10.9375C11.2292 10.6458 11.5833 10.5 12 10.5C12.4167 10.5 12.7708 10.6458 13.0625 10.9375C13.3542 11.2292 13.5 11.5833 13.5 12C13.5 12.4167 13.3542 12.7708 13.0625 13.0625C12.7708 13.3542 12.4167 13.5 12 13.5ZM1 6V3C1 2.45 1.19583 1.97917 1.5875 1.5875C1.97917 1.19583 2.45 1 3 1H6V3H3V6H1ZM21 6V3H18V1H21C21.55 1 22.0208 1.19583 22.4125 1.5875C22.8042 1.97917 23 2.45 23 3V6H21Z" fill="#296088" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <div class="flex-grow-1">
                                                <span class="text-black w-100 fs-6">
                                                    {{-- RFQ’s Follow-up --}}
                                                    Quoted RFQs
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-column d-flex w-50">
                                            <div class="d-flex align-items-center justify-content-between pe-3">
                                                <span class="text-black fw-semibold"></span>
                                                <span class="px-2 text-black ms-3 rounded-2 fs-1 ">{{ $quoteds->count() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="mt-5 row">
            <div class="col-xl-4 ps-0">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="px-12 pt-8 card-header">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold main_text_color">Sales Overview</span>
                            </h3>
                        </div>
                    </div>
                    <div class="px-8 card-header align-items-center">
                        <div>
                            <ul class="border-0 nav nav-tabs nav-line-tabs fs-6 align-items-center">
                                <li class="nav-item">
                                    <a class="bg-transparent border-0 nav-link active" style="border: 0; color: #296088 !important;" data-bs-toggle="tab" href="#currentMonthSales">Current Month</a>
                                </li>
                                <li>|</li>
                                <li class="nav-item">
                                    <a class="bg-transparent border-0 nav-link text-muted" style="border-top: 0; border-right: 0; border-left: 0;" data-bs-toggle="tab" href="#quarter">Quarter</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <span class="pe-4">
                                <a class="fs-6" style="color: #296088;" href="{{ route('admin.sales.forecast') }}">Sales Forecast</a>
                                <span>|</span>
                                <a class="fs-6 text-muted" href="{{ route('admin.sales.report') }}">Report</a>
                            </span>
                        </div>
                    </div>
                    <div class="pt-5 card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="currentMonthSales" role="tabpanel">
                                <div class="border table-responsive rounded-4">
                                    <table class="table my-0 align-middle table-row-dashed table-borderd gs-0 gy-3">
                                        <thead class="bg-light">
                                            <tr class="text-gray-500 fs-7 fw-bold">
                                                <th class="text-start ps-4">Sl</th>
                                                <th class="text-start">Date</th>
                                                <th class="text-center ps-4">
                                                    Company
                                                </th>
                                                <th class="text-center">Amount</th>
                                                <th class="text-end pe-4">Share</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="ps-4">
                                                    1
                                                </td>
                                                <td>
                                                    1 Jan 2025
                                                </td>
                                                <td class="text-center">
                                                    NGen It/span>
                                                </td>
                                                <td class="text-center">
                                                    $32,400
                                                </td>
                                                <td class="text-end pe-4">
                                                    <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.25 14.334V5.665C19.25 2.645 17.111 0.75 14.084 0.75H5.916C2.889 0.75 0.75 2.635 0.75 5.665L0.75 14.334C0.75 17.364 2.889 19.25 5.916 19.25H14.084C17.111 19.25 19.25 17.364 19.25 14.334Z" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M14.0859 10H5.91394" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M10.3223 6.25205L14.0863 10L10.3223 13.748" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-4">
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        2</span>
                                                </td>
                                                <td>
                                                    1 Jan 2025
                                                </td>
                                                <td class="text-center">
                                                    NGen It/span>
                                                </td>
                                                <td class="text-center">
                                                    $32,400
                                                </td>
                                                <td class="text-end pe-4">
                                                    <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.25 14.334V5.665C19.25 2.645 17.111 0.75 14.084 0.75H5.916C2.889 0.75 0.75 2.635 0.75 5.665L0.75 14.334C0.75 17.364 2.889 19.25 5.916 19.25H14.084C17.111 19.25 19.25 17.364 19.25 14.334Z" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M14.0859 10H5.91394" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M10.3223 6.25205L14.0863 10L10.3223 13.748" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-4">
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        3</span>
                                                </td>
                                                <td>
                                                    1 Jan 2025
                                                </td>
                                                <td class="text-center">
                                                    NGen It/span>
                                                </td>
                                                <td class="text-center">
                                                    $32,400
                                                </td>
                                                <td class="text-end pe-4">
                                                    <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.25 14.334V5.665C19.25 2.645 17.111 0.75 14.084 0.75H5.916C2.889 0.75 0.75 2.635 0.75 5.665L0.75 14.334C0.75 17.364 2.889 19.25 5.916 19.25H14.084C17.111 19.25 19.25 17.364 19.25 14.334Z" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M14.0859 10H5.91394" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M10.3223 6.25205L14.0863 10L10.3223 13.748" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-4">
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        3</span>
                                                </td>
                                                <td>
                                                    1 Jan 2025
                                                </td>
                                                <td class="text-center">
                                                    NGen It/span>
                                                </td>
                                                <td class="text-center">
                                                    $32,400
                                                </td>
                                                <td class="text-end pe-4">
                                                    <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.25 14.334V5.665C19.25 2.645 17.111 0.75 14.084 0.75H5.916C2.889 0.75 0.75 2.635 0.75 5.665L0.75 14.334C0.75 17.364 2.889 19.25 5.916 19.25H14.084C17.111 19.25 19.25 17.364 19.25 14.334Z" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M14.0859 10H5.91394" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M10.3223 6.25205L14.0863 10L10.3223 13.748" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="quarter" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table my-0 align-middle table-row-dashed table-borderd gs-0 gy-3">
                                        <thead>
                                            <tr class="text-gray-500 fs-7 fw-bold">
                                                <th class="p-0 pb-3 text-start">Sl</th>
                                                <th class="p-0 pb-3 text-start">Date</th>
                                                <th class="p-0 pb-3 text-center ps-4">
                                                    Company
                                                </th>
                                                <th class="p-0 pb-3 text-center">Amount</th>
                                                <th class="p-0 pb-3 text-end">Share</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        1</span>
                                                </td>
                                                <td>
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        1 Jan 2025</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="">NGen It</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-gray-600 fw-bold fs-6">$32,400</span>
                                                </td>

                                                <td class="text-end">
                                                    <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-share ps-2" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        2</span>
                                                </td>
                                                <td>
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        1 Jan 2025</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="">NGen It</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-gray-600 fw-bold fs-6">$32,400</span>
                                                </td>

                                                <td class="text-end">
                                                    <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-share ps-2" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        3</span>
                                                </td>
                                                <td>
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        1 Jan 2025</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="">NGen It</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-gray-600 fw-bold fs-6">$32,400</span>
                                                </td>

                                                <td class="text-end">
                                                    <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-share ps-2" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        4</span>
                                                </td>
                                                <td>
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        1 Jan 2025</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="">NGen It</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-gray-600 fw-bold fs-6">$32,400</span>
                                                </td>

                                                <td class="text-end">
                                                    <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-share ps-2" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        5</span>
                                                </td>
                                                <td>
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        1 Jan 2025</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="">NGen It</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-gray-600 fw-bold fs-6">$32,400</span>
                                                </td>

                                                <td class="text-end">
                                                    <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-share ps-2" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        6</span>
                                                </td>
                                                <td>
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        1 Jan 2025</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="">NGen It</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-gray-600 fw-bold fs-6">$32,400</span>
                                                </td>

                                                <td class="text-end">
                                                    <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-share ps-2" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        7</span>
                                                </td>
                                                <td>
                                                    <span class="text-gray-600 fw-bold fs-6">
                                                        1 Jan 2025</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="">NGen It</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-gray-600 fw-bold fs-6">$32,400</span>
                                                </td>

                                                <td class="text-end">
                                                    <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-share ps-2" aria-hidden="true"></i>
                                                    </a>
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
            <div class="col-xl-4">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="px-12 pt-8 card-header">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold main_text_color">Sales By Country</span>
                            </h3>
                        </div>
                    </div>

                    <div class="py-10 card-body">
                        <div class="h-250px d-flex justify-content-center align-items-center">
                            <img class="img-fluid" src="{{ asset('/images/sales-chart.png') }}" class="bottom-0 position-absolute me-3 end-0 h-200px" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="card-body d-flex justify-content-between flex-column">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold main_text_color">Sales By Product</span>
                                </h3>
                            </div>
                            <div class="d-flex">
                                <div class="border-gray-300 border-end-dashed border-end pe-xxl-7 me-xxl-5">
                                    <div class="mb-2 d-flex">
                                        <span class="text-gray-500 fs-4 fw-semibold me-1">$</span>
                                        <span class="text-gray-800 fw-bold" style="font-size: 20px;">8,035</span>
                                    </div>
                                    <span class="text-gray-500 fs-6 fw-semibold">Software</span>
                                </div>

                                <div class="m-0">
                                    <div class="mb-2 d-flex align-items-center">
                                        <span class="text-gray-500 fs-4 fw-semibold align-self-start me-1">$</span>
                                        <span class="text-gray-800 fw-bold" style="font-size: 20px;">4,684</span>
                                    </div>

                                    <span class="text-gray-500 fs-6 fw-semibold">Hardware</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-10 card-body">
                        <div class="h-200px d-flex justify-content-center align-items-center">
                            <img class="img-fluid" src="{{ asset('/images/rounde-chart.png') }}" class="bottom-0 position-absolute me-3 end-0 h-200px" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 row">
            <div class="col-xl-6 ps-0">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="card-body d-flex justify-content-between flex-column">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div>
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold main_text_color">Forecast</span>
                                </h3>
                                <p>All Forecast List</p>
                                </h3>
                            </div>
                            <div>
                                <select
                                    name="timezone"
                                    aria-label="Select Month"
                                    data-control="select2"
                                    data-placeholder="date_period"
                                    class="form-select form-select-sm form-select-solid">
                                    <option value="next">Within the next</option>
                                    <option value="last">Within the last</option>
                                    <option value="between">Between</option>
                                    <option value="on">On</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-black">
                            <a href="#" class="optional-color">Closed</a><span class="mx-1">|</span><a href="" class="text-black">Quoted</a><span class="mx-1">|</span><a href="" class="text-black">Potential</a><span class="mx-1">|</span><a href="" class="text-black">Lost</a>
                        </div>
                    </div>
                    <div class="py-10 pt-0 card-body">
                        <div class="border table-responsive rounded-4">
                            <table class="table my-0 align-middle table-row-dashed table-borderd gs-0 gy-3">
                                <thead class="bg-light">
                                    <tr class="text-gray-500 fs-7 fw-bold">
                                        <th class="text-start ps-4">Sl</th>
                                        <th class="text-start">RFQ No.</th>
                                        <th class="text-center ps-4">
                                            Company
                                        </th>
                                        <th class="text-center">RFQ Item</th>
                                        <th class="text-center">Time</th>
                                        <th class="text-end pe-4">Share</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="ps-4">
                                            1
                                        </td>
                                        <td>
                                            #rfq-8374
                                        </td>
                                        <td class="text-center">
                                            Samsung
                                        </td>
                                        <td class="text-center">
                                            This is the RFQ item
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="" class="text-black">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12.3857C11.2294 12.3857 13.186 11.8432 13.375 9.66538C13.375 7.4891 12.0109 7.62904 12.0109 4.95883C12.0109 2.87311 10.0339 0.5 7 0.5C3.96608 0.5 1.98914 2.87311 1.98914 4.95883C1.98914 7.62904 0.625 7.4891 0.625 9.66538C0.814714 11.8514 2.77133 12.3857 7 12.3857Z" stroke="#130F26" stroke-width="0.65625" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.79153 14.6431C7.76842 15.7791 6.17242 15.7926 5.13953 14.6431" stroke="#130F26" stroke-width="0.65625" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                2 Days Pending
                                            </a>
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.25 14.334V5.665C19.25 2.645 17.111 0.75 14.084 0.75H5.916C2.889 0.75 0.75 2.635 0.75 5.665L0.75 14.334C0.75 17.364 2.889 19.25 5.916 19.25H14.084C17.111 19.25 19.25 17.364 19.25 14.334Z" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14.0859 10H5.91394" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10.3223 6.25205L14.0863 10L10.3223 13.748" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4">
                                            1
                                        </td>
                                        <td>
                                            #rfq-8374
                                        </td>
                                        <td class="text-center">
                                            Samsung
                                        </td>
                                        <td class="text-center">
                                            This is the RFQ item
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="" class="text-black">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12.3857C11.2294 12.3857 13.186 11.8432 13.375 9.66538C13.375 7.4891 12.0109 7.62904 12.0109 4.95883C12.0109 2.87311 10.0339 0.5 7 0.5C3.96608 0.5 1.98914 2.87311 1.98914 4.95883C1.98914 7.62904 0.625 7.4891 0.625 9.66538C0.814714 11.8514 2.77133 12.3857 7 12.3857Z" stroke="#130F26" stroke-width="0.65625" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.79153 14.6431C7.76842 15.7791 6.17242 15.7926 5.13953 14.6431" stroke="#130F26" stroke-width="0.65625" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                2 Days Pending
                                            </a>
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.25 14.334V5.665C19.25 2.645 17.111 0.75 14.084 0.75H5.916C2.889 0.75 0.75 2.635 0.75 5.665L0.75 14.334C0.75 17.364 2.889 19.25 5.916 19.25H14.084C17.111 19.25 19.25 17.364 19.25 14.334Z" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14.0859 10H5.91394" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10.3223 6.25205L14.0863 10L10.3223 13.748" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4">
                                            1
                                        </td>
                                        <td>
                                            #rfq-8374
                                        </td>
                                        <td class="text-center">
                                            Samsung
                                        </td>
                                        <td class="text-center">
                                            This is the RFQ item
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="" class="text-black">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12.3857C11.2294 12.3857 13.186 11.8432 13.375 9.66538C13.375 7.4891 12.0109 7.62904 12.0109 4.95883C12.0109 2.87311 10.0339 0.5 7 0.5C3.96608 0.5 1.98914 2.87311 1.98914 4.95883C1.98914 7.62904 0.625 7.4891 0.625 9.66538C0.814714 11.8514 2.77133 12.3857 7 12.3857Z" stroke="#130F26" stroke-width="0.65625" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.79153 14.6431C7.76842 15.7791 6.17242 15.7926 5.13953 14.6431" stroke="#130F26" stroke-width="0.65625" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                2 Days Pending
                                            </a>
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.25 14.334V5.665C19.25 2.645 17.111 0.75 14.084 0.75H5.916C2.889 0.75 0.75 2.635 0.75 5.665L0.75 14.334C0.75 17.364 2.889 19.25 5.916 19.25H14.084C17.111 19.25 19.25 17.364 19.25 14.334Z" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14.0859 10H5.91394" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10.3223 6.25205L14.0863 10L10.3223 13.748" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4">
                                            1
                                        </td>
                                        <td>
                                            #rfq-8374
                                        </td>
                                        <td class="text-center">
                                            Samsung
                                        </td>
                                        <td class="text-center">
                                            This is the RFQ item
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="" class="text-black">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12.3857C11.2294 12.3857 13.186 11.8432 13.375 9.66538C13.375 7.4891 12.0109 7.62904 12.0109 4.95883C12.0109 2.87311 10.0339 0.5 7 0.5C3.96608 0.5 1.98914 2.87311 1.98914 4.95883C1.98914 7.62904 0.625 7.4891 0.625 9.66538C0.814714 11.8514 2.77133 12.3857 7 12.3857Z" stroke="#130F26" stroke-width="0.65625" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.79153 14.6431C7.76842 15.7791 6.17242 15.7926 5.13953 14.6431" stroke="#130F26" stroke-width="0.65625" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                2 Days Pending
                                            </a>
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.25 14.334V5.665C19.25 2.645 17.111 0.75 14.084 0.75H5.916C2.889 0.75 0.75 2.635 0.75 5.665L0.75 14.334C0.75 17.364 2.889 19.25 5.916 19.25H14.084C17.111 19.25 19.25 17.364 19.25 14.334Z" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14.0859 10H5.91394" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10.3223 6.25205L14.0863 10L10.3223 13.748" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="card-body d-flex justify-content-between flex-column">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div>
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold main_text_color">Upcoming Opportunity</span>
                                </h3>
                            </div>
                            <div>
                                <a href="#" class="optional-color">Software</a>
                                <span class="mx-1">|</span>
                                <a href="" class="text-black">Hardware</a>
                            </div>
                        </div>
                    </div>
                    <div class="py-10 pt-0 mt-15 card-body">
                        <div class="border table-responsive rounded-4">
                            <table class="table my-0 align-middle table-row-dashed table-borderd gs-0 gy-3">
                                <thead class="bg-light">
                                    <tr class="text-gray-500 fs-7 fw-bold">
                                        <th class="text-start ps-4">Sl</th>
                                        <th class="text-start">RFQ No.</th>
                                        <th class="text-center ps-4">
                                            Company
                                        </th>
                                        <th class="text-center">RFQ Item</th>
                                        <th class="text-center">Time</th>
                                        <th class="text-end pe-4">Share</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="ps-4">
                                            1
                                        </td>
                                        <td>
                                            #rfq-8374
                                        </td>
                                        <td class="text-center">
                                            Samsung
                                        </td>
                                        <td class="text-center">
                                            This is the RFQ item
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="" class="text-black">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12.3857C11.2294 12.3857 13.186 11.8432 13.375 9.66538C13.375 7.4891 12.0109 7.62904 12.0109 4.95883C12.0109 2.87311 10.0339 0.5 7 0.5C3.96608 0.5 1.98914 2.87311 1.98914 4.95883C1.98914 7.62904 0.625 7.4891 0.625 9.66538C0.814714 11.8514 2.77133 12.3857 7 12.3857Z" stroke="#130F26" stroke-width="0.65625" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.79153 14.6431C7.76842 15.7791 6.17242 15.7926 5.13953 14.6431" stroke="#130F26" stroke-width="0.65625" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                2 Days Pending
                                            </a>
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.25 14.334V5.665C19.25 2.645 17.111 0.75 14.084 0.75H5.916C2.889 0.75 0.75 2.635 0.75 5.665L0.75 14.334C0.75 17.364 2.889 19.25 5.916 19.25H14.084C17.111 19.25 19.25 17.364 19.25 14.334Z" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14.0859 10H5.91394" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10.3223 6.25205L14.0863 10L10.3223 13.748" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4">
                                            1
                                        </td>
                                        <td>
                                            #rfq-8374
                                        </td>
                                        <td class="text-center">
                                            Samsung
                                        </td>
                                        <td class="text-center">
                                            This is the RFQ item
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="" class="text-black">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12.3857C11.2294 12.3857 13.186 11.8432 13.375 9.66538C13.375 7.4891 12.0109 7.62904 12.0109 4.95883C12.0109 2.87311 10.0339 0.5 7 0.5C3.96608 0.5 1.98914 2.87311 1.98914 4.95883C1.98914 7.62904 0.625 7.4891 0.625 9.66538C0.814714 11.8514 2.77133 12.3857 7 12.3857Z" stroke="#130F26" stroke-width="0.65625" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.79153 14.6431C7.76842 15.7791 6.17242 15.7926 5.13953 14.6431" stroke="#130F26" stroke-width="0.65625" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                2 Days Pending
                                            </a>
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.25 14.334V5.665C19.25 2.645 17.111 0.75 14.084 0.75H5.916C2.889 0.75 0.75 2.635 0.75 5.665L0.75 14.334C0.75 17.364 2.889 19.25 5.916 19.25H14.084C17.111 19.25 19.25 17.364 19.25 14.334Z" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14.0859 10H5.91394" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10.3223 6.25205L14.0863 10L10.3223 13.748" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4">
                                            1
                                        </td>
                                        <td>
                                            #rfq-8374
                                        </td>
                                        <td class="text-center">
                                            Samsung
                                        </td>
                                        <td class="text-center">
                                            This is the RFQ item
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12.3857C11.2294 12.3857 13.186 11.8432 13.375 9.66538C13.375 7.4891 12.0109 7.62904 12.0109 4.95883C12.0109 2.87311 10.0339 0.5 7 0.5C3.96608 0.5 1.98914 2.87311 1.98914 4.95883C1.98914 7.62904 0.625 7.4891 0.625 9.66538C0.814714 11.8514 2.77133 12.3857 7 12.3857Z" stroke="#130F26" stroke-width="0.65625" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.79153 14.6431C7.76842 15.7791 6.17242 15.7926 5.13953 14.6431" stroke="#130F26" stroke-width="0.65625" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                2 Days Pending
                                            </a>
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.25 14.334V5.665C19.25 2.645 17.111 0.75 14.084 0.75H5.916C2.889 0.75 0.75 2.635 0.75 5.665L0.75 14.334C0.75 17.364 2.889 19.25 5.916 19.25H14.084C17.111 19.25 19.25 17.364 19.25 14.334Z" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14.0859 10H5.91394" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10.3223 6.25205L14.0863 10L10.3223 13.748" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4">
                                            1
                                        </td>
                                        <td>
                                            #rfq-8374
                                        </td>
                                        <td class="text-center">
                                            Samsung
                                        </td>
                                        <td class="text-center">
                                            This is the RFQ item
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="" class="text-black">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12.3857C11.2294 12.3857 13.186 11.8432 13.375 9.66538C13.375 7.4891 12.0109 7.62904 12.0109 4.95883C12.0109 2.87311 10.0339 0.5 7 0.5C3.96608 0.5 1.98914 2.87311 1.98914 4.95883C1.98914 7.62904 0.625 7.4891 0.625 9.66538C0.814714 11.8514 2.77133 12.3857 7 12.3857Z" stroke="#130F26" stroke-width="0.65625" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.79153 14.6431C7.76842 15.7791 6.17242 15.7926 5.13953 14.6431" stroke="#130F26" stroke-width="0.65625" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                2 Days Pending
                                            </a>
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="" class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.25 14.334V5.665C19.25 2.645 17.111 0.75 14.084 0.75H5.916C2.889 0.75 0.75 2.635 0.75 5.665L0.75 14.334C0.75 17.364 2.889 19.25 5.916 19.25H14.084C17.111 19.25 19.25 17.364 19.25 14.334Z" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14.0859 10H5.91394" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10.3223 6.25205L14.0863 10L10.3223 13.748" stroke="#A1A1A1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
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
    @push('scripts')
    @endpush
</x-admin-app-layout>
