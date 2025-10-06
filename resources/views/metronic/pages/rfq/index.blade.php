<x-admin-app-layout :title="'Marketing Plan'">
    <div
        class="px-0 container-fluid">
        <div class="mb-5 row">
            <div class="col">
                <div class="shadow-none card card-flush card-rounded ">
                    <div class="d-flex justify-content-center align-items-center h-140px">
                        <div>
                            <img class="img-fluid rounded-circle h-100px w-100px" style="border: 2px solid #296088;" src="https://picsum.photos/id/1/200/300" alt="">
                        </div>
                        <div class="p-8 me-3 text-start">
                            <p class="mb-1 text-black fw-bold" style="font-size: 16px;">Esther Howard</p>
                            <p class="mb-0 text-muted" style="font-size: 16px;">Sales Manager</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="shadow-none card card-flush card-rounded ">
                    <div class="d-flex justify-content-center align-items-center h-140px">
                        <div class="p-8 me-3 text-start ">
                            <p class="mb-0 optional-color" style="font-size: 28px;">Marketing Plan</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="shadow-none card card-flush card-rounded ">
                    <div class="px-15 d-flex justify-content-between align-items-center h-140px">
                        <div>
                            <p class="mb-0 optional-color" style="font-size: 28px;"><span class="text-muted">Year</span> 2025</p>
                        </div>
                        <div class="p-8 text-start pe-0">
                            <p class="mb-2 text-black">Check Monthly Information</p>
                            <div>
                                <select
                                    class="form-select form-select-sm"
                                    data-control="select2"
                                    data-placeholder="date"
                                    tabindex="-1"
                                    aria-hidden="true">
                                    <option>Select Date</option>
                                    <option value="January" selected>January</option>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card h-xl-100" id="kt_timeline_widget_2_card">
                    <div class="mt-10 border-0 card-header position-relative align-items-center">
                        <ul class="nav nav-stretch nav-pills nav-pills-custom d-flex" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary active" data-bs-toggle="pill" href="#kt_timeline_widget_2_tab_1" aria-selected="true" role="tab">
                                    <span class="nav-text fw-semibold fs-4">
                                        Site Visit
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary" data-bs-toggle="pill" href="#kt_timeline_widget_2_tab_2" aria-selected="false" tabindex="-1" role="tab">
                                    <span class="nav-text fw-semibold fs-4">
                                        Client Visit
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary" data-bs-toggle="pill" href="#kt_timeline_widget_2_tab_3" aria-selected="false" tabindex="-1" role="tab">
                                    <span class="nav-text fw-semibold fs-4">
                                        Telephone
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary" data-bs-toggle="pill" href="#kt_timeline_widget_2_tab_3" aria-selected="false" tabindex="-1" role="tab">
                                    <span class="nav-text fw-semibold fs-4">
                                        Email
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary" data-bs-toggle="pill" href="#kt_timeline_widget_2_tab_4" aria-selected="false" tabindex="-1" role="tab">
                                    <span class="nav-text fw-semibold fs-4">
                                        Social
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div>
                        <div class="card-toolbar flex-column">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check form-check-custom form-check-solid form-check-sm me-3">
                                    <input class="form-check-input" type="radio" name="group2" value="BD" id="radioBD" checked="">
                                    <label class="form-check-label" for="radioBD">
                                        Live
                                    </label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid form-check-sm me-3">
                                    <input class="form-check-input" type="radio" name="group2" value="PK" id="radioPK">
                                    <label class="form-check-label" for="radioPK">
                                        Lost
                                    </label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid form-check-sm me-3">
                                    <input class="form-check-input" type="radio" name="group2" value="US" id="radioUS">
                                    <label class="form-check-label" for="radioUS">
                                        Submited
                                    </label>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_timeline_widget_2_tab_1" role="tabpanel">
                                <!--begin::Accordion-->
                                <div class="accordion" id="kt_accordion_1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                            <button class="font-normal accordion-button fs-4 text-muted" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="true" aria-controls="kt_accordion_1_body_1">
                                                Wednesday April 9th, 2025
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1" style="">
                                            <div class="py-1 accordion-body">
                                                <div class="table-responsive">
                                                    <table class="table align-middle gs-0 gy-4">
                                                        <thead>
                                                            <tr>
                                                                <th class="p-0 w-10px"></th>
                                                                <th class="p-0 w-25px"></th>
                                                                <th class="p-0 min-w-400px"></th>
                                                                <th class="p-0 min-w-100px"></th>
                                                                <th class="p-0 min-w-125px"></th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input" type="checkbox" value="" checked="" data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">Islamic Foundation Bangladesh,
                                                                        Agargoan
                                                                    </a>

                                                                    <span class="text-gray-500 fw-bold fs-7 d-block">Site Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status" class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                                                <path d="M14.25 4.5V3C14.25 2.20435 13.9339 1.44129 13.3713 0.87868C12.8087 0.316071 12.0456 0 11.25 0L6.75 0C5.95435 0 5.19129 0.316071 4.62868 0.87868C4.06607 1.44129 3.75 2.20435 3.75 3V4.5C2.7558 4.50119 1.80267 4.89666 1.09966 5.59966C0.396661 6.30267 0.00119089 7.2558 0 8.25L0 12C0.00119089 12.9942 0.396661 13.9473 1.09966 14.6503C1.80267 15.3533 2.7558 15.7488 3.75 15.75C3.75 16.3467 3.98705 16.919 4.40901 17.341C4.83097 17.7629 5.40326 18 6 18H12C12.5967 18 13.169 17.7629 13.591 17.341C14.0129 16.919 14.25 16.3467 14.25 15.75C15.2442 15.7488 16.1973 15.3533 16.9003 14.6503C17.6033 13.9473 17.9988 12.9942 18 12V8.25C17.9988 7.2558 17.6033 6.30267 16.9003 5.59966C16.1973 4.89666 15.2442 4.50119 14.25 4.5ZM5.25 3C5.25 2.60218 5.40804 2.22064 5.68934 1.93934C5.97064 1.65804 6.35218 1.5 6.75 1.5H11.25C11.6478 1.5 12.0294 1.65804 12.3107 1.93934C12.592 2.22064 12.75 2.60218 12.75 3V4.5H5.25V3ZM12.75 15.75C12.75 15.9489 12.671 16.1397 12.5303 16.2803C12.3897 16.421 12.1989 16.5 12 16.5H6C5.80109 16.5 5.61032 16.421 5.46967 16.2803C5.32902 16.1397 5.25 15.9489 5.25 15.75V12.75C5.25 12.5511 5.32902 12.3603 5.46967 12.2197C5.61032 12.079 5.80109 12 6 12H12C12.1989 12 12.3897 12.079 12.5303 12.2197C12.671 12.3603 12.75 12.5511 12.75 12.75V15.75ZM16.5 12C16.5 12.5967 16.2629 13.169 15.841 13.591C15.419 14.0129 14.8467 14.25 14.25 14.25V12.75C14.25 12.1533 14.0129 11.581 13.591 11.159C13.169 10.7371 12.5967 10.5 12 10.5H6C5.40326 10.5 4.83097 10.7371 4.40901 11.159C3.98705 11.581 3.75 12.1533 3.75 12.75V14.25C3.15326 14.25 2.58097 14.0129 2.15901 13.591C1.73705 13.169 1.5 12.5967 1.5 12V8.25C1.5 7.65326 1.73705 7.08097 2.15901 6.65901C2.58097 6.23705 3.15326 6 3.75 6H14.25C14.8467 6 15.419 6.23705 15.841 6.65901C16.2629 7.08097 16.5 7.65326 16.5 8.25V12Z" fill="#888888" />
                                                                                <path d="M13.5 7.5H12C11.8011 7.5 11.6103 7.57902 11.4697 7.71967C11.329 7.86032 11.25 8.05109 11.25 8.25C11.25 8.44891 11.329 8.63968 11.4697 8.78033C11.6103 8.92098 11.8011 9 12 9H13.5C13.6989 9 13.8897 8.92098 14.0303 8.78033C14.171 8.63968 14.25 8.44891 14.25 8.25C14.25 8.05109 14.171 7.86032 14.0303 7.71967C13.8897 7.57902 13.6989 7.5 13.5 7.5Z" fill="#888888" />
                                                                            </svg>
                                                                        </a>

                                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                                                                <path d="M10.7646 0.875C13.5404 1.18325 15.7334 3.37325 16.0446 6.149" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path d="M10.7646 3.53223C12.0929 3.79023 13.1309 4.82898 13.3896 6.15723" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.27364 8.35429C11.2654 11.3453 11.9441 7.88504 13.8489 9.78861C15.6854 11.6246 16.7417 11.9924 14.4141 14.3185C14.1227 14.5528 12.2709 17.3707 5.76335 10.8647C-0.745055 4.358 2.07117 2.50433 2.30546 2.21296C4.63782 -0.119616 5.00012 0.942037 6.83654 2.778C8.7406 4.68237 5.2819 5.36331 8.27364 8.35429Z" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg>
                                                                        </a>

                                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.875 6.87538C8.875 5.83943 8.03557 5 7.00038 5C5.96443 5 5.125 5.83943 5.125 6.87538C5.125 7.91057 5.96443 8.75 7.00038 8.75C8.03557 8.75 8.875 7.91057 8.875 6.87538Z" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99963 14.75C6.10078 14.75 1.375 10.9238 1.375 6.92247C1.375 3.78998 3.89283 1.25 6.99963 1.25C10.1064 1.25 12.625 3.78998 12.625 6.92247C12.625 10.9238 7.89849 14.75 6.99963 14.75Z" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">Bangladesh Computer Council,
                                                                        Agargoan</a>

                                                                    <span class="text-gray-500 fw-bold fs-7 d-block">Site Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status" class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                                                <path d="M14.25 4.5V3C14.25 2.20435 13.9339 1.44129 13.3713 0.87868C12.8087 0.316071 12.0456 0 11.25 0L6.75 0C5.95435 0 5.19129 0.316071 4.62868 0.87868C4.06607 1.44129 3.75 2.20435 3.75 3V4.5C2.7558 4.50119 1.80267 4.89666 1.09966 5.59966C0.396661 6.30267 0.00119089 7.2558 0 8.25L0 12C0.00119089 12.9942 0.396661 13.9473 1.09966 14.6503C1.80267 15.3533 2.7558 15.7488 3.75 15.75C3.75 16.3467 3.98705 16.919 4.40901 17.341C4.83097 17.7629 5.40326 18 6 18H12C12.5967 18 13.169 17.7629 13.591 17.341C14.0129 16.919 14.25 16.3467 14.25 15.75C15.2442 15.7488 16.1973 15.3533 16.9003 14.6503C17.6033 13.9473 17.9988 12.9942 18 12V8.25C17.9988 7.2558 17.6033 6.30267 16.9003 5.59966C16.1973 4.89666 15.2442 4.50119 14.25 4.5ZM5.25 3C5.25 2.60218 5.40804 2.22064 5.68934 1.93934C5.97064 1.65804 6.35218 1.5 6.75 1.5H11.25C11.6478 1.5 12.0294 1.65804 12.3107 1.93934C12.592 2.22064 12.75 2.60218 12.75 3V4.5H5.25V3ZM12.75 15.75C12.75 15.9489 12.671 16.1397 12.5303 16.2803C12.3897 16.421 12.1989 16.5 12 16.5H6C5.80109 16.5 5.61032 16.421 5.46967 16.2803C5.32902 16.1397 5.25 15.9489 5.25 15.75V12.75C5.25 12.5511 5.32902 12.3603 5.46967 12.2197C5.61032 12.079 5.80109 12 6 12H12C12.1989 12 12.3897 12.079 12.5303 12.2197C12.671 12.3603 12.75 12.5511 12.75 12.75V15.75ZM16.5 12C16.5 12.5967 16.2629 13.169 15.841 13.591C15.419 14.0129 14.8467 14.25 14.25 14.25V12.75C14.25 12.1533 14.0129 11.581 13.591 11.159C13.169 10.7371 12.5967 10.5 12 10.5H6C5.40326 10.5 4.83097 10.7371 4.40901 11.159C3.98705 11.581 3.75 12.1533 3.75 12.75V14.25C3.15326 14.25 2.58097 14.0129 2.15901 13.591C1.73705 13.169 1.5 12.5967 1.5 12V8.25C1.5 7.65326 1.73705 7.08097 2.15901 6.65901C2.58097 6.23705 3.15326 6 3.75 6H14.25C14.8467 6 15.419 6.23705 15.841 6.65901C16.2629 7.08097 16.5 7.65326 16.5 8.25V12Z" fill="#888888" />
                                                                                <path d="M13.5 7.5H12C11.8011 7.5 11.6103 7.57902 11.4697 7.71967C11.329 7.86032 11.25 8.05109 11.25 8.25C11.25 8.44891 11.329 8.63968 11.4697 8.78033C11.6103 8.92098 11.8011 9 12 9H13.5C13.6989 9 13.8897 8.92098 14.0303 8.78033C14.171 8.63968 14.25 8.44891 14.25 8.25C14.25 8.05109 14.171 7.86032 14.0303 7.71967C13.8897 7.57902 13.6989 7.5 13.5 7.5Z" fill="#888888" />
                                                                            </svg>
                                                                        </a>

                                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                                                                <path d="M10.7646 0.875C13.5404 1.18325 15.7334 3.37325 16.0446 6.149" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path d="M10.7646 3.53223C12.0929 3.79023 13.1309 4.82898 13.3896 6.15723" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.27364 8.35429C11.2654 11.3453 11.9441 7.88504 13.8489 9.78861C15.6854 11.6246 16.7417 11.9924 14.4141 14.3185C14.1227 14.5528 12.2709 17.3707 5.76335 10.8647C-0.745055 4.358 2.07117 2.50433 2.30546 2.21296C4.63782 -0.119616 5.00012 0.942037 6.83654 2.778C8.7406 4.68237 5.2819 5.36331 8.27364 8.35429Z" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg>
                                                                        </a>

                                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.875 6.87538C8.875 5.83943 8.03557 5 7.00038 5C5.96443 5 5.125 5.83943 5.125 6.87538C5.125 7.91057 5.96443 8.75 7.00038 8.75C8.03557 8.75 8.875 7.91057 8.875 6.87538Z" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99963 14.75C6.10078 14.75 1.375 10.9238 1.375 6.92247C1.375 3.78998 3.89283 1.25 6.99963 1.25C10.1064 1.25 12.625 3.78998 12.625 6.92247C12.625 10.9238 7.89849 14.75 6.99963 14.75Z" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input" type="checkbox" value="" checked="" data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">World Food Programme
                                                                        Bangladesh, Agargoan</a>

                                                                    <span class="text-gray-500 fw-bold fs-7 d-block">Site Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status" class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                                                <path d="M14.25 4.5V3C14.25 2.20435 13.9339 1.44129 13.3713 0.87868C12.8087 0.316071 12.0456 0 11.25 0L6.75 0C5.95435 0 5.19129 0.316071 4.62868 0.87868C4.06607 1.44129 3.75 2.20435 3.75 3V4.5C2.7558 4.50119 1.80267 4.89666 1.09966 5.59966C0.396661 6.30267 0.00119089 7.2558 0 8.25L0 12C0.00119089 12.9942 0.396661 13.9473 1.09966 14.6503C1.80267 15.3533 2.7558 15.7488 3.75 15.75C3.75 16.3467 3.98705 16.919 4.40901 17.341C4.83097 17.7629 5.40326 18 6 18H12C12.5967 18 13.169 17.7629 13.591 17.341C14.0129 16.919 14.25 16.3467 14.25 15.75C15.2442 15.7488 16.1973 15.3533 16.9003 14.6503C17.6033 13.9473 17.9988 12.9942 18 12V8.25C17.9988 7.2558 17.6033 6.30267 16.9003 5.59966C16.1973 4.89666 15.2442 4.50119 14.25 4.5ZM5.25 3C5.25 2.60218 5.40804 2.22064 5.68934 1.93934C5.97064 1.65804 6.35218 1.5 6.75 1.5H11.25C11.6478 1.5 12.0294 1.65804 12.3107 1.93934C12.592 2.22064 12.75 2.60218 12.75 3V4.5H5.25V3ZM12.75 15.75C12.75 15.9489 12.671 16.1397 12.5303 16.2803C12.3897 16.421 12.1989 16.5 12 16.5H6C5.80109 16.5 5.61032 16.421 5.46967 16.2803C5.32902 16.1397 5.25 15.9489 5.25 15.75V12.75C5.25 12.5511 5.32902 12.3603 5.46967 12.2197C5.61032 12.079 5.80109 12 6 12H12C12.1989 12 12.3897 12.079 12.5303 12.2197C12.671 12.3603 12.75 12.5511 12.75 12.75V15.75ZM16.5 12C16.5 12.5967 16.2629 13.169 15.841 13.591C15.419 14.0129 14.8467 14.25 14.25 14.25V12.75C14.25 12.1533 14.0129 11.581 13.591 11.159C13.169 10.7371 12.5967 10.5 12 10.5H6C5.40326 10.5 4.83097 10.7371 4.40901 11.159C3.98705 11.581 3.75 12.1533 3.75 12.75V14.25C3.15326 14.25 2.58097 14.0129 2.15901 13.591C1.73705 13.169 1.5 12.5967 1.5 12V8.25C1.5 7.65326 1.73705 7.08097 2.15901 6.65901C2.58097 6.23705 3.15326 6 3.75 6H14.25C14.8467 6 15.419 6.23705 15.841 6.65901C16.2629 7.08097 16.5 7.65326 16.5 8.25V12Z" fill="#888888" />
                                                                                <path d="M13.5 7.5H12C11.8011 7.5 11.6103 7.57902 11.4697 7.71967C11.329 7.86032 11.25 8.05109 11.25 8.25C11.25 8.44891 11.329 8.63968 11.4697 8.78033C11.6103 8.92098 11.8011 9 12 9H13.5C13.6989 9 13.8897 8.92098 14.0303 8.78033C14.171 8.63968 14.25 8.44891 14.25 8.25C14.25 8.05109 14.171 7.86032 14.0303 7.71967C13.8897 7.57902 13.6989 7.5 13.5 7.5Z" fill="#888888" />
                                                                            </svg>
                                                                        </a>

                                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                                                                <path d="M10.7646 0.875C13.5404 1.18325 15.7334 3.37325 16.0446 6.149" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path d="M10.7646 3.53223C12.0929 3.79023 13.1309 4.82898 13.3896 6.15723" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.27364 8.35429C11.2654 11.3453 11.9441 7.88504 13.8489 9.78861C15.6854 11.6246 16.7417 11.9924 14.4141 14.3185C14.1227 14.5528 12.2709 17.3707 5.76335 10.8647C-0.745055 4.358 2.07117 2.50433 2.30546 2.21296C4.63782 -0.119616 5.00012 0.942037 6.83654 2.778C8.7406 4.68237 5.2819 5.36331 8.27364 8.35429Z" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg>
                                                                        </a>

                                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.875 6.87538C8.875 5.83943 8.03557 5 7.00038 5C5.96443 5 5.125 5.83943 5.125 6.87538C5.125 7.91057 5.96443 8.75 7.00038 8.75C8.03557 8.75 8.875 7.91057 8.875 6.87538Z" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99963 14.75C6.10078 14.75 1.375 10.9238 1.375 6.92247C1.375 3.78998 3.89283 1.25 6.99963 1.25C10.1064 1.25 12.625 3.78998 12.625 6.92247C12.625 10.9238 7.89849 14.75 6.99963 14.75Z" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">Palli Karma-Sahayak Foundation
                                                                        (PKSF), Agargoan</a>

                                                                    <span class="text-gray-500 fw-bold fs-7 d-block">Site Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status" class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                                                <path d="M14.25 4.5V3C14.25 2.20435 13.9339 1.44129 13.3713 0.87868C12.8087 0.316071 12.0456 0 11.25 0L6.75 0C5.95435 0 5.19129 0.316071 4.62868 0.87868C4.06607 1.44129 3.75 2.20435 3.75 3V4.5C2.7558 4.50119 1.80267 4.89666 1.09966 5.59966C0.396661 6.30267 0.00119089 7.2558 0 8.25L0 12C0.00119089 12.9942 0.396661 13.9473 1.09966 14.6503C1.80267 15.3533 2.7558 15.7488 3.75 15.75C3.75 16.3467 3.98705 16.919 4.40901 17.341C4.83097 17.7629 5.40326 18 6 18H12C12.5967 18 13.169 17.7629 13.591 17.341C14.0129 16.919 14.25 16.3467 14.25 15.75C15.2442 15.7488 16.1973 15.3533 16.9003 14.6503C17.6033 13.9473 17.9988 12.9942 18 12V8.25C17.9988 7.2558 17.6033 6.30267 16.9003 5.59966C16.1973 4.89666 15.2442 4.50119 14.25 4.5ZM5.25 3C5.25 2.60218 5.40804 2.22064 5.68934 1.93934C5.97064 1.65804 6.35218 1.5 6.75 1.5H11.25C11.6478 1.5 12.0294 1.65804 12.3107 1.93934C12.592 2.22064 12.75 2.60218 12.75 3V4.5H5.25V3ZM12.75 15.75C12.75 15.9489 12.671 16.1397 12.5303 16.2803C12.3897 16.421 12.1989 16.5 12 16.5H6C5.80109 16.5 5.61032 16.421 5.46967 16.2803C5.32902 16.1397 5.25 15.9489 5.25 15.75V12.75C5.25 12.5511 5.32902 12.3603 5.46967 12.2197C5.61032 12.079 5.80109 12 6 12H12C12.1989 12 12.3897 12.079 12.5303 12.2197C12.671 12.3603 12.75 12.5511 12.75 12.75V15.75ZM16.5 12C16.5 12.5967 16.2629 13.169 15.841 13.591C15.419 14.0129 14.8467 14.25 14.25 14.25V12.75C14.25 12.1533 14.0129 11.581 13.591 11.159C13.169 10.7371 12.5967 10.5 12 10.5H6C5.40326 10.5 4.83097 10.7371 4.40901 11.159C3.98705 11.581 3.75 12.1533 3.75 12.75V14.25C3.15326 14.25 2.58097 14.0129 2.15901 13.591C1.73705 13.169 1.5 12.5967 1.5 12V8.25C1.5 7.65326 1.73705 7.08097 2.15901 6.65901C2.58097 6.23705 3.15326 6 3.75 6H14.25C14.8467 6 15.419 6.23705 15.841 6.65901C16.2629 7.08097 16.5 7.65326 16.5 8.25V12Z" fill="#888888" />
                                                                                <path d="M13.5 7.5H12C11.8011 7.5 11.6103 7.57902 11.4697 7.71967C11.329 7.86032 11.25 8.05109 11.25 8.25C11.25 8.44891 11.329 8.63968 11.4697 8.78033C11.6103 8.92098 11.8011 9 12 9H13.5C13.6989 9 13.8897 8.92098 14.0303 8.78033C14.171 8.63968 14.25 8.44891 14.25 8.25C14.25 8.05109 14.171 7.86032 14.0303 7.71967C13.8897 7.57902 13.6989 7.5 13.5 7.5Z" fill="#888888" />
                                                                            </svg>
                                                                        </a>

                                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                                                                <path d="M10.7646 0.875C13.5404 1.18325 15.7334 3.37325 16.0446 6.149" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path d="M10.7646 3.53223C12.0929 3.79023 13.1309 4.82898 13.3896 6.15723" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.27364 8.35429C11.2654 11.3453 11.9441 7.88504 13.8489 9.78861C15.6854 11.6246 16.7417 11.9924 14.4141 14.3185C14.1227 14.5528 12.2709 17.3707 5.76335 10.8647C-0.745055 4.358 2.07117 2.50433 2.30546 2.21296C4.63782 -0.119616 5.00012 0.942037 6.83654 2.778C8.7406 4.68237 5.2819 5.36331 8.27364 8.35429Z" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg>
                                                                        </a>

                                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.875 6.87538C8.875 5.83943 8.03557 5 7.00038 5C5.96443 5 5.125 5.83943 5.125 6.87538C5.125 7.91057 5.96443 8.75 7.00038 8.75C8.03557 8.75 8.875 7.91057 8.875 6.87538Z" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99963 14.75C6.10078 14.75 1.375 10.9238 1.375 6.92247C1.375 3.78998 3.89283 1.25 6.99963 1.25C10.1064 1.25 12.625 3.78998 12.625 6.92247C12.625 10.9238 7.89849 14.75 6.99963 14.75Z" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div class="form-check form-check-custom form-check-solid">
                                                                        <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">Lion Eye Institute &amp;
                                                                        Hospital</a>

                                                                    <span class="text-gray-500 fw-bold fs-7 d-block">Site Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                                                <path d="M14.25 4.5V3C14.25 2.20435 13.9339 1.44129 13.3713 0.87868C12.8087 0.316071 12.0456 0 11.25 0L6.75 0C5.95435 0 5.19129 0.316071 4.62868 0.87868C4.06607 1.44129 3.75 2.20435 3.75 3V4.5C2.7558 4.50119 1.80267 4.89666 1.09966 5.59966C0.396661 6.30267 0.00119089 7.2558 0 8.25L0 12C0.00119089 12.9942 0.396661 13.9473 1.09966 14.6503C1.80267 15.3533 2.7558 15.7488 3.75 15.75C3.75 16.3467 3.98705 16.919 4.40901 17.341C4.83097 17.7629 5.40326 18 6 18H12C12.5967 18 13.169 17.7629 13.591 17.341C14.0129 16.919 14.25 16.3467 14.25 15.75C15.2442 15.7488 16.1973 15.3533 16.9003 14.6503C17.6033 13.9473 17.9988 12.9942 18 12V8.25C17.9988 7.2558 17.6033 6.30267 16.9003 5.59966C16.1973 4.89666 15.2442 4.50119 14.25 4.5ZM5.25 3C5.25 2.60218 5.40804 2.22064 5.68934 1.93934C5.97064 1.65804 6.35218 1.5 6.75 1.5H11.25C11.6478 1.5 12.0294 1.65804 12.3107 1.93934C12.592 2.22064 12.75 2.60218 12.75 3V4.5H5.25V3ZM12.75 15.75C12.75 15.9489 12.671 16.1397 12.5303 16.2803C12.3897 16.421 12.1989 16.5 12 16.5H6C5.80109 16.5 5.61032 16.421 5.46967 16.2803C5.32902 16.1397 5.25 15.9489 5.25 15.75V12.75C5.25 12.5511 5.32902 12.3603 5.46967 12.2197C5.61032 12.079 5.80109 12 6 12H12C12.1989 12 12.3897 12.079 12.5303 12.2197C12.671 12.3603 12.75 12.5511 12.75 12.75V15.75ZM16.5 12C16.5 12.5967 16.2629 13.169 15.841 13.591C15.419 14.0129 14.8467 14.25 14.25 14.25V12.75C14.25 12.1533 14.0129 11.581 13.591 11.159C13.169 10.7371 12.5967 10.5 12 10.5H6C5.40326 10.5 4.83097 10.7371 4.40901 11.159C3.98705 11.581 3.75 12.1533 3.75 12.75V14.25C3.15326 14.25 2.58097 14.0129 2.15901 13.591C1.73705 13.169 1.5 12.5967 1.5 12V8.25C1.5 7.65326 1.73705 7.08097 2.15901 6.65901C2.58097 6.23705 3.15326 6 3.75 6H14.25C14.8467 6 15.419 6.23705 15.841 6.65901C16.2629 7.08097 16.5 7.65326 16.5 8.25V12Z" fill="#888888" />
                                                                                <path d="M13.5 7.5H12C11.8011 7.5 11.6103 7.57902 11.4697 7.71967C11.329 7.86032 11.25 8.05109 11.25 8.25C11.25 8.44891 11.329 8.63968 11.4697 8.78033C11.6103 8.92098 11.8011 9 12 9H13.5C13.6989 9 13.8897 8.92098 14.0303 8.78033C14.171 8.63968 14.25 8.44891 14.25 8.25C14.25 8.05109 14.171 7.86032 14.0303 7.71967C13.8897 7.57902 13.6989 7.5 13.5 7.5Z" fill="#888888" />
                                                                            </svg>
                                                                        </a>

                                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                                                                <path d="M10.7646 0.875C13.5404 1.18325 15.7334 3.37325 16.0446 6.149" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path d="M10.7646 3.53223C12.0929 3.79023 13.1309 4.82898 13.3896 6.15723" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.27364 8.35429C11.2654 11.3453 11.9441 7.88504 13.8489 9.78861C15.6854 11.6246 16.7417 11.9924 14.4141 14.3185C14.1227 14.5528 12.2709 17.3707 5.76335 10.8647C-0.745055 4.358 2.07117 2.50433 2.30546 2.21296C4.63782 -0.119616 5.00012 0.942037 6.83654 2.778C8.7406 4.68237 5.2819 5.36331 8.27364 8.35429Z" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg>
                                                                        </a>

                                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.875 6.87538C8.875 5.83943 8.03557 5 7.00038 5C5.96443 5 5.125 5.83943 5.125 6.87538C5.125 7.91057 5.96443 8.75 7.00038 8.75C8.03557 8.75 8.875 7.91057 8.875 6.87538Z" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99963 14.75C6.10078 14.75 1.375 10.9238 1.375 6.92247C1.375 3.78998 3.89283 1.25 6.99963 1.25C10.1064 1.25 12.625 3.78998 12.625 6.92247C12.625 10.9238 7.89849 14.75 6.99963 14.75Z" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="kt_accordion_1_header_2">
                                            <button class="font-normal accordion-button fs-4 text-muted collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_2" aria-expanded="false" aria-controls="kt_accordion_1_body_2">
                                                Thursday April 10th, 2025
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_1_body_2" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1" style="">
                                            <div class="accordion-body">...</div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="kt_accordion_1_header_3">
                                            <button class="font-normal accordion-button fs-4 text-muted collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_3" aria-expanded="false" aria-controls="kt_accordion_1_body_3">
                                                Saturday April 12th, 2025
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_1_body_3" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_3" data-bs-parent="#kt_accordion_1" style="">
                                            <div class="accordion-body">...</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Accordion-->
                            </div>

                            <div class="tab-pane fade" id="kt_timeline_widget_2_tab_2" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table align-middle gs-0 gy-4">
                                        <thead>
                                            <tr>
                                                <th class="p-0 w-10px"></th>
                                                <th class="p-0 w-25px"></th>
                                                <th class="p-0 min-w-400px"></th>
                                                <th class="p-0 min-w-100px"></th>
                                                <th class="p-0 min-w-125px"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                </td>

                                                <td class="ps-0">
                                                    <div class="form-check form-check-custom form-check-success form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" checked="" data-kt-element="checkbox">
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">Book p. 77-85, read &amp; complete
                                                        tasks 1-6 on p. 85</a>

                                                    <span class="text-gray-500 fw-bold fs-7 d-block">Physics</span>
                                                </td>

                                                <td class="text-end">
                                                    <span data-kt-element="status" class="badge badge-light-success">Done</span>
                                                </td>

                                                <td class="text-end">
                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-print fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-phone fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                            <i class="fa-solid fa-location-dot fs-3" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                </td>

                                                <td class="ps-0">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">Workbook p. 17, tasks 1-6</a>

                                                    <span class="text-gray-500 fw-bold fs-7 d-block">Mathematics</span>
                                                </td>

                                                <td class="text-end">
                                                    <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end">
                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-print fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-phone fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                            <i class="fa-solid fa-location-dot fs-3" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                </td>

                                                <td class="ps-0">
                                                    <div class="form-check form-check-custom form-check-success form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" checked="" data-kt-element="checkbox">
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">Learn paragraph p. 99, Exercise
                                                        1,2,3Scoping &amp; Estimations</a>

                                                    <span class="text-gray-500 fw-bold fs-7 d-block">Chemistry</span>
                                                </td>

                                                <td class="text-end">
                                                    <span data-kt-element="status" class="badge badge-light-success">Done</span>
                                                </td>

                                                <td class="text-end">
                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-print fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-phone fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                            <i class="fa-solid fa-location-dot fs-3" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                </td>

                                                <td class="ps-0">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">Write essay 1000 words “WW2 results”</a>

                                                    <span class="text-gray-500 fw-bold fs-7 d-block">History</span>
                                                </td>

                                                <td class="text-end">
                                                    <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end">
                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-print fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-phone fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                            <i class="fa-solid fa-location-dot fs-3" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="kt_timeline_widget_2_tab_3" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table align-middle gs-0 gy-4">
                                        <thead>
                                            <tr>
                                                <th class="p-0 w-10px"></th>
                                                <th class="p-0 w-25px"></th>
                                                <th class="p-0 min-w-400px"></th>
                                                <th class="p-0 min-w-100px"></th>
                                                <th class="p-0 min-w-125px"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                </td>

                                                <td class="ps-0">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">Workbook p. 17, tasks 1-6</a>

                                                    <span class="text-gray-500 fw-bold fs-7 d-block">Mathematics</span>
                                                </td>

                                                <td class="text-end">
                                                    <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end">
                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-print fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-phone fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                            <i class="fa-solid fa-location-dot fs-3" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                </td>

                                                <td class="ps-0">
                                                    <div class="form-check form-check-custom form-check-success form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" checked="" data-kt-element="checkbox">
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">Learn paragraph p. 99, Exercise
                                                        1,2,3Scoping &amp; Estimations</a>

                                                    <span class="text-gray-500 fw-bold fs-7 d-block">Chemistry</span>
                                                </td>

                                                <td class="text-end">
                                                    <span data-kt-element="status" class="badge badge-light-success">Done</span>
                                                </td>

                                                <td class="text-end">
                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-print fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-phone fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                            <i class="fa-solid fa-location-dot fs-3" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                </td>

                                                <td class="ps-0">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">Write essay 1000 words “WW2 results”</a>

                                                    <span class="text-gray-500 fw-bold fs-7 d-block">History</span>
                                                </td>

                                                <td class="text-end">
                                                    <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end">
                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-print fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-phone fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                            <i class="fa-solid fa-location-dot fs-3" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                </td>

                                                <td class="ps-0">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">Internal conflicts in Philip Larkin
                                                        poems, read p 380-515</a>

                                                    <span class="text-gray-500 fw-bold fs-7 d-block">English Language</span>
                                                </td>

                                                <td class="text-end">
                                                    <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end">
                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-print fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-phone fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                            <i class="fa-solid fa-location-dot fs-3" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_timeline_widget_2_tab_4" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table align-middle gs-0 gy-4">
                                        <thead>
                                            <tr>
                                                <th class="p-0 w-10px"></th>
                                                <th class="p-0 w-25px"></th>
                                                <th class="p-0 min-w-400px"></th>
                                                <th class="p-0 min-w-100px"></th>
                                                <th class="p-0 min-w-125px"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                </td>

                                                <td class="ps-0">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">Workbook p. 17, tasks 1-6</a>

                                                    <span class="text-gray-500 fw-bold fs-7 d-block">Mathematics</span>
                                                </td>

                                                <td class="text-end">
                                                    <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end">
                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-print fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-phone fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                            <i class="fa-solid fa-location-dot fs-3" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                </td>

                                                <td class="ps-0">
                                                    <div class="form-check form-check-custom form-check-success form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" checked="" data-kt-element="checkbox">
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">Learn paragraph p. 99, Exercise
                                                        1,2,3Scoping &amp; Estimations</a>

                                                    <span class="text-gray-500 fw-bold fs-7 d-block">Chemistry</span>
                                                </td>

                                                <td class="text-end">
                                                    <span data-kt-element="status" class="badge badge-light-success">Done</span>
                                                </td>

                                                <td class="text-end">
                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-print fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-phone fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                            <i class="fa-solid fa-location-dot fs-3" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                </td>

                                                <td class="ps-0">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">Write essay 1000 words “WW2 results”</a>

                                                    <span class="text-gray-500 fw-bold fs-7 d-block">History</span>
                                                </td>

                                                <td class="text-end">
                                                    <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end">
                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-print fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-phone fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                            <i class="fa-solid fa-location-dot fs-3" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                </td>

                                                <td class="ps-0">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="#" class="text-gray-800 text-hover-primary fw-normal fs-6">Internal conflicts in Philip Larkin
                                                        poems, read p 380-515</a>

                                                    <span class="text-gray-500 fw-bold fs-7 d-block">English Language</span>
                                                </td>

                                                <td class="text-end">
                                                    <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                </td>

                                                <td class="text-end">
                                                    <div class="flex-shrink-0 d-flex justify-content-end">
                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-print fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                            <i class="fa-solid fa-phone fs-3" aria-hidden="true"><span class="path1"></span><span class="path2"></span></i>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                            <i class="fa-solid fa-location-dot fs-3" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
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