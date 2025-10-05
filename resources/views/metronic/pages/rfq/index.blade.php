<x-admin-app-layout :title="'RFQ Dashboard'">
    <div class="py-10 container-fluid">
        <div class="mb-10 row">
            <div class="col-xl-3">
                <div class="shadow-none card card-flush">
                    <div class="p-2 card-body">
                        <div class="d-flex flex-stack justify-content-between">
                            <div class="p-8 d-flex align-items-center me-3 w-50 rounded-3">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="27" viewBox="0 0 30 27" fill="none">
                                        <path d="M0.666504 21.3333V17.6C0.666504 16.8444 0.860948 16.15 1.24984 15.5167C1.63873 14.8833 2.15539 14.4 2.79984 14.0667C4.17762 13.3778 5.57762 12.8611 6.99984 12.5167C8.42206 12.1722 9.8665 12 11.3332 12C12.3332 12 13.3221 12.0778 14.2998 12.2333C15.2776 12.3889 16.2554 12.6333 17.2332 12.9667C16.8554 13.2778 16.5109 13.6167 16.1998 13.9833C15.8887 14.35 15.6109 14.7444 15.3665 15.1667C14.6998 14.9889 14.0332 14.8611 13.3665 14.7833C12.6998 14.7056 12.0221 14.6667 11.3332 14.6667C10.0887 14.6667 8.85539 14.8167 7.63317 15.1167C6.41095 15.4167 5.19984 15.8667 3.99984 16.4667C3.79984 16.5778 3.63873 16.7333 3.5165 16.9333C3.39428 17.1333 3.33317 17.3556 3.33317 17.6V18.6667H14.0998C14.0554 19.1111 14.0332 19.5556 14.0332 20C14.0332 20.4444 14.0554 20.8889 14.0998 21.3333H0.666504ZM11.3332 10.6667C9.8665 10.6667 8.61095 10.1444 7.5665 9.1C6.52206 8.05556 5.99984 6.8 5.99984 5.33333C5.99984 3.86667 6.52206 2.61111 7.5665 1.56667C8.61095 0.522222 9.8665 0 11.3332 0C12.7998 0 14.0554 0.522222 15.0998 1.56667C16.1443 2.61111 16.6665 3.86667 16.6665 5.33333C16.6665 6.8 16.1443 8.05556 15.0998 9.1C14.0554 10.1444 12.7998 10.6667 11.3332 10.6667ZM11.3332 8C12.0665 8 12.6943 7.73889 13.2165 7.21667C13.7387 6.69444 13.9998 6.06667 13.9998 5.33333C13.9998 4.6 13.7387 3.97222 13.2165 3.45C12.6943 2.92778 12.0665 2.66667 11.3332 2.66667C10.5998 2.66667 9.97206 2.92778 9.44984 3.45C8.92762 3.97222 8.6665 4.6 8.6665 5.33333C8.6665 6.06667 8.92762 6.69444 9.44984 7.21667C9.97206 7.73889 10.5998 8 11.3332 8ZM24.6665 5.33333C24.6665 6.8 24.1443 8.05556 23.0998 9.1C22.0554 10.1444 20.7998 10.6667 19.3332 10.6667C19.0887 10.6667 18.7776 10.6389 18.3998 10.5833C18.0221 10.5278 17.7109 10.4667 17.4665 10.4C18.0665 9.68889 18.5276 8.9 18.8498 8.03333C19.1721 7.16667 19.3332 6.26667 19.3332 5.33333C19.3332 4.4 19.1721 3.5 18.8498 2.63333C18.5276 1.76667 18.0665 0.977778 17.4665 0.266667C17.7776 0.155556 18.0887 0.0833333 18.3998 0.05C18.7109 0.0166667 19.0221 0 19.3332 0C20.7998 0 22.0554 0.522222 23.0998 1.56667C24.1443 2.61111 24.6665 3.86667 24.6665 5.33333ZM23.3332 26.6667C21.4887 26.6667 19.9165 26.0167 18.6165 24.7167C17.3165 23.4167 16.6665 21.8444 16.6665 20C16.6665 18.1333 17.3165 16.5556 18.6165 15.2667C19.9165 13.9778 21.4887 13.3333 23.3332 13.3333C25.1998 13.3333 26.7776 13.9778 28.0665 15.2667C29.3554 16.5556 29.9998 18.1333 29.9998 20C29.9998 21.8444 29.3554 23.4167 28.0665 24.7167C26.7776 26.0167 25.1998 26.6667 23.3332 26.6667ZM22.3998 23L27.0998 18.2667L26.1665 17.3333L22.3998 21.1L20.4998 19.2L19.5665 20.1667L22.3998 23Z" fill="#296088" />
                                    </svg>
                                </a>
                                <div class="flex-grow-1"><a href="">
                                    </a><a href="#" class="text-gray-800 fs-5 fw-bold lh-0">Client
                                        <span class="pt-4 text-gray-500 fw-semibold d-block fs-6">All List</span>
                                    </a>
                                </div>

                            </div>

                            <div class="flex-column d-flex w-50 me-3">
                                <div class="px-3 py-3 mb-2 d-flex align-items-center justify-content-between rounded-2 bg-light">
                                    <span class="text-gray-500 fw-semibold">
                                        New</span>
                                    <span class="px-2 fw-semibold ms-3 text-primary rounded-2">
                                        150
                                    </span>
                                </div>
                                <div class="px-3 py-3 pt-2 d-flex align-items-center justify-content-between rounded-2 bg-light">
                                    <span class="text-gray-500 fw-semibold">
                                        Followup</span>
                                    <span class="px-2 fw-semibold ms-3 text-primary rounded-2">
                                        300
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="shadow-sm card card-flush">
                    <div class="p-0 card-body">
                        <div class="d-flex flex-stack justify-content-between">
                            <div class="p-8 d-flex align-items-center me-3 w-50 rounded-3">
                                <a href="">
                                    <span class="p-3 bg-light-primary rounded-3 me-3"><i class="fa-solid text-primary fa-bullseye fs-3" aria-hidden="true"></i></span>
                                </a>
                                <div class="flex-grow-1"><a href="">
                                    </a><a href="#" class="text-gray-800 fs-5 fw-bold lh-0">Followup
                                        <span class="pt-4 text-gray-500 fw-semibold d-block fs-6">All List</span>
                                    </a>
                                </div>

                            </div>

                            <div class="flex-column d-flex w-50">
                                <div class="d-flex align-items-center justify-content-between pe-3">
                                    <span class="text-gray-500 fw-semibold">
                                        Calls</span>
                                    <span class="px-2 fw-semibold ms-3 text-primary rounded-2">
                                        150
                                    </span>
                                </div>
                                <div class="pt-2 d-flex align-items-center justify-content-between pe-3">
                                    <span class="text-gray-500 fw-semibold">
                                        Visits</span>
                                    <span class="px-2 fw-semibold ms-3 text-primary rounded-2">
                                        300
                                    </span>
                                </div>
                                <div class="pt-2 d-flex align-items-center justify-content-between pe-3">
                                    <span class="text-gray-500 fw-semibold">
                                        Email</span>
                                    <span class="px-2 fw-semibold ms-3 text-primary rounded-2">
                                        300
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="shadow-sm card card-flush">
                    <div class="p-0 card-body">
                        <div class="d-flex flex-stack justify-content-between">
                            <div class="p-8 d-flex align-items-center me-3 w-50 rounded-3">
                                <a href="">
                                    <span class="p-3 bg-light-primary rounded-3 me-3"><i class="fa-solid text-primary fa-bullseye fs-3" aria-hidden="true"></i></span>
                                </a>
                                <div class="flex-grow-1"><a href="">
                                    </a><a href="#" class="text-gray-800 fs-5 fw-bold lh-0">Tender
                                        <span class="pt-4 text-gray-500 fw-semibold d-block fs-6">All List</span>
                                    </a>
                                </div>

                            </div>

                            <div class="flex-column d-flex w-50">
                                <div class="d-flex align-items-center justify-content-between pe-3">
                                    <span class="text-gray-500 fw-semibold">
                                        New Potential</span>
                                    <span class="px-2 fw-semibold ms-3 text-primary rounded-2">
                                        150
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between pe-3">
                                    <span class="text-gray-500 fw-semibold">
                                        Upcoming</span>
                                    <span class="px-2 fw-semibold ms-3 text-primary rounded-2">
                                        150
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="shadow-sm card card-flush">
                    <div class="p-0 card-body">
                        <div class="d-flex flex-stack justify-content-between">
                            <div class="p-8 d-flex align-items-center me-3 w-50 rounded-3">
                                <a href="">
                                    <span class="p-3 bg-light-primary rounded-3 me-3"><i class="fa-solid text-primary fa-bullseye fs-3" aria-hidden="true"></i></span>
                                </a>
                                <div class="flex-grow-1"><a href="">
                                    </a><a href="#" class="text-gray-800 fs-5 fw-bold lh-0">ToR Works
                                        <span class="pt-4 text-gray-500 fw-semibold d-block fs-6">All List</span>
                                    </a>
                                </div>

                            </div>

                            <div class="flex-column d-flex w-50">
                                <div class="d-flex align-items-center justify-content-between pe-3">
                                    <span class="text-gray-500 fw-semibold">
                                        On Going</span>
                                    <span class="px-2 fw-semibold ms-3 text-primary rounded-2">
                                        150
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-10 row gx-5 gx-xl-10">
            <div class="col-xl-8">
                <div class="shadow-sm card card-flush h-xl-100">
                    <div class="pt-5 card-header">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold main_text_color">MARKETING ACTIVITIES</span>

                            <span class="mt-1 text-gray-500 fw-semibold fs-6">All the section Of target</span>
                        </h3>

                        <div class="card-toolbar">
                            <select class="form-select form-select-sm select2-hidden-accessible" data-control="select2" data-placeholder="Choose Country" data-select2-id="select2-data-7-vyel" tabindex="-1" aria-hidden="true">
                                <option data-select2-id="select2-data-9-tjil"></option>
                                <option value="1">Bangladesh</option>
                                <option value="2">Singapore</option>
                                <option value="2">Europe</option>
                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-4qax" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-twp6-container" aria-controls="select2-twp6-container"><span class="select2-selection__rendered" id="select2-twp6-container" role="textbox" aria-readonly="true" title="Choose Country"><span class="select2-selection__placeholder">Choose Country</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                    </div>

                    <div class="pt-6 card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <ul class="mb-3 nav nav-pills nav-pills-custom" role="tablist">
                                    <li class="mb-3 nav-item me-2 me-lg-2" role="presentation">
                                        <a class="pt-3 pb-2 overflow-hidden nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary align-items-center rounded-0 active" id="kt_stats_widget_16_tab_link_1" data-bs-toggle="pill" href="#kt_stats_widget_16_tab_1" aria-selected="true" role="tab">
                                            <div class="mb-1 nav-icon">
                                                <i class="fa-solid fa-arrow-right fs-6" aria-hidden="true"></i>
                                            </div>

                                            <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                                                DMAR
                                            </span>

                                            <span class="bottom-0 bullet-custom position-absolute w-100 h-4px bg-primary custom-tabs-bottom"></span>
                                        </a>
                                    </li>
                                    <li class="mb-3 nav-item me-2 me-lg-2" role="presentation">
                                        <a class="pt-3 pb-2 overflow-hidden nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary align-items-center rounded-0" id="kt_stats_widget_16_tab_link_2" data-bs-toggle="pill" href="#kt_stats_widget_16_tab_2" aria-selected="false" tabindex="-1" role="tab">
                                            <div class="mb-1 nav-icon">
                                                <i class="fa-solid fa-arrow-right fs-6" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                            </div>

                                            <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                                                EMAR
                                            </span>

                                            <span class="bottom-0 bullet-custom position-absolute w-100 h-4px bg-primary custom-tabs-bottom"></span>
                                        </a>
                                    </li>
                                    <li class="mb-3 nav-item me-2 me-lg-2" role="presentation">
                                        <a class="pt-3 pb-2 overflow-hidden nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary align-items-center rounded-0" id="kt_stats_widget_16_tab_link_3" data-bs-toggle="pill" href="#kt_stats_widget_16_tab_3" aria-selected="false" tabindex="-1" role="tab">
                                            <div class="mb-1 nav-icon">
                                                <i class="fa-solid fa-arrow-right fs-6" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                            </div>

                                            <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                                                CMAR
                                            </span>

                                            <span class="bottom-0 bullet-custom position-absolute w-100 h-4px bg-primary custom-tabs-bottom"></span>
                                        </a>
                                    </li>
                                    <li class="mb-3 nav-item me-2 me-lg-2" role="presentation">
                                        <a class="pt-3 pb-2 overflow-hidden nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary align-items-center rounded-0" id="kt_stats_widget_16_tab_link_4" data-bs-toggle="pill" href="#kt_stats_widget_16_tab_4" aria-selected="false" tabindex="-1" role="tab">
                                            <div class="mb-1 nav-icon">
                                                <i class="fa-solid fa-arrow-right fs-6" aria-hidden="true"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </div>

                                            <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                                                Tender
                                            </span>

                                            <span class="bottom-0 bullet-custom position-absolute w-100 h-4px bg-primary custom-tabs-bottom"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <a href=""><i class="fas fa-hand-point-right text-warning" aria-hidden="true"></i>
                                    Go to DMAR File</a>
                            </div>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1" role="tabpanel" aria-labelledby="kt_stats_widget_16_tab_link_1">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed table-striped gs-0 gy-4">
                                        <thead class="bg-light-info">
                                            <tr class="text-gray-500 border-0 fs-7 fw-bold">
                                                <th class="ps-2">SL</th>
                                                <th class="pe-0">Date</th>
                                                <th class="">Type of Activity</th>
                                                <th class="">Sales Person</th>
                                                <th class="">Company Name</th>
                                                <th class="">Product/Solution</th>
                                                <th class="">Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td class="ps-3">1</td>
                                                <td class="">
                                                    <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">22 March 2025</a>
                                                </td>

                                                <td class="pe-0">
                                                    <span class="text-gray-800 fw-bold fs-6 me-1">Activity</span>
                                                </td>

                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Faisal Iqbal</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">NGen It</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Produt 1</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Excelent</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-3">2</td>
                                                <td class="">
                                                    <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">22 March 2025</a>
                                                </td>

                                                <td class="pe-0">
                                                    <span class="text-gray-800 fw-bold fs-6 me-1">Activity</span>
                                                </td>

                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Faisal Iqbal</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">NGen It</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Produt 1</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Excelent</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-3">3</td>
                                                <td class="">
                                                    <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">22 March 2025</a>
                                                </td>

                                                <td class="pe-0">
                                                    <span class="text-gray-800 fw-bold fs-6 me-1">Activity</span>
                                                </td>

                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Faisal Iqbal</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">NGen It</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Produt 1</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Excelent</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="kt_stats_widget_16_tab_2" role="tabpanel" aria-labelledby="kt_stats_widget_16_tab_link_2">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed table-striped gs-0 gy-4">
                                        <thead class="bg-light-info">
                                            <tr class="text-gray-500 border-0 fs-7 fw-bold">
                                                <th class="ps-2">SL</th>
                                                <th class="pe-0">Date</th>
                                                <th class="">Email Type</th>
                                                <th class="">Sales Person</th>
                                                <th class="">Company Name</th>
                                                <th class="">Product/Solution</th>
                                                <th class="">Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td class="ps-3">1</td>
                                                <td class="">
                                                    <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">22 March 2025</a>
                                                </td>

                                                <td class="pe-0">
                                                    <span class="text-gray-800 fw-bold fs-6 me-1">Activity</span>
                                                </td>

                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Faisal Iqbal</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">NGen It</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Produt 1</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Excelent</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-3">2</td>
                                                <td class="">
                                                    <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">22 March 2025</a>
                                                </td>

                                                <td class="pe-0">
                                                    <span class="text-gray-800 fw-bold fs-6 me-1">Activity</span>
                                                </td>

                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Faisal Iqbal</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">NGen It</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Produt 1</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Excelent</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-3">3</td>
                                                <td class="">
                                                    <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">22 March 2025</a>
                                                </td>

                                                <td class="pe-0">
                                                    <span class="text-gray-800 fw-bold fs-6 me-1">Activity</span>
                                                </td>

                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Faisal Iqbal</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">NGen It</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Produt 1</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Excelent</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_stats_widget_16_tab_3" role="tabpanel" aria-labelledby="kt_stats_widget_16_tab_link_3">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed table-striped gs-0 gy-4">
                                        <thead class="bg-light-info">
                                            <tr class="text-gray-500 border-0 fs-7 fw-bold">
                                                <th class="ps-2">SL</th>
                                                <th class="pe-0">Date</th>
                                                <th class="">Campaign Type</th>
                                                <th class="">Sales Person</th>
                                                <th class="">Company Name</th>
                                                <th class="">Product/Solution</th>
                                                <th class="">Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td class="ps-3">1</td>
                                                <td class="">
                                                    <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">22 March 2025</a>
                                                </td>

                                                <td class="pe-0">
                                                    <span class="text-gray-800 fw-bold fs-6 me-1">Activity</span>
                                                </td>

                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Faisal Iqbal</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">NGen It</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Produt 1</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Excelent</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-3">2</td>
                                                <td class="">
                                                    <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">22 March 2025</a>
                                                </td>

                                                <td class="pe-0">
                                                    <span class="text-gray-800 fw-bold fs-6 me-1">Activity</span>
                                                </td>

                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Faisal Iqbal</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">NGen It</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Produt 1</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Excelent</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-3">3</td>
                                                <td class="">
                                                    <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">22 March 2025</a>
                                                </td>

                                                <td class="pe-0">
                                                    <span class="text-gray-800 fw-bold fs-6 me-1">Activity</span>
                                                </td>

                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Faisal Iqbal</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">NGen It</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Produt 1</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Excelent</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="kt_stats_widget_16_tab_4" role="tabpanel" aria-labelledby="kt_stats_widget_16_tab_link_4">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed table-striped gs-0 gy-4">
                                        <thead class="bg-light-info">
                                            <tr class="text-gray-500 border-0 fs-7 fw-bold">
                                                <th class="ps-2">SL</th>
                                                <th class="pe-0">Date</th>
                                                <th class="">Tender Type</th>
                                                <th class="">Sales Person</th>
                                                <th class="">Company Name</th>
                                                <th class="">Product/Solution</th>
                                                <th class="">Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td class="ps-3">1</td>
                                                <td class="">
                                                    <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">22 March 2025</a>
                                                </td>

                                                <td class="pe-0">
                                                    <span class="text-gray-800 fw-bold fs-6 me-1">Activity</span>
                                                </td>

                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Faisal Iqbal</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">NGen It</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Produt 1</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Excelent</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-3">2</td>
                                                <td class="">
                                                    <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">22 March 2025</a>
                                                </td>

                                                <td class="pe-0">
                                                    <span class="text-gray-800 fw-bold fs-6 me-1">Activity</span>
                                                </td>

                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Faisal Iqbal</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">NGen It</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Produt 1</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Excelent</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-3">3</td>
                                                <td class="">
                                                    <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">22 March 2025</a>
                                                </td>

                                                <td class="pe-0">
                                                    <span class="text-gray-800 fw-bold fs-6 me-1">Activity</span>
                                                </td>

                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Faisal Iqbal</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">NGen It</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Produt 1</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-gray-900 fw-bold fs-6 me-3">Excelent</span>
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
                <div class="shadow-sm card card-flush h-xl-100">
                    <div class="card-header pt-7 mb-7">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold main_text_color">Product Marketing</span>
                            <span class="mt-1 text-gray-500 fw-semibold fs-6">8k Product In Que</span>
                        </h3>
                        <div class="card-toolbar">
                            <div class="mt-3 d-flex justify-content-between align-items-center">
                                <div class="form-check form-check-custom form-check-solid form-check-sm me-3">
                                    <input class="form-check-input" type="radio" name="group2" value="BD" id="radioBD" checked="">
                                    <label class="form-check-label" for="radioBD">
                                        BD
                                    </label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid form-check-sm me-3">
                                    <input class="form-check-input" type="radio" name="group2" value="PK" id="radioPK">
                                    <label class="form-check-label" for="radioPK">
                                        SG
                                    </label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid form-check-sm me-3">
                                    <input class="form-check-input" type="radio" name="group2" value="US" id="radioUS">
                                    <label class="form-check-label" for="radioUS">
                                        EU
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 card-header bg-light align-items-center">
                        <div>
                            <ul class="nav nav-tabs nav-line-tabs fs-6">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#swGrowth">SW</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#hwGrowth">HW</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#saGrowth">Solution - All</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <select class="form-select form-select-sm select2-hidden-accessible" data-control="select2" data-placeholder="Country" data-select2-id="select2-data-10-o89d" tabindex="-1" aria-hidden="true">
                                <option data-select2-id="select2-data-12-3dz6"></option>
                                <option value="1">Bangladesh</option>
                                <option value="2">Singapore</option>
                                <option value="2">Europe</option>
                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-h1yh" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-gpel-container" aria-controls="select2-gpel-container"><span class="select2-selection__rendered" id="select2-gpel-container" role="textbox" aria-readonly="true" title="Country"><span class="select2-selection__placeholder">Country</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-between flex-column">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="swGrowth" role="tabpanel">
                                <div id="kt_charts_widget_30_chart" class="w-100 h-200px">
                                    <div style="position: relative; width: 100%; height: 100%;">
                                        <div aria-hidden="true" style="position: absolute; width: 448px; height: 200px;">
                                            <div><canvas class="am5-layer-0" width="448" height="200" style="position: absolute; top: 0px; left: 0px; width: 448px; height: 200px;"></canvas><canvas class="am5-layer-30" width="448" height="200" style="position: absolute; top: 0px; left: 0px; width: 448px; height: 200px;"></canvas></div>
                                        </div>
                                        <div class="am5-html-container" style="position: absolute; pointer-events: none; overflow: hidden; width: 448px; height: 200px;"></div>
                                        <div class="am5-reader-container" role="alert" style="position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(1px, 1px, 1px, 1px);"></div>
                                        <div class="am5-focus-container" role="graphics-document" style="position: absolute; pointer-events: none; top: 0px; left: 0px; overflow: hidden; width: 448px; height: 200px;"></div>
                                        <div class="am5-tooltip-container"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="hwGrowth" role="tabpanel">
                                Hardware Sales Growth
                            </div>
                            <div class="tab-pane fade" id="saGrowth" role="tabpanel">
                                Software Sales Growth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Start -->
        <div class="row g-5 gx-xl-10">
            <div class="col-xl-4">
                <div class="shadow-sm card card-flush h-xl-100">
                    <div class="card-header pt-7">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold main_text_color">Sector Marketing</span>
                        </h3>

                        <div class="card-toolbar">
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-sm btn-light"><i class="fas fa-print" aria-hidden="true"></i> Print Report</a>
                            </div>

                            <div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-100px" data-kt-menu="true">
                                <div class="px-3 menu-item">
                                    <a href="#" class="px-3 menu-link"> Remove </a>
                                </div>

                                <div class="px-3 menu-item">
                                    <a href="#" class="px-3 menu-link"> Mute </a>
                                </div>

                                <div class="px-3 menu-item">
                                    <a href="#" class="px-3 menu-link"> Settings </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="py-10 card-body">
                        <div id="kt_charts_widget_15_chart" class="pt-4 mb-5 min-h-auto ps-4 pe-6 h-300px">
                            <div style="position: relative; width: 100%; height: 100%;">
                                <div aria-hidden="true" style="position: absolute; width: 448px; height: 300px;">
                                    <div><canvas class="am5-layer-0" width="448" height="300" style="position: absolute; top: 0px; left: 0px; width: 448px; height: 300px;"></canvas><canvas class="am5-layer-30" width="448" height="300" style="position: absolute; top: 0px; left: 0px; width: 448px; height: 300px;"></canvas></div>
                                </div>
                                <div class="am5-html-container" style="position: absolute; pointer-events: none; overflow: hidden; width: 448px; height: 300px;"></div>
                                <div class="am5-reader-container" role="alert" style="position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(1px, 1px, 1px, 1px);"></div>
                                <div class="am5-focus-container" role="graphics-document" style="position: absolute; pointer-events: none; top: 0px; left: 0px; overflow: hidden; width: 448px; height: 300px;">
                                    <div role="button" aria-label="Zoom Out" aria-hidden="true" style="position: absolute; pointer-events: none; top: -2px; left: -2px; width: 4px; height: 4px;"></div>
                                </div>
                                <div class="am5-tooltip-container"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="shadow-sm card h-md-100">
                    <div class="py-0 card-header position-relative border-bottom-1">
                        <h3 class="card-title">
                            <span class="card-label fw-bold main_text_color">Individual Activity</span>
                        </h3>
                        <div class="card-toolbar">
                            <div class="pe-4">
                                <a href="">Sales</a>
                                <span>|</span>
                                <a href="">Product</a>
                            </div>
                            <div>
                                <select class="form-select form-select-sm select2-hidden-accessible" data-control="select2" data-placeholder="Choose Country" data-select2-id="select2-data-13-k979" tabindex="-1" aria-hidden="true">
                                    <option data-select2-id="select2-data-15-1os0"></option>
                                    <option value="1">Bangladesh</option>
                                    <option value="2">Singapore</option>
                                    <option value="2">Europe</option>
                                </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-14-e8fu" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-wlgi-container" aria-controls="select2-wlgi-container"><span class="select2-selection__rendered" id="select2-wlgi-container" role="textbox" aria-readonly="true" title="Choose Country"><span class="select2-selection__placeholder">Choose Country</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="pb-0 card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_timeline_widget_4_tab_day" role="tabpanel" aria-labelledby="day-tab">
                                <div class="table-responsive">
                                    <table class="table my-0 align-middle table-row-dashed gs-0 gy-3">
                                        <thead>
                                            <tr class="text-gray-500 fs-7 fw-bold border-bottom-0">
                                                <th class="p-0">SL</th>
                                                <th class="p-0">Salesman</th>
                                                <th class="p-0">Week / Month / Quarter</th>
                                                <th class="p-0">DMAR (% + graph)</th>
                                                <th class="p-0">EMAR (% + graph)</th>
                                                <th class="p-0">CMAR (% + graph)</th>
                                                <th class="p-0 text-end">Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td class="pe-0">Rohit Shetti</td>
                                                <td class="text-center pe-0">
                                                    <span class="badge badge-light-success fs-base">
                                                        59.2%
                                                    </span>
                                                </td>
                                                <td class="pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-primary">In Process</span>
                                                </td>
                                                <td class="text-center">
                                                    <svg id="SvgjsSvg1799" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1838" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1801" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1800">
                                                                <clipPath id="gridRectMask194qzkvh">
                                                                    <rect id="SvgjsRect1804" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMask194qzkvh"></clipPath>
                                                                <clipPath id="nonForecastMask194qzkvh"></clipPath>
                                                                <clipPath id="gridRectMarkerMask194qzkvh">
                                                                    <rect id="SvgjsRect1805" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1812" class="apexcharts-grid">
                                                                <g id="SvgjsG1813" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1816" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1817" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1814" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1819" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1818" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1815" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1806" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1807" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1810" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1811" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" fill="none" fill-opacity="1" stroke="#17c653" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1808" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1809" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1820" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1821" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1822" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1823" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1839" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1840" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1841" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>
                                                <td class="text-center">
                                                    <svg id="SvgjsSvg1842" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1881" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1844" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1843">
                                                                <clipPath id="gridRectMasksm1ru735">
                                                                    <rect id="SvgjsRect1847" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasksm1ru735"></clipPath>
                                                                <clipPath id="nonForecastMasksm1ru735"></clipPath>
                                                                <clipPath id="gridRectMarkerMasksm1ru735">
                                                                    <rect id="SvgjsRect1848" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1859" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1862" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1861" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1858" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1849" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1850" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1853" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1854" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" fill="none" fill-opacity="1" stroke="#f8285a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1851" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1852" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1863" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1864" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1865" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1866" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1882" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1883" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1884" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>
                                                <td class="text-end">Complete</td>
                                            </tr>
                                            <tr>
                                                <td>02</td>
                                                <td class="pe-0">Rohit Shetti</td>
                                                <td class="text-center pe-0">
                                                    <span class="badge badge-light-success fs-base">
                                                        59.2%
                                                    </span>
                                                </td>
                                                <td class="pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-primary">In Process</span>
                                                </td>
                                                <td class="text-center">
                                                    <svg id="SvgjsSvg1799" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1838" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1801" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1800">
                                                                <clipPath id="gridRectMask194qzkvh">
                                                                    <rect id="SvgjsRect1804" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMask194qzkvh"></clipPath>
                                                                <clipPath id="nonForecastMask194qzkvh"></clipPath>
                                                                <clipPath id="gridRectMarkerMask194qzkvh">
                                                                    <rect id="SvgjsRect1805" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1812" class="apexcharts-grid">
                                                                <g id="SvgjsG1813" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1816" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1817" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1814" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1819" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1818" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1815" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1806" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1807" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1810" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1811" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" fill="none" fill-opacity="1" stroke="#17c653" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1808" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1809" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1820" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1821" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1822" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1823" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1839" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1840" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1841" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>
                                                <td class="text-center">
                                                    <svg id="SvgjsSvg1842" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1881" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1844" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1843">
                                                                <clipPath id="gridRectMasksm1ru735">
                                                                    <rect id="SvgjsRect1847" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasksm1ru735"></clipPath>
                                                                <clipPath id="nonForecastMasksm1ru735"></clipPath>
                                                                <clipPath id="gridRectMarkerMasksm1ru735">
                                                                    <rect id="SvgjsRect1848" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1859" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1862" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1861" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1858" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1849" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1850" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1853" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1854" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" fill="none" fill-opacity="1" stroke="#f8285a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1851" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1852" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1863" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1864" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1865" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1866" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1882" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1883" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1884" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>
                                                <td class="text-end">Complete</td>
                                            </tr>
                                            <tr>
                                                <td>03</td>
                                                <td class="pe-0">Rohit Shetti</td>
                                                <td class="text-center pe-0">
                                                    <span class="badge badge-light-success fs-base">
                                                        59.2%
                                                    </span>
                                                </td>
                                                <td class="pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-primary">In Process</span>
                                                </td>
                                                <td class="text-center">
                                                    <svg id="SvgjsSvg1799" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1838" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1801" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1800">
                                                                <clipPath id="gridRectMask194qzkvh">
                                                                    <rect id="SvgjsRect1804" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMask194qzkvh"></clipPath>
                                                                <clipPath id="nonForecastMask194qzkvh"></clipPath>
                                                                <clipPath id="gridRectMarkerMask194qzkvh">
                                                                    <rect id="SvgjsRect1805" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1812" class="apexcharts-grid">
                                                                <g id="SvgjsG1813" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1816" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1817" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1814" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1819" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1818" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1815" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1806" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1807" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1810" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1811" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" fill="none" fill-opacity="1" stroke="#17c653" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1808" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1809" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1820" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1821" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1822" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1823" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1839" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1840" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1841" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>
                                                <td class="text-center">
                                                    <svg id="SvgjsSvg1842" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1881" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1844" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1843">
                                                                <clipPath id="gridRectMasksm1ru735">
                                                                    <rect id="SvgjsRect1847" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasksm1ru735"></clipPath>
                                                                <clipPath id="nonForecastMasksm1ru735"></clipPath>
                                                                <clipPath id="gridRectMarkerMasksm1ru735">
                                                                    <rect id="SvgjsRect1848" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1859" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1862" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1861" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1858" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1849" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1850" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1853" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1854" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" fill="none" fill-opacity="1" stroke="#f8285a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1851" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1852" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1863" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1864" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1865" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1866" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1882" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1883" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1884" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>
                                                <td class="text-end">Complete</td>
                                            </tr>
                                            <tr>
                                                <td>04</td>
                                                <td class="pe-0">Rohit Shetti</td>
                                                <td class="text-center pe-0">
                                                    <span class="badge badge-light-success fs-base">
                                                        59.2%
                                                    </span>
                                                </td>
                                                <td class="pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-primary">In Process</span>
                                                </td>
                                                <td class="text-center">
                                                    <svg id="SvgjsSvg1799" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1838" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1801" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1800">
                                                                <clipPath id="gridRectMask194qzkvh">
                                                                    <rect id="SvgjsRect1804" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMask194qzkvh"></clipPath>
                                                                <clipPath id="nonForecastMask194qzkvh"></clipPath>
                                                                <clipPath id="gridRectMarkerMask194qzkvh">
                                                                    <rect id="SvgjsRect1805" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1812" class="apexcharts-grid">
                                                                <g id="SvgjsG1813" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1816" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1817" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1814" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1819" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1818" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1815" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1806" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1807" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1810" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1811" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" fill="none" fill-opacity="1" stroke="#17c653" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1808" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1809" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1820" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1821" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1822" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1823" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1839" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1840" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1841" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>
                                                <td class="text-center">
                                                    <svg id="SvgjsSvg1842" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1881" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1844" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1843">
                                                                <clipPath id="gridRectMasksm1ru735">
                                                                    <rect id="SvgjsRect1847" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasksm1ru735"></clipPath>
                                                                <clipPath id="nonForecastMasksm1ru735"></clipPath>
                                                                <clipPath id="gridRectMarkerMasksm1ru735">
                                                                    <rect id="SvgjsRect1848" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1859" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1862" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1861" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1858" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1849" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1850" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1853" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1854" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" fill="none" fill-opacity="1" stroke="#f8285a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1851" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1852" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1863" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1864" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1865" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1866" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1882" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1883" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1884" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>
                                                <td class="text-end">Complete</td>
                                            </tr>
                                            <tr>
                                                <td>05</td>
                                                <td class="pe-0">Rohit Shetti</td>
                                                <td class="text-center pe-0">
                                                    <span class="badge badge-light-success fs-base">
                                                        59.2%
                                                    </span>
                                                </td>
                                                <td class="pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-primary">In Process</span>
                                                </td>
                                                <td class="text-center">
                                                    <svg id="SvgjsSvg1799" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1838" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1801" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1800">
                                                                <clipPath id="gridRectMask194qzkvh">
                                                                    <rect id="SvgjsRect1804" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMask194qzkvh"></clipPath>
                                                                <clipPath id="nonForecastMask194qzkvh"></clipPath>
                                                                <clipPath id="gridRectMarkerMask194qzkvh">
                                                                    <rect id="SvgjsRect1805" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1812" class="apexcharts-grid">
                                                                <g id="SvgjsG1813" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1816" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1817" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1814" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1819" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1818" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1815" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1806" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1807" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1810" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1811" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" fill="none" fill-opacity="1" stroke="#17c653" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1808" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1809" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1820" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1821" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1822" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1823" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1839" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1840" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1841" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>
                                                <td class="text-center">
                                                    <svg id="SvgjsSvg1842" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1881" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1844" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1843">
                                                                <clipPath id="gridRectMasksm1ru735">
                                                                    <rect id="SvgjsRect1847" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasksm1ru735"></clipPath>
                                                                <clipPath id="nonForecastMasksm1ru735"></clipPath>
                                                                <clipPath id="gridRectMarkerMasksm1ru735">
                                                                    <rect id="SvgjsRect1848" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1859" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1862" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1861" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1858" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1849" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1850" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1853" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1854" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" fill="none" fill-opacity="1" stroke="#f8285a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1851" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1852" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1863" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1864" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1865" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1866" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1882" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1883" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1884" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>
                                                <td class="text-end">Complete</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="kt_timeline_widget_4_tab_week" role="tabpanel" aria-labelledby="week-tab">
                                <div class="table-responsive">
                                    <table class="table my-0 align-middle table-row-dashed gs-0 gy-3">
                                        <thead>
                                            <tr class="text-gray-500 fs-7 fw-bold border-bottom-0">
                                                <th class="p-0 pb-3 min-w-175px text-start">
                                                    ITEM
                                                </th>
                                                <th class="p-0 pb-3 min-w-100px text-end">
                                                    BUDGET
                                                </th>
                                                <th class="p-0 pb-3 min-w-100px text-end">
                                                    PROGRESS
                                                </th>
                                                <th class="p-0 pb-3 min-w-175px text-end pe-12">
                                                    STATUS
                                                </th>
                                                <th class="p-0 pb-3 w-125px text-end pe-7">
                                                    CHART
                                                </th>
                                                <th class="p-0 pb-3 w-50px text-end">
                                                    VIEW
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/stock/600x600/img-49.jpg" class="" alt="">
                                                        </div>

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Mivy App</a>
                                                            <span class="text-gray-500 fw-semibold d-block fs-7">Jane Cooper</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">$32,400</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="badge badge-light-success fs-base">
                                                        <i class="fa-solid fa-arrow-right f-56text-success ms-n1" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        59.2%
                                                    </span>
                                                </td>

                                                <td class="text-end pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <svg id="SvgjsSvg1799" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1838" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1801" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1800">
                                                                <clipPath id="gridRectMask194qzkvh">
                                                                    <rect id="SvgjsRect1804" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMask194qzkvh"></clipPath>
                                                                <clipPath id="nonForecastMask194qzkvh"></clipPath>
                                                                <clipPath id="gridRectMarkerMask194qzkvh">
                                                                    <rect id="SvgjsRect1805" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1812" class="apexcharts-grid">
                                                                <g id="SvgjsG1813" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1816" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1817" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1814" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1819" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1818" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1815" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1806" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1807" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1810" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1811" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" fill="none" fill-opacity="1" stroke="#17c653" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1808" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1809" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1820" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1821" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1822" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1823" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1839" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1840" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1841" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-primary btn-active-color-primary w-30px h-30px">
                                                        <i class="text-gray-500 fa-solid fa-arrow-right fs-6" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/stock/600x600/img-40.jpg" class="" alt="">
                                                        </div>

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Avionica</a>
                                                            <span class="text-gray-500 fw-semibold d-block fs-7">Esther Howard</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">$256,910</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="badge badge-light-danger fs-base">
                                                        <i class="fa-solid fa-arrow-right ffs65 text-danger ms-n1" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        0.4%
                                                    </span>
                                                </td>

                                                <td class="text-end pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-warning">On Hold</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <svg id="SvgjsSvg1799" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1838" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1801" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1800">
                                                                <clipPath id="gridRectMask194qzkvh">
                                                                    <rect id="SvgjsRect1804" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMask194qzkvh"></clipPath>
                                                                <clipPath id="nonForecastMask194qzkvh"></clipPath>
                                                                <clipPath id="gridRectMarkerMask194qzkvh">
                                                                    <rect id="SvgjsRect1805" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1812" class="apexcharts-grid">
                                                                <g id="SvgjsG1813" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1816" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1817" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1814" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1819" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1818" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1815" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1806" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1807" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1810" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1811" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" fill="none" fill-opacity="1" stroke="#17c653" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1808" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1809" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1820" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1821" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1822" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1823" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1839" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1840" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1841" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-primary btn-active-color-primary w-30px h-30px">
                                                        <i class="text-gray-500 fa-solid fa-arrow-right fs-6" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/stock/600x600/img-39.jpg" class="" alt="">
                                                        </div>

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Charto CRM</a>
                                                            <span class="text-gray-500 fw-semibold d-block fs-7">Jenny Wilson</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">$8,220</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="badge badge-light-success fs-base">
                                                        <i class="fa-solid fa-arrow-right f-56text-success ms-n1" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        59.2%
                                                    </span>
                                                </td>

                                                <td class="text-end pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <svg id="SvgjsSvg1842" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1881" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1844" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1843">
                                                                <clipPath id="gridRectMasksm1ru735">
                                                                    <rect id="SvgjsRect1847" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasksm1ru735"></clipPath>
                                                                <clipPath id="nonForecastMasksm1ru735"></clipPath>
                                                                <clipPath id="gridRectMarkerMasksm1ru735">
                                                                    <rect id="SvgjsRect1848" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1859" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1862" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1861" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1858" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1849" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1850" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1853" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1854" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" fill="none" fill-opacity="1" stroke="#f8285a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1851" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1852" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1863" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1864" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1865" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1866" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1882" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1883" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1884" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-primary btn-active-color-primary w-30px h-30px">
                                                        <i class="text-gray-500 fa-solid fa-arrow-right fs-6" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/stock/600x600/img-47.jpg" class="" alt="">
                                                        </div>

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Tower Hill</a>
                                                            <span class="text-gray-500 fw-semibold d-block fs-7">Cody Fisher</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">$74,000</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="badge badge-light-success fs-base">
                                                        <i class="fa-solid fa-arrow-right f-56text-success ms-n1" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        59.2%
                                                    </span>
                                                </td>

                                                <td class="text-end pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-success">Complated</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <svg id="SvgjsSvg1842" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1881" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1844" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1843">
                                                                <clipPath id="gridRectMasksm1ru735">
                                                                    <rect id="SvgjsRect1847" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasksm1ru735"></clipPath>
                                                                <clipPath id="nonForecastMasksm1ru735"></clipPath>
                                                                <clipPath id="gridRectMarkerMasksm1ru735">
                                                                    <rect id="SvgjsRect1848" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1859" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1862" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1861" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1858" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1849" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1850" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1853" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1854" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" fill="none" fill-opacity="1" stroke="#f8285a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1851" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1852" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1863" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1864" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1865" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1866" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1882" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1883" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1884" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-primary btn-active-color-primary w-30px h-30px">
                                                        <i class="text-gray-500 fa-solid fa-arrow-right fs-6" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/stock/600x600/img-48.jpg" class="" alt="">
                                                        </div>

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">9 Degree</a>
                                                            <span class="text-gray-500 fw-semibold d-block fs-7">Savannah Nguyen</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">$183,300</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="badge badge-light-danger fs-base">
                                                        <i class="fa-solid fa-arrow-right ffs65 text-danger ms-n1" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        0.4%
                                                    </span>
                                                </td>

                                                <td class="text-end pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <svg id="SvgjsSvg1842" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1881" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1844" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1843">
                                                                <clipPath id="gridRectMasksm1ru735">
                                                                    <rect id="SvgjsRect1847" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasksm1ru735"></clipPath>
                                                                <clipPath id="nonForecastMasksm1ru735"></clipPath>
                                                                <clipPath id="gridRectMarkerMasksm1ru735">
                                                                    <rect id="SvgjsRect1848" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1859" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1862" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1861" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1858" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1849" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1850" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1853" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1854" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" fill="none" fill-opacity="1" stroke="#f8285a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1851" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1852" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1863" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1864" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1865" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1866" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1882" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1883" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1884" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-primary btn-active-color-primary w-30px h-30px">
                                                        <i class="text-gray-500 fa-solid fa-arrow-right fs-6" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="kt_timeline_widget_4_tab_month" role="tabpanel" aria-labelledby="month-tab">
                                <div class="table-responsive">
                                    <table class="table my-0 align-middle table-row-dashed gs-0 gy-3">
                                        <thead>
                                            <tr class="text-gray-500 fs-7 fw-bold border-bottom-0">
                                                <th class="p-0 pb-3 min-w-175px text-start">
                                                    ITEM
                                                </th>
                                                <th class="p-0 pb-3 min-w-100px text-end">
                                                    BUDGET
                                                </th>
                                                <th class="p-0 pb-3 min-w-100px text-end">
                                                    PROGRESS
                                                </th>
                                                <th class="p-0 pb-3 min-w-175px text-end pe-12">
                                                    STATUS
                                                </th>
                                                <th class="p-0 pb-3 w-125px text-end pe-7">
                                                    CHART
                                                </th>
                                                <th class="p-0 pb-3 w-50px text-end">
                                                    VIEW
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/stock/600x600/img-49.jpg" class="" alt="">
                                                        </div>

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Mivy App</a>
                                                            <span class="text-gray-500 fw-semibold d-block fs-7">Jane Cooper</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">$32,400</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="badge badge-light-success fs-base">
                                                        <i class="fa-solid fa-arrow-right f-56text-success ms-n1" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        59.2%
                                                    </span>
                                                </td>

                                                <td class="text-end pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <svg id="SvgjsSvg1799" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1838" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1801" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1800">
                                                                <clipPath id="gridRectMask194qzkvh">
                                                                    <rect id="SvgjsRect1804" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMask194qzkvh"></clipPath>
                                                                <clipPath id="nonForecastMask194qzkvh"></clipPath>
                                                                <clipPath id="gridRectMarkerMask194qzkvh">
                                                                    <rect id="SvgjsRect1805" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1812" class="apexcharts-grid">
                                                                <g id="SvgjsG1813" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1816" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1817" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1814" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1819" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1818" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1815" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1806" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1807" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1810" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1811" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" fill="none" fill-opacity="1" stroke="#17c653" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1808" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1809" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1820" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1821" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1822" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1823" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1839" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1840" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1841" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-primary btn-active-color-primary w-30px h-30px">
                                                        <i class="text-gray-500 fa-solid fa-arrow-right fs-6" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/stock/600x600/img-40.jpg" class="" alt="">
                                                        </div>

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Avionica</a>
                                                            <span class="text-gray-500 fw-semibold d-block fs-7">Esther Howard</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">$256,910</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="badge badge-light-danger fs-base">
                                                        <i class="fa-solid fa-arrow-right ffs65 text-danger ms-n1" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        0.4%
                                                    </span>
                                                </td>

                                                <td class="text-end pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-warning">On Hold</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <svg id="SvgjsSvg1799" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1838" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1801" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1800">
                                                                <clipPath id="gridRectMask194qzkvh">
                                                                    <rect id="SvgjsRect1804" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMask194qzkvh"></clipPath>
                                                                <clipPath id="nonForecastMask194qzkvh"></clipPath>
                                                                <clipPath id="gridRectMarkerMask194qzkvh">
                                                                    <rect id="SvgjsRect1805" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1812" class="apexcharts-grid">
                                                                <g id="SvgjsG1813" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1816" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1817" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1814" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1819" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1818" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1815" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1806" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1807" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1810" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1811" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" fill="none" fill-opacity="1" stroke="#17c653" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1808" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1809" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1820" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1821" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1822" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1823" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1839" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1840" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1841" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-primary btn-active-color-primary w-30px h-30px">
                                                        <i class="text-gray-500 fa-solid fa-arrow-right fs-6" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/stock/600x600/img-39.jpg" class="" alt="">
                                                        </div>

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Charto CRM</a>
                                                            <span class="text-gray-500 fw-semibold d-block fs-7">Jenny Wilson</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">$8,220</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="badge badge-light-success fs-base">
                                                        <i class="fa-solid fa-arrow-right f-56text-success ms-n1" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        59.2%
                                                    </span>
                                                </td>

                                                <td class="text-end pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <svg id="SvgjsSvg1842" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1881" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1844" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1843">
                                                                <clipPath id="gridRectMasksm1ru735">
                                                                    <rect id="SvgjsRect1847" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasksm1ru735"></clipPath>
                                                                <clipPath id="nonForecastMasksm1ru735"></clipPath>
                                                                <clipPath id="gridRectMarkerMasksm1ru735">
                                                                    <rect id="SvgjsRect1848" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1859" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1862" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1861" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1858" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1849" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1850" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1853" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1854" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" fill="none" fill-opacity="1" stroke="#f8285a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1851" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1852" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1863" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1864" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1865" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1866" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1882" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1883" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1884" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-primary btn-active-color-primary w-30px h-30px">
                                                        <i class="text-gray-500 fa-solid fa-arrow-right fs-6" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/stock/600x600/img-47.jpg" class="" alt="">
                                                        </div>

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Tower Hill</a>
                                                            <span class="text-gray-500 fw-semibold d-block fs-7">Cody Fisher</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">$74,000</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="badge badge-light-success fs-base">
                                                        <i class="fa-solid fa-arrow-right f-56text-success ms-n1" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        59.2%
                                                    </span>
                                                </td>

                                                <td class="text-end pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-success">Complated</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <svg id="SvgjsSvg1842" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1881" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1844" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1843">
                                                                <clipPath id="gridRectMasksm1ru735">
                                                                    <rect id="SvgjsRect1847" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasksm1ru735"></clipPath>
                                                                <clipPath id="nonForecastMasksm1ru735"></clipPath>
                                                                <clipPath id="gridRectMarkerMasksm1ru735">
                                                                    <rect id="SvgjsRect1848" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1859" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1862" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1861" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1858" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1849" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1850" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1853" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1854" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" fill="none" fill-opacity="1" stroke="#f8285a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1851" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1852" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1863" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1864" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1865" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1866" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1882" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1883" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1884" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-primary btn-active-color-primary w-30px h-30px">
                                                        <i class="text-gray-500 fa-solid fa-arrow-right fs-6" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/stock/600x600/img-48.jpg" class="" alt="">
                                                        </div>

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">9 Degree</a>
                                                            <span class="text-gray-500 fw-semibold d-block fs-7">Savannah Nguyen</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">$183,300</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="badge badge-light-danger fs-base">
                                                        <i class="fa-solid fa-arrow-right ffs65 text-danger ms-n1" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        0.4%
                                                    </span>
                                                </td>

                                                <td class="text-end pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <svg id="SvgjsSvg1842" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1881" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1844" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1843">
                                                                <clipPath id="gridRectMasksm1ru735">
                                                                    <rect id="SvgjsRect1847" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasksm1ru735"></clipPath>
                                                                <clipPath id="nonForecastMasksm1ru735"></clipPath>
                                                                <clipPath id="gridRectMarkerMasksm1ru735">
                                                                    <rect id="SvgjsRect1848" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1859" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1862" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1861" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1858" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1849" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1850" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1853" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1854" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" fill="none" fill-opacity="1" stroke="#f8285a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1851" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1852" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1863" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1864" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1865" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1866" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1882" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1883" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1884" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-primary btn-active-color-primary w-30px h-30px">
                                                        <i class="text-gray-500 fa-solid fa-arrow-right fs-6" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="kt_timeline_widget_4_tab_2022" role="tabpanel" aria-labelledby="week-tab">
                                <div class="table-responsive">
                                    <table class="table my-0 align-middle table-row-dashed gs-0 gy-3">
                                        <thead>
                                            <tr class="text-gray-500 fs-7 fw-bold border-bottom-0">
                                                <th class="p-0 pb-3 min-w-175px text-start">
                                                    ITEM
                                                </th>
                                                <th class="p-0 pb-3 min-w-100px text-end">
                                                    BUDGET
                                                </th>
                                                <th class="p-0 pb-3 min-w-100px text-end">
                                                    PROGRESS
                                                </th>
                                                <th class="p-0 pb-3 min-w-175px text-end pe-12">
                                                    STATUS
                                                </th>
                                                <th class="p-0 pb-3 w-125px text-end pe-7">
                                                    CHART
                                                </th>
                                                <th class="p-0 pb-3 w-50px text-end">
                                                    VIEW
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/stock/600x600/img-49.jpg" class="" alt="">
                                                        </div>

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Mivy App</a>
                                                            <span class="text-gray-500 fw-semibold d-block fs-7">Jane Cooper</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">$32,400</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="badge badge-light-success fs-base">
                                                        <i class="fa-solid fa-arrow-right f-56text-success ms-n1" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        59.2%
                                                    </span>
                                                </td>

                                                <td class="text-end pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <svg id="SvgjsSvg1799" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1838" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1801" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1800">
                                                                <clipPath id="gridRectMask194qzkvh">
                                                                    <rect id="SvgjsRect1804" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMask194qzkvh"></clipPath>
                                                                <clipPath id="nonForecastMask194qzkvh"></clipPath>
                                                                <clipPath id="gridRectMarkerMask194qzkvh">
                                                                    <rect id="SvgjsRect1805" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1812" class="apexcharts-grid">
                                                                <g id="SvgjsG1813" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1816" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1817" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1814" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1819" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1818" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1815" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1806" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1807" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1810" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1811" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" fill="none" fill-opacity="1" stroke="#17c653" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1808" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1809" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1820" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1821" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1822" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1823" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1839" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1840" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1841" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-primary btn-active-color-primary w-30px h-30px">
                                                        <i class="text-gray-500 fa-solid fa-arrow-right fs-6" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/stock/600x600/img-40.jpg" class="" alt="">
                                                        </div>

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Avionica</a>
                                                            <span class="text-gray-500 fw-semibold d-block fs-7">Esther Howard</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">$256,910</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="badge badge-light-danger fs-base">
                                                        <i class="fa-solid fa-arrow-right ffs65 text-danger ms-n1" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        0.4%
                                                    </span>
                                                </td>

                                                <td class="text-end pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-warning">On Hold</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <svg id="SvgjsSvg1799" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1838" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1801" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1800">
                                                                <clipPath id="gridRectMask194qzkvh">
                                                                    <rect id="SvgjsRect1804" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMask194qzkvh"></clipPath>
                                                                <clipPath id="nonForecastMask194qzkvh"></clipPath>
                                                                <clipPath id="gridRectMarkerMask194qzkvh">
                                                                    <rect id="SvgjsRect1805" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1812" class="apexcharts-grid">
                                                                <g id="SvgjsG1813" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1816" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1817" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1814" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1819" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1818" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1815" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1806" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1807" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1810" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1811" d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" fill="none" fill-opacity="1" stroke="#17c653" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask194qzkvh)" pathto="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1808" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1809" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1820" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1821" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1822" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1823" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1839" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1840" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1841" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-primary btn-active-color-primary w-30px h-30px">
                                                        <i class="text-gray-500 fa-solid fa-arrow-right fs-6" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/stock/600x600/img-39.jpg" class="" alt="">
                                                        </div>

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Charto CRM</a>
                                                            <span class="text-gray-500 fw-semibold d-block fs-7">Jenny Wilson</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">$8,220</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="badge badge-light-success fs-base">
                                                        <i class="fa-solid fa-arrow-right f-56text-success ms-n1" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        59.2%
                                                    </span>
                                                </td>

                                                <td class="text-end pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <svg id="SvgjsSvg1842" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1881" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1844" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1843">
                                                                <clipPath id="gridRectMasksm1ru735">
                                                                    <rect id="SvgjsRect1847" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasksm1ru735"></clipPath>
                                                                <clipPath id="nonForecastMasksm1ru735"></clipPath>
                                                                <clipPath id="gridRectMarkerMasksm1ru735">
                                                                    <rect id="SvgjsRect1848" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1859" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1862" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1861" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1858" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1849" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1850" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1853" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1854" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" fill="none" fill-opacity="1" stroke="#f8285a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1851" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1852" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1863" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1864" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1865" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1866" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1882" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1883" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1884" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-primary btn-active-color-primary w-30px h-30px">
                                                        <i class="text-gray-500 fa-solid fa-arrow-right fs-6" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/stock/600x600/img-47.jpg" class="" alt="">
                                                        </div>

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Tower Hill</a>
                                                            <span class="text-gray-500 fw-semibold d-block fs-7">Cody Fisher</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">$74,000</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="badge badge-light-success fs-base">
                                                        <i class="fa-solid fa-arrow-right f-56text-success ms-n1" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        59.2%
                                                    </span>
                                                </td>

                                                <td class="text-end pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-success">Complated</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <svg id="SvgjsSvg1842" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1881" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1844" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1843">
                                                                <clipPath id="gridRectMasksm1ru735">
                                                                    <rect id="SvgjsRect1847" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasksm1ru735"></clipPath>
                                                                <clipPath id="nonForecastMasksm1ru735"></clipPath>
                                                                <clipPath id="gridRectMarkerMasksm1ru735">
                                                                    <rect id="SvgjsRect1848" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1859" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1862" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1861" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1858" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1849" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1850" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1853" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1854" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" fill="none" fill-opacity="1" stroke="#f8285a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1851" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1852" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1863" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1864" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1865" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1866" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1882" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1883" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1884" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-primary btn-active-color-primary w-30px h-30px">
                                                        <i class="text-gray-500 fa-solid fa-arrow-right fs-6" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/stock/600x600/img-48.jpg" class="" alt="">
                                                        </div>

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">9 Degree</a>
                                                            <span class="text-gray-500 fw-semibold d-block fs-7">Savannah Nguyen</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">$183,300</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <span class="badge badge-light-danger fs-base">
                                                        <i class="fa-solid fa-arrow-right ffs65 text-danger ms-n1" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        0.4%
                                                    </span>
                                                </td>

                                                <td class="text-end pe-12">
                                                    <span class="px-4 py-3 badge fs-7 badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end pe-0">
                                                    <svg id="SvgjsSvg1842" width="92.25" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent">
                                                        <foreignObject x="0" y="0" width="92.25" height="50">
                                                            <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 25px"></div>
                                                        </foreignObject>
                                                        <g id="SvgjsG1881" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1844" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 1)">
                                                            <defs id="SvgjsDefs1843">
                                                                <clipPath id="gridRectMasksm1ru735">
                                                                    <rect id="SvgjsRect1847" width="98.25" height="54" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasksm1ru735"></clipPath>
                                                                <clipPath id="nonForecastMasksm1ru735"></clipPath>
                                                                <clipPath id="gridRectMarkerMasksm1ru735">
                                                                    <rect id="SvgjsRect1848" width="96.25" height="52" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                    <line id="SvgjsLine1859" x1="0" y1="0" x2="92.25" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="0" y1="48" x2="92.25" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                                <line id="SvgjsLine1862" x1="0" y1="48" x2="92.25" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1861" x1="0" y1="1" x2="0" y2="48" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1858" class="apexcharts-grid-borders" style="display: none"></g>
                                                            <g id="SvgjsG1849" class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1850" class="apexcharts-series" zindex="0" seriesname="NetxProfit" data:longestseries="true" rel="1" data:realindex="0">
                                                                    <path id="SvgjsPath1853" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" fill="rgba(255,255,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48 L 0 48"></path>
                                                                    <path id="SvgjsPath1854" d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" fill="none" fill-opacity="1" stroke="#f8285a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksm1ru735)" pathto="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4" pathfrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48" fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG1851" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realindex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG1852" class="apexcharts-datalabels" data:realindex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1863" x1="0" y1="0" x2="92.25" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1864" x1="0" y1="0" x2="92.25" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1865" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g id="SvgjsG1866" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1882" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1883" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1884" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-primary btn-active-color-primary w-30px h-30px">
                                                        <i class="text-gray-500 fa-solid fa-arrow-right fs-6" aria-hidden="true"></i>
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
        </div>
    </div>
    @push('scripts')
    @endpush
</x-admin-app-layout>



<!-- RFQ Dashboard -->
 <x-admin-app-layout :title="'RFQ Dashboard'">
    @include('metronic.pages.rfq.partials.rfq_css')
    <!-- Main Content Start -->
    @php
    $months = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December',
    ];
    @endphp
    <div class="mb-5 row">
        <div class="col-lg-4 ps-0">
            <div class="shadow-none card rfq-box">
                <div class="w-100 rfq-status-card" style="overflow: hidden;">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="">
                                <h1>Total RFQ</h1>
                                <p>{{ date('d M , Y') }}</p>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void" class="text-gray-800 fs-1 fw-bold lh-0">
                                        <span class="pt-4 mb-2 text-gray-500 fw-semibold d-block fs-6 text-start">
                                            This Month: {{ $this_month }}
                                            @if ($last_month > 0)
                                            @if ($percentage_change > 0)
                                            <span class="text-success ms-2">
                                                ▲ {{ $percentage_change }}%
                                            </span>
                                            @elseif ($percentage_change < 0)
                                                <span class="text-danger ms-2">
                                                ▼ {{ abs($percentage_change) }}%
                                        </span>
                                        @else
                                        <span class="text-muted ms-2">—</span>
                                        @endif
                                        @endif
                                        </span>
                                        <span class="pt-4 text-gray-500 fw-semibold d-block fs-6 text-start">
                                            Last Month: {{ $last_month }}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="rfq-amount">
                                <h1 class="value">{{ $rfq_count }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="shadow-none card rfq-status">
                <div class="w-100 rfq-status-card">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="rfq-icon">
                                <img src="{{ asset('backend/assets/images/rfq/Total_RFQ.svg') }}" alt="">
                            </div>
                            <div class="mt-4">
                                <h1 class="mb-0">RFQ</h1>
                                <p class="rfq-para">Status</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="mb-3 border-0 nav nav-tabs nav-line-tabs fs-6 rfq-tabs w-100">
                                <li class="mb-2 nav-item w-100">
                                    <a class="nav-link w-100 {{ empty($tab_status) || $tab_status == 'pending' ? 'active' : '' }} rfq-pending"
                                        data-bs-toggle="tab" href="#pending" data-status="pending">
                                        <div class="d-flex justify-content-between w-100 align-items-center">
                                            <p class="mb-0">Pending</p>
                                            <p class="mb-0">{{ $rfqs->count() }}</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2 nav-item w-100">
                                    <a class="nav-link w-100 {{ !empty($tab_status) && $tab_status == 'quoted' ? 'active' : '' }} rfq-quoted"
                                        data-bs-toggle="tab" href="#quoted" data-status="quoted">
                                        <div class="d-flex justify-content-between w-100 align-items-center">
                                            <p class="mb-0">Quoted</p>
                                            <p class="mb-0">{{ $quoteds->count() }}</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2 nav-item w-100">
                                    <a class="nav-link w-100 {{ !empty($tab_status) && $tab_status == 'lost' ? 'active' : '' }} rfq-failed"
                                        data-bs-toggle="tab" href="#failed" data-status="lost">
                                        <div class="d-flex justify-content-between w-100 align-items-center">
                                            <p class="mb-0">Lost</p>
                                            <p class="mb-0">{{ $losts->count() }}</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 pe-0">
            <div class="p-3 shadow-none card rfq-status-card">
                <div class="px-2 border-0 card-header w-100">
                    <div class="text-white rounded position-relative me-2 d-flex align-items-center"
                        style="width: 100%; position: relative; z-index: 5;">
                        <i
                            class="fa-solid fa-magnifying-glass fs-3 position-absolute top-50 translate-middle-y ms-4"></i>
                        <input type="text" id="searchCountryQuery" data-kt-table-widget-4="search"
                            class="form-control form-control-solid w-100 fs-7 ps-12 searchQuery"
                            placeholder="RFQ By Country" />
                    </div>
                </div>
                <div class="px-3 pt-2 rfq-status-card w-100">
                    <div id="countryList">
                        @forelse ($countryWiseRfqs as $country)
                        <div class="country-wrapper">
                            <div class="d-flex align-items-center justify-content-between country-item">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0 fw-normal ps-3">{{ $country->country }}</h5>
                                </div>
                                <div>
                                    <span>{{ $country->total }}</span>
                                </div>
                            </div>
                            <hr>
                        </div>
                        @empty
                        <p class="text-center text-muted">No countries found.</p>
                        @endforelse
                    </div>
                    {{-- Hidden message for "No results found" --}}
                    <p id="noResults" class="mt-4 text-center text-muted" style="display: none;">No countries match
                        your search.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5 row">
        <div class="mb-3 col-12 col-lg-8 ps-0">
            <div class="shadow-none card card-flush" style="overflow-x: hidden !important;">
                <div class="p-4 card-body p-lg-7">
                    <div class="row align-items-center">
                        <!-- Left Title Section -->
                        <div class="col-lg-3">
                            <a href="#allRFQ" class="text-decoration-none">
                                <span class="rfq-e-title d-block fw-bold">RFQ Filtered</span>
                                <span class="rfq-p-title text-muted small">All RFQ history here</span>
                            </a>
                        </div>
                        <!-- Right Filters Section -->
                        <div class="col-12 col-lg-9">
                            <div class="row g-2">
                                <!-- Country -->
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                    <select class="form-select filterCountry w-100" data-control="select2"
                                        data-placeholder="Country" data-allow-clear="true" id="filterCountry"
                                        name="country">
                                        <option></option>
                                        @foreach ($countryWiseRfqs as $country)
                                            <option value="{{ $country->country }}">{{ $country->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Salesman -->
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                    <select class="form-select filterSalesman w-100" data-control="select2"
                                        data-placeholder="Salesmanager" data-allow-clear="true"
                                        data-enable-filtering="true" id="filterSalesman" name="salesman">
                                        <option></option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Company -->
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                    <select class="form-select filterCompany w-100" data-control="select2"
                                        data-placeholder="Company" data-allow-clear="true"
                                        data-enable-filtering="true" id="filterCompany" name="company">
                                        <option></option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company }}">{{ $company }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Search -->
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                    <i class="fa-solid fa-magnifying-glass fs-5 position-absolute top-50 translate-middle-y ms-3 text-muted"></i>
                                    <input type="text" id="searchQuery" data-kt-table-widget-4="search"
                                        class="form-control ps-10 pe-30 searchQuery" placeholder="Search" />
                                    <button type="button"
                                        class="btn btn-sm position-absolute top-50 end-0 translate-middle-y me-2 d-none"
                                        id="clearSearch" style="z-index: 2;">
                                        <i class="fas fa-times text-muted"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 col-12 col-md-6 col-lg-4">
            <div class="shadow-none card card-flush">
                <div class="card-body">
                    <div class="flex-wrap gap-2 d-flex justify-content-between align-items-center">
                        <!-- Year Select -->
                        <div class="flex-grow-1 min-w-100 min-w-md-auto">
                            <select class="form-select" data-control="select2" data-allow-clear="true"
                                data-placeholder="Year" name="year" id="filterYear">
                                <option value="{{ date('Y') }}">2025</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                        </div>

                        <!-- Month Select -->
                        <div class="flex-grow-1 min-w-100 min-w-md-auto">
                            <select class="form-select" data-control="select2" data-placeholder="Month"
                                name="month" id="filterMonth">
                                <option value="{{ \Carbon\Carbon::now()->format('F') }}">
                                    {{ \Carbon\Carbon::now()->format('F') }}
                                </option>
                                @foreach ($months as $month)
                                <option value="{{ $month }}">{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Link Button -->
                        <div class="text-center flex-grow-1 min-w-100 min-w-md-auto">
                            @if (!Route::is('admin.archived.rfq'))
                            <a href="{{ route('admin.archived.rfq') }}" class="btn btn-outline-primary w-100">
                                Archived <i class="fas fa-arrow-right"></i>
                            </a>
                            @else
                            <a href="{{ route('admin.rfq.index') }}" class="btn btn-outline-primary w-100">
                                Recent RFQs <i class="fas fa-arrow-right"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Container for the filtered RFQ queries -->
        <div class="tab-content" id="myTabContent">
            @include('metronic.pages.rfq.partials.rfq_queries')
        </div>
    </div>
    @include('metronic.pages.rfq.partials.assign-modal')
@push('scripts')
        <script>
            $(".data_table").DataTable({
                language: {
                    lengthMenu: "Show _MENU_",
                },
                dom: "<'row mb-2'" +
                    "<'col-sm-6 d-flex align-items-center justify-conten-start dt-toolbar'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
                    ">" +
                    "<'table-responsive'tr>" +
                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">",
            });
        </script>
        {{-- <script>

            $(document).ready(function() {
                function fetchRfqData() {
                    var year = $('#filterYear').val();
                    var month = $('#filterMonth').val();
                    var company = $('#filterCompany').val();
                    var country = $('#filterCountry').val();
                    var search = $('#searchQuery').val();
                    var activeTab = $('.rfq-tabs .nav-link.active');
                    var status = activeTab.data('status');

                    // Show loading spinner
                    $('#myTabContent').html(`
                <div class="py-5 text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            `);

                    $.ajax({
                        url: '{{ route('admin.rfq.filter') }}',
                        type: 'GET',
                        data: {
                            year: year,
                            month: month,
                            status: status,
                            country: country,
                            company: company,
                            search: search
                        },
                        success: function(response) {
                            if (response.view) {
                                $('#myTabContent').html(response.view);

                                // Restore filter values
                                $('#filterYear').val(year);
                                $('#filterMonth').val(month);
                                $('#filterCompany').val(company).trigger('change');
                                $('#filterCountry').val(country).trigger('change');
                                $('#searchQuery').val(search);

                                // Rebind events after DOM update
                                bindFilterEvents();

                                // Restore active tab state
                                $('.rfq-tabs .nav-link').removeClass('active');
                                activeTab.addClass('active');
                            } else {
                                console.error('No view content returned');
                            }
                        },
                        error: function() {
                            $('#myTabContent').html(`
                        <div class="my-4 text-center alert alert-danger">
                            Error fetching data. Please try again.
                        </div>
                    `);
                        }
                    });
                }

                function bindFilterEvents() {
                    $('#filterYear, #filterMonth, #filterCompany, #filterCountry')
                        .off('input change')
                        .on('input change', function() {
                            fetchRfqData();
                        });

                    $('#searchQuery, .searchQuery').off('keypress').on('keypress', function(e) {
                        if (e.which === 13) {
                            fetchRfqData();
                        }
                    });
                }

                // Initial event bindings
                bindFilterEvents();
            });
        </script> --}}

        <script>
            $(document).ready(function() {
                function initSelect2() {
                    $('select[data-control="select2"]').each(function() {
                        const placeholder = $(this).data('placeholder') || 'Select an option';
                        $(this).select2({
                            placeholder: placeholder,
                            allowClear: true,
                            width: 'resolve',
                        });
                    });
                }


                function fetchRfqData() {
                    var year = $('#filterYear').val();
                    var month = $('#filterMonth').val();
                    var company = $('#filterCompany').val();
                    var country = $('#filterCountry').val();
                    var salesman = $('#filterSalesman').val();
                    var search = $('#searchQuery').val();
                    var activeTab = $('.rfq-tabs .nav-link.active');
                    var status = activeTab.data('status');

                    // Show loading spinner
                    $('#myTabContent').html(`
                            <div class="py-5 text-center">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        `);

                    $.ajax({
                        url: '{{ route('admin.rfq.filter') }}',
                        type: 'GET',
                        data: {
                            year: year,
                            month: month,
                            status: status,
                            country: country,
                            company: company,
                            salesman: salesman,
                            search: search
                        },
                        success: function(response) {
                            if (response.view) {
                                $('#myTabContent').html(response.view);
                                initSelect2();
                                bindFilterEvents();

                                // Restore active tab
                                $('.rfq-tabs .nav-link').removeClass('active');
                                activeTab.addClass('active');
                            } else {
                                $('#myTabContent').html(`
                                <div class="my-4 text-center alert alert-danger">
                                    Error fetching data. Please try again.
                                </div>
                            `);
                                console.error('No view content returned');
                            }
                        },
                        error: function() {
                            $('#myTabContent').html(`
                                <div class="my-4 text-center alert alert-danger">
                                    Error fetching data. Please try again.
                                </div>
                            `);
                        }
                    });
                }

                function bindFilterEvents() {
                    $('#filterYear, #filterMonth, #filterCompany, #filterCountry, #filterSalesman')
                        .off('change')
                        .on('change', fetchRfqData);

                    $('#searchQuery').off('input keypress').on('input keypress', function(e) {
                        const searchVal = $(this).val();
                        if (searchVal.length > 0) {
                            $('#clearSearch').removeClass('d-none');
                        } else {
                            $('#clearSearch').addClass('d-none');
                        }

                        if (e.which === 13) {
                            fetchRfqData();
                        }
                    });

                    $('#clearSearch').off('click').on('click', function() {
                        $('#searchQuery').val('').trigger('input');
                        $(this).addClass('d-none');
                        fetchRfqData();
                    });
                }


                // Init on page load
                initSelect2();
                bindFilterEvents();
            });
        </script>

        <script>
            $(document).ready(function() {
                $(document).on('change', '.pendingRFQ, .quotedRFQ, .lostRFQ', function() {
                    const selectedValue = $(this).val();
                    const selectElement = $(this);
                    const rfqId = selectedValue.split('_').pop(); // Get ID at the end

                    // Handle "track_tab" or "message_tab"
                    const trackContainer = document.getElementById(`track_container_${rfqId}`);
                    const messageContainer = document.getElementById(`message_container_${rfqId}`);

                    if (trackContainer && messageContainer) {
                        if (selectedValue.startsWith('track_tab')) {
                            trackContainer.style.display = 'block';
                            messageContainer.style.display = 'none';
                        } else if (selectedValue.startsWith('message_tab')) {
                            trackContainer.style.display = 'none';
                            messageContainer.style.display = 'block';
                        }
                    }

                    // Handle "delete"
                    if (selectedValue.startsWith('delete_')) {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'This will permanently delete the RFQ.',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: '{{ route('admin.rfq.destroy', ['rfq' => '__rfq_id__']) }}'
                                        .replace('__rfq_id__', rfqId),
                                    type: 'DELETE',
                                    data: {
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        Swal.fire({
                                            title: 'Deleted!',
                                            text: 'The RFQ has been deleted.',
                                            icon: 'success',
                                            timer: 2000,
                                            showConfirmButton: false
                                        }).then(() => {
                                            location.reload();
                                        });
                                    },
                                    error: function(xhr) {
                                        Swal.fire({
                                            title: 'Error!',
                                            text: 'Failed to delete RFQ: ' + xhr
                                                .responseText,
                                            icon: 'error'
                                        });
                                    }
                                });
                            } else {
                                // Reset dropdown if user cancels deletion
                                selectElement.val('');
                            }
                        });
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#searchCountryQuery').on('input', function() {
                    const query = $(this).val().toLowerCase();
                    let anyVisible = false;

                    $('.country-wrapper').each(function() {
                        const countryName = $(this).find('.country-item h5').text().toLowerCase();

                        if (countryName.includes(query)) {
                            $(this).show();
                            anyVisible = true;
                        } else {
                            $(this).hide();
                        }
                    });

                    // Show or hide "No results" message
                    $('#noResults').toggle(!anyVisible);
                });
            });
        </script>
        
    @endpush
</x-admin-app-layout>
<!-- RFQ Dashboard End -->