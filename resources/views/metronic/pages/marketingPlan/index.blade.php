<x-admin-app-layout :title="'Marketing Plan'">
    <div class="px-0 container-fluid">
        <div class="mb-5 row">
            <div class="col">
                <div class="shadow-none card card-flush card-rounded ">
                    <div class="d-flex justify-content-center align-items-center h-140px">
                        <div>
                            <img class="img-fluid rounded-circle h-100px w-100px" style="border: 2px solid #296088;"
                                src="https://picsum.photos/id/1/200/300" alt="">
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
                            <p class="mb-0 optional-color" style="font-size: 28px;"><span class="text-muted">Year</span>
                                {{ date('Y') }}</p>
                        </div>
                        <div class="p-8 text-start pe-0">
                            <p class="mb-2 text-black">Check Monthly Information</p>
                            <div>
                                <select class="form-select form-select-sm" data-control="select2" data-placeholder="Month"
                                    name="month" id="filterMonth">
                                    @foreach ($months as $month)
                                        <option value="{{ $month }}" @selected(\Carbon\Carbon::now()->format('F') === $month)>{{ $month }}</option>
                                    @endforeach
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
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary active"
                                    data-bs-toggle="pill" href="#site_visit" aria-selected="true"
                                    role="tab">
                                    <span class="nav-text fw-semibold fs-4">
                                        Site Visit
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary"
                                    data-bs-toggle="pill" href="#client_visit" aria-selected="false"
                                    tabindex="-1" role="tab">
                                    <span class="nav-text fw-semibold fs-4">
                                        Client Visit
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary"
                                    data-bs-toggle="pill" href="#telephone" aria-selected="false"
                                    tabindex="-1" role="tab">
                                    <span class="nav-text fw-semibold fs-4">
                                        Telephone
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary"
                                    data-bs-toggle="pill" href="#email" aria-selected="false"
                                    tabindex="-1" role="tab">
                                    <span class="nav-text fw-semibold fs-4">
                                        Email
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary"
                                    data-bs-toggle="pill" href="#social" aria-selected="false"
                                    tabindex="-1" role="tab">
                                    <span class="nav-text fw-semibold fs-4">
                                        Social
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="site_visit" role="tabpanel">
                                <!--begin::Accordion-->
                                <div class="accordion" id="kt_accordion_1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                            <button class="font-normal accordion-button fs-4 text-muted"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#kt_accordion_1_body_1" aria-expanded="true"
                                                aria-controls="kt_accordion_1_body_1">
                                                Wednesday April 9th, 2025
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show"
                                            aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1"
                                            style="">
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
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            checked="" data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Islamic
                                                                        Foundation Bangladesh,
                                                                        Agargoan
                                                                    </a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Bangladesh
                                                                        Computer Council,
                                                                        Agargoan</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            checked="" data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">World
                                                                        Food Programme
                                                                        Bangladesh, Agargoan</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Palli
                                                                        Karma-Sahayak Foundation
                                                                        (PKSF), Agargoan</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Lion
                                                                        Eye Institute &amp;
                                                                        Hospital</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-primary">In
                                                                        Process</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
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
                                <!--end::Accordion-->
                            </div>

                            <div class="tab-pane fade" id="client_visit" role="tabpanel">
                                <!--begin::Accordion-->
                                <div class="accordion" id="kt_accordion_1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                            <button class="font-normal accordion-button fs-4 text-muted"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#kt_accordion_1_body_1" aria-expanded="true"
                                                aria-controls="kt_accordion_1_body_1">
                                                Wednesday April 9th, 2025
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show"
                                            aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1"
                                            style="">
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
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            checked="" data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Islamic
                                                                        Foundation Bangladesh,
                                                                        Agargoan
                                                                    </a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Bangladesh
                                                                        Computer Council,
                                                                        Agargoan</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            checked="" data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">World
                                                                        Food Programme
                                                                        Bangladesh, Agargoan</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Palli
                                                                        Karma-Sahayak Foundation
                                                                        (PKSF), Agargoan</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Lion
                                                                        Eye Institute &amp;
                                                                        Hospital</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-primary">In
                                                                        Process</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
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
                                <!--end::Accordion-->
                            </div>

                            <div class="tab-pane fade" id="telephone" role="tabpanel">
                                <!--begin::Accordion-->
                                <div class="accordion" id="kt_accordion_1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                            <button class="font-normal accordion-button fs-4 text-muted"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#kt_accordion_1_body_1" aria-expanded="true"
                                                aria-controls="kt_accordion_1_body_1">
                                                Wednesday April 9th, 2025
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show"
                                            aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1"
                                            style="">
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
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            checked="" data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Islamic
                                                                        Foundation Bangladesh,
                                                                        Agargoan
                                                                    </a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Bangladesh
                                                                        Computer Council,
                                                                        Agargoan</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            checked="" data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">World
                                                                        Food Programme
                                                                        Bangladesh, Agargoan</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Palli
                                                                        Karma-Sahayak Foundation
                                                                        (PKSF), Agargoan</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Lion
                                                                        Eye Institute &amp;
                                                                        Hospital</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-primary">In
                                                                        Process</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
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
                                <!--end::Accordion-->
                            </div>
                            <div class="tab-pane fade" id="email" role="tabpanel">
                                <!--begin::Accordion-->
                                <div class="accordion" id="kt_accordion_1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                            <button class="font-normal accordion-button fs-4 text-muted"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#kt_accordion_1_body_1" aria-expanded="true"
                                                aria-controls="kt_accordion_1_body_1">
                                                Wednesday April 9th, 2025
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show"
                                            aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1"
                                            style="">
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
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            checked="" data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Islamic
                                                                        Foundation Bangladesh,
                                                                        Agargoan
                                                                    </a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Bangladesh
                                                                        Computer Council,
                                                                        Agargoan</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            checked="" data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">World
                                                                        Food Programme
                                                                        Bangladesh, Agargoan</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Palli
                                                                        Karma-Sahayak Foundation
                                                                        (PKSF), Agargoan</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Lion
                                                                        Eye Institute &amp;
                                                                        Hospital</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-primary">In
                                                                        Process</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
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
                                <!--end::Accordion-->
                            </div>
                            <div class="tab-pane fade" id="social" role="tabpanel">
                                <!--begin::Accordion-->
                                <div class="accordion" id="kt_accordion_1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                            <button class="font-normal accordion-button fs-4 text-muted"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#kt_accordion_1_body_1" aria-expanded="true"
                                                aria-controls="kt_accordion_1_body_1">
                                                Wednesday April 9th, 2025
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show"
                                            aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1"
                                            style="">
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
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            checked="" data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Islamic
                                                                        Foundation Bangladesh,
                                                                        Agargoan
                                                                    </a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Bangladesh
                                                                        Computer Council,
                                                                        Agargoan</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            checked="" data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">World
                                                                        Food Programme
                                                                        Bangladesh, Agargoan</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid form-check-success">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Palli
                                                                        Karma-Sahayak Foundation
                                                                        (PKSF), Agargoan</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-success">Done</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span data-kt-element="bullet"
                                                                        class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                                </td>

                                                                <td class="ps-0">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            data-kt-element="checkbox">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fw-normal fs-6">Lion
                                                                        Eye Institute &amp;
                                                                        Hospital</a>

                                                                    <span
                                                                        class="text-gray-500 fw-bold fs-7 d-block">Site
                                                                        Visit</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <span data-kt-element="status"
                                                                        class="badge badge-light-primary">In
                                                                        Process</span>
                                                                </td>

                                                                <td class="text-end">
                                                                    <div
                                                                        class="flex-shrink-0 d-flex justify-content-end">
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                            <i class="fa-solid fa-phone-volume"></i>
                                                                        </a>

                                                                        <a href="#"
                                                                            class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                            <i class="fa-solid fa-location-dot"></i>
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
                                <!--end::Accordion-->
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
