<x-admin-app-layout :title="'Sales Forecast'">
    <style>
        .nav.nav-pills.nav-pills-custom .nav-link,
        .nav.nav-pills.nav-pills-custom .show>.nav-link {
            border: 1px solid #e4e6ef !important;
            background-color: white;
        }
    </style>
    <div class="px-0 container-fluid">
        <div class="mb-5 row" style="overflow: hidden;">
            <div class="col-xl-3">
                <div class="shadow-none card card-flush card-rounded" style="background-color: #296088;">
                    <div class="p-0 py-2 card-body">
                        <div class="p-5 text-center me-3">
                            <h1 class="text-white" style="font-size: 57.801px;">Sales
                                Forecast</h1>
                            <p class="mb-0 text-white">Year {{ date('Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5 card bg-gr-b">
                            <div class="p-5 card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="me-3 w-100">
                                        <select name="product_type" data-control="select2"
                                            class="form-select form-select-sm form-select-solid w-100" required>
                                            <option value="" disabled selected>Select Country</option>
                                            <option value="usa">United States</option>
                                            <option value="uk">United Kingdom</option>
                                            <option value="canada">Canada</option>
                                            <option value="australia">Australia</option>
                                            <option value="germany">Germany</option>
                                            <option value="bangladesh">Bangladesh</option>
                                            <option value="india">India</option>
                                        </select>
                                    </div>
                                    <div class="me-3 w-100">
                                        <select name="product_type" data-control="select2"
                                            class="form-select form-select-sm form-select-solid w-100" required>
                                            <option value="" disabled selected>Select Salesperson</option>
                                            <option value="admin">Admin</option>
                                            <option value="manager">Manager</option>
                                            <option value="developer">Developer</option>
                                            <option value="designer">Designer</option>
                                            <option value="student">Student</option>
                                            <option value="customer">Customer</option>
                                        </select>
                                    </div>
                                    <div class="me-3 w-100">
                                        <select name="product_type" data-control="select2"
                                            class="form-select form-select-sm form-select-solid w-100" required>
                                            <option value="" disabled selected>Select Time Period</option>
                                            <option value="admin">Month</option>
                                            <option value="manager">Quarter</option>
                                            <option value="developer">YTD</option>
                                        </select>
                                    </div>
                                    <div class="py-2 d-flex align-items-center ms-3 rounded-2">
                                        <div class="form-check form-check-custom form-check-solid form-check-sm me-3">
                                            <input class="form-check-input filterCountry" type="radio" name="country"
                                                value="bangladesh" id="bangladesh" checked>
                                            <label class="form-check-label pe-3" for="bangladesh">
                                                Bangladesh
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom form-check-solid form-check-sm me-3">
                                            <input class="form-check-input filterCountry" type="radio" name="country"
                                                value="singapore" id="singapore">
                                            <label class="form-check-label pe-3" for="singapore">
                                                Singapore
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom form-check-solid form-check-sm me-3">
                                            <input class="form-check-input filterCountry" type="radio" name="country"
                                                value="portugal" id="portugal">
                                            <label class="form-check-label pe-3" for="portugal">
                                                Portugal
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="shadow-none card card-flush card-rounded" style="background-color: #FFCD94;">
                            <div class="p-0 py-4 card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <div class="p-3 bg-white rounded-circle ms-10">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                viewBox="0 0 30 30" fill="none">
                                                <path
                                                    d="M19.3769 12.2926L16.6695 15L19.3769 17.7074C19.5983 17.9288 19.7227 18.2291 19.7227 18.5422C19.7227 18.8553 19.5983 19.1555 19.3769 19.3769C19.1555 19.5983 18.8552 19.7227 18.5421 19.7227C18.229 19.7227 17.9288 19.5983 17.7074 19.3769L15 16.6695L12.2926 19.3769C12.1832 19.487 12.0531 19.5743 11.9098 19.6339C11.7666 19.6934 11.613 19.7241 11.4578 19.7241C11.3026 19.7241 11.149 19.6934 11.0058 19.6339C10.8625 19.5743 10.7324 19.487 10.623 19.3769C10.5133 19.2674 10.4262 19.1373 10.3668 18.994C10.3074 18.8508 10.2768 18.6972 10.2768 18.5422C10.2768 18.3871 10.3074 18.2336 10.3668 18.0903C10.4262 17.9471 10.5133 17.817 10.623 17.7074L13.3304 15L10.623 12.2926C10.4016 12.0712 10.2773 11.7709 10.2773 11.4578C10.2773 11.1447 10.4016 10.8445 10.623 10.6231C10.8444 10.4017 11.1447 10.2773 11.4578 10.2773C11.7709 10.2773 12.0712 10.4017 12.2926 10.6231L15 13.3305L17.7074 10.6231C17.9288 10.4017 18.229 10.2773 18.5421 10.2773C18.8552 10.2773 19.1555 10.4017 19.3769 10.6231C19.5983 10.8445 19.7227 11.1447 19.7227 11.4578C19.7227 11.7709 19.5983 12.0712 19.3769 12.2926ZM29.1686 15C29.1686 22.8128 22.8128 29.1687 15 29.1687C7.18713 29.1687 0.831299 22.8128 0.831299 15C0.831299 7.18716 7.18713 0.831329 15 0.831329C22.8128 0.831329 29.1686 7.18716 29.1686 15ZM26.8072 15C26.8072 8.4895 21.5105 3.19278 15 3.19278C8.48947 3.19278 3.19274 8.4895 3.19274 15C3.19274 21.5105 8.48947 26.8072 15 26.8072C21.5105 26.8072 26.8072 21.5105 26.8072 15Z"
                                                    fill="#F0A857" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="p-4 text-start me-3">
                                        <p class="mb-0 text-black fw-bold fs-5">Closed Deals</p>
                                        <h4 class="pt-3 text-black" style="font-size: 28px;">1.25M $</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="shadow-none card card-flush card-rounded" style="background-color: #CFC4FF;">
                            <div class="p-0 py-4 card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <div class="p-3 bg-white rounded-circle ms-10">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                viewBox="0 0 30 30" fill="none">
                                                <path
                                                    d="M14.7501 0.201813C6.72798 0.201813 0.201904 6.72789 0.201904 14.75C0.201904 22.7721 6.72798 29.2982 14.7501 29.2982H29.2983V14.75C29.2983 6.72789 22.7722 0.201813 14.7501 0.201813ZM26.8736 26.8735H14.7501C8.0652 26.8735 2.6266 21.4349 2.6266 14.75C2.6266 8.06511 8.0652 2.62651 14.7501 2.62651C21.435 2.62651 26.8736 8.06511 26.8736 14.75V26.8735ZM9.9007 9.90061H13.5377V15.9624C13.5377 18.6368 11.3628 20.8118 8.68835 20.8118V18.3871C10.0256 18.3871 11.1131 17.2996 11.1131 15.9624H7.476V12.3253C7.476 10.9881 8.56348 9.90061 9.9007 9.90061ZM18.3871 9.90061H22.0242V15.9624C22.0242 18.6368 19.8492 20.8118 17.1748 20.8118V18.3871C18.512 18.3871 19.5995 17.2996 19.5995 15.9624H15.9624V12.3253C15.9624 10.9881 17.0499 9.90061 18.3871 9.90061Z"
                                                    fill="#8085E4" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="p-4 text-start me-3">
                                        <p class="mb-0 text-black fw-bold fs-5">Quoted</p>
                                        <h4 class="pt-3 text-black" style="font-size: 28px;">1.25M $</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="shadow-none card card-flush card-rounded bg-gr-g">
                            <div class="p-0 py-4 card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <div class="p-3 bg-white rounded-circle ms-10">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                viewBox="0 0 30 30" fill="none">
                                                <path
                                                    d="M13.8193 12.6386V13.8193C13.8193 14.1324 13.6949 14.4327 13.4734 14.6542C13.252 14.8756 12.9517 15 12.6385 15H6.73491C6.42177 15 6.12145 14.8756 5.90002 14.6542C5.67859 14.4327 5.55419 14.1324 5.55419 13.8193V12.6386C5.55419 12.3254 5.67859 12.0251 5.90002 11.8037C6.12145 11.5822 6.42177 11.4578 6.73491 11.4578H12.6385C12.9517 11.4578 13.252 11.5822 13.4734 11.8037C13.6949 12.0251 13.8193 12.3254 13.8193 12.6386ZM29.1686 8.50603V20.9036C29.1692 21.111 29.1151 21.3148 29.0117 21.4946C28.9083 21.6743 28.7593 21.8236 28.5798 21.9273C28.4002 22.0311 28.1965 22.0856 27.9891 22.0854C27.7817 22.0852 27.5781 22.0302 27.3987 21.9261L24.8366 20.4502L22.7502 21.8777C22.6225 21.9657 22.4786 22.0275 22.3269 22.0596C22.1751 22.0918 22.0185 22.0936 21.8661 22.0649C21.7137 22.0363 21.5684 21.9778 21.4387 21.8927C21.3089 21.8077 21.1973 21.6979 21.1102 21.5695C21.0227 21.4415 20.9612 21.2976 20.9293 21.1458C20.8974 20.9941 20.8958 20.8375 20.9244 20.6851C20.953 20.5327 21.0113 20.3874 21.0961 20.2576C21.1809 20.1277 21.2904 20.0159 21.4184 19.9283L24.1163 18.0817C24.2996 17.9558 24.5147 17.8845 24.7369 17.8759C24.959 17.8673 25.1791 17.9219 25.3714 18.0333L26.8072 18.8598V8.50603C26.8072 5.57665 24.4233 3.19278 21.4939 3.19278C20.2258 3.18818 18.9985 3.6412 18.0374 4.46865C17.0764 5.2961 16.446 6.44245 16.2622 7.69723C16.9648 8.18495 17.5391 8.83533 17.9361 9.59293C18.3331 10.3505 18.541 11.1929 18.5421 12.0482V23.8554C18.5421 26.7848 16.1583 29.1687 13.2289 29.1687H6.14455C4.73587 29.1671 3.38533 28.6068 2.38924 27.6107C1.39315 26.6146 0.832861 25.2641 0.831299 23.8554L0.831299 12.0482C0.831299 10.2098 1.76997 8.58868 3.19274 7.63465V6.73494C3.19274 3.47969 5.84111 0.831329 9.09636 0.831329H21.4939C25.7257 0.831329 29.1686 4.27432 29.1686 8.50603ZM16.1807 12.0482C16.1807 10.42 14.8571 9.09639 13.2289 9.09639H6.14455C5.36188 9.09701 4.61144 9.40821 4.058 9.96164C3.50456 10.5151 3.19337 11.2655 3.19274 12.0482V23.8554C3.19274 25.4836 4.51634 26.8072 6.14455 26.8072H13.2289C14.8571 26.8072 16.1807 25.4836 16.1807 23.8554V12.0482ZM14.0129 6.81405C14.3127 5.453 14.9805 4.20038 15.9434 3.19278H9.09636C7.14344 3.19278 5.55419 4.78203 5.55419 6.73494V6.79516C5.75019 6.77273 5.94265 6.73494 6.14455 6.73494H13.2289C13.4969 6.73494 13.7555 6.77509 14.0129 6.81405ZM12.6385 17.3614H11.4578C11.1447 17.3614 10.8443 17.4858 10.6229 17.7073C10.4015 17.9287 10.2771 18.229 10.2771 18.5422C10.2771 18.8553 10.4015 19.1556 10.6229 19.3771C10.8443 19.5985 11.1447 19.7229 11.4578 19.7229H12.6385C12.9517 19.7229 13.252 19.5985 13.4734 19.3771C13.6949 19.1556 13.8193 18.8553 13.8193 18.5422C13.8193 18.229 13.6949 17.9287 13.4734 17.7073C13.252 17.4858 12.9517 17.3614 12.6385 17.3614ZM12.6385 22.0843H11.4578C11.1447 22.0843 10.8443 22.2087 10.6229 22.4302C10.4015 22.6516 10.2771 22.9519 10.2771 23.2651C10.2771 23.5782 10.4015 23.8785 10.6229 24.1C10.8443 24.3214 11.1447 24.4458 11.4578 24.4458H12.6385C12.9517 24.4458 13.252 24.3214 13.4734 24.1C13.6949 23.8785 13.8193 23.5782 13.8193 23.2651C13.8193 22.9519 13.6949 22.6516 13.4734 22.4302C13.252 22.2087 12.9517 22.0843 12.6385 22.0843ZM7.91564 17.3614H6.73491C6.42177 17.3614 6.12145 17.4858 5.90002 17.7073C5.67859 17.9287 5.55419 18.229 5.55419 18.5422C5.55419 18.8553 5.67859 19.1556 5.90002 19.3771C6.12145 19.5985 6.42177 19.7229 6.73491 19.7229H7.91564C8.22878 19.7229 8.52911 19.5985 8.75053 19.3771C8.97196 19.1556 9.09636 18.8553 9.09636 18.5422C9.09636 18.229 8.97196 17.9287 8.75053 17.7073C8.52911 17.4858 8.22878 17.3614 7.91564 17.3614ZM7.91564 22.0843H6.73491C6.42177 22.0843 6.12145 22.2087 5.90002 22.4302C5.67859 22.6516 5.55419 22.9519 5.55419 23.2651C5.55419 23.5782 5.67859 23.8785 5.90002 24.1C6.12145 24.3214 6.42177 24.4458 6.73491 24.4458H7.91564C8.22878 24.4458 8.52911 24.3214 8.75053 24.1C8.97196 23.8785 9.09636 23.5782 9.09636 23.2651C9.09636 22.9519 8.97196 22.6516 8.75053 22.4302C8.52911 22.2087 8.22878 22.0843 7.91564 22.0843Z"
                                                    fill="#4984AE" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="p-4 text-start me-3">
                                        <p class="mb-0 text-black fw-bold fs-5">Weighted Forecast</p>
                                        <h4 class="pt-3 text-black" style="font-size: 28px;">70 %</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5 row">
            <div class="col-xl-4">
                <div class="shadow-none card card-flush h-xl-100 bg-gr-b">
                    <div class="mb-5 card-header pt-7">
                        <div>
                            <h3 class="card-title align-items-start flex-column">
                                <span class="text-gray-800 card-label fw-bold">Contribution</span>
                            </h3>
                            <span class="mt-1 text-gray-500">Last 30 days</span>
                        </div>

                        <div class="card-toolbar">
                            <div class="gap-2 d-flex align-items-center">
                                <img
                                    src="https://flagcdn.com/w20/bd.png"
                                    alt="Bangladesh Flag"
                                    class="object-cover shadow-sm rounded-1 w-40px">
                                <img
                                    src="https://flagcdn.com/w20/sg.png"
                                    alt="Bangladesh Flag"
                                    class="object-cover shadow-sm rounded-1 w-40px">
                                <img
                                    src="https://flagcdn.com/w20/pt.png"
                                    alt="Bangladesh Flag"
                                    class="object-cover shadow-sm rounded-1 w-40px">
                            </div>
                        </div>
                    </div>

                    <div class="pt-0 card-body d-flex justify-content-between flex-column">
                        <div class="flex-wrap gap-5 mb-10 d-flex d-grid">
                            <div
                                class="border-gray-300 border-end-dashed border-end pe-xxl-7 me-xxl-5">
                                <div class="mb-2 d-flex">
                                    <span class="text-gray-500 fs-4 fw-semibold me-1">$</span>
                                    <span class="text-gray-800 fs-2hx fw-bold me-2 lh-1 ls-n2">8,035</span>
                                </div>

                                <span class="text-gray-500 fs-6 fw-semibold">Product</span>
                            </div>

                            <div class="m-0">
                                <div class="mb-2 d-flex align-items-center">
                                    <span class="text-gray-500 fs-4 fw-semibold align-self-start me-1">$</span>

                                    <span class="text-gray-800 fs-2hx fw-bold me-2 lh-1 ls-n2">4,684</span>

                                    <span class="badge badge-light-success fs-base">
                                        <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span class="path1"></span><span class="path2"></span></i>
                                        4.5%
                                    </span>
                                </div>

                                <span class="text-gray-500 fs-6 fw-semibold">Category</span>
                            </div>
                        </div>

                        <div id="kt_charts_widget_30_chart" class="w-100 h-200px"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="shadow-none card card-flush h-xl-100 bg-gr-g">
                    <div class="card-header pt-7">
                        <div>
                            <h3 class="card-title align-items-start flex-column">
                                <span class="text-gray-900 card-label fw-bold">Sales Statistics</span>
                            </h3>
                            <span>
                                Forecast vs
                                Actual vs
                                Target
                            </span>
                        </div>
                        <div class="card-toolbar">
                            <select name="month" data-control="select2"
                                class="form-select form-select-sm form-select-solid me-3" required>
                                <option value="" disabled>Select Month</option>
                                <option value="january" selected>January</option>
                                <option value="february">February</option>
                                <option value="march">March</option>
                                <option value="april">April</option>
                                <option value="may">May</option>
                                <option value="june">June</option>
                                <option value="july">July</option>
                                <option value="august">August</option>
                                <option value="september">September</option>
                                <option value="october">October</option>
                                <option value="november">November</option>
                                <option value="december">December</option>
                            </select>
                        </div>

                    </div>
                    <div class="card-body">
                        <div id="kt_charts_widget_16_chart" class="w-100 h-350px"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card card-flush h-md-100 bg-gr-b">
                    <div class="card-header pt-7 align-items-center">
                        <div>
                            <h3 class="card-title align-items-start flex-column w-100">
                                <span class="text-gray-900 card-label fw-bold">Country Wise Pipeline</span>
                            </h3>
                        </div>

                        <!-- Tabs -->
                        <ul class="nav nav-tabs nav-line-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link show active" data-bs-toggle="tab" href="#quoted_tab" role="tab">Quoted</a>
                            </li>
                            <li class="p-0 nav-item ms-0">
                                <a class="nav-link" data-bs-toggle="tab" href="#closed_tab" role="tab">Closed</a>
                            </li>
                            <li class="p-0 nav-item ms-0">
                                <a class="nav-link" data-bs-toggle="tab" href="#lost_tab" role="tab">Lost</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="tab-content flex-grow-1">
                            <!-- Quoted Tab -->
                            <div class="tab-pane fade show active" id="quoted_tab" role="tabpanel">
                                <div class="d-flex flex-center h-100">
                                    <div id="kt_maps_widget_1_map" class="w-100 h-350px"></div>
                                </div>
                            </div>

                            <!-- Closed Tab -->
                            <div class="tab-pane fade" id="closed_tab" role="tabpanel">
                                <div class="d-flex flex-center h-100">
                                    <div id="closed_map" class="w-100 h-350px">
                                        <p class="pt-5 text-center text-muted">Closed Sales Map or Data Here</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Lost Tab -->
                            <div class="tab-pane fade" id="lost_tab" role="tabpanel">
                                <div class="d-flex flex-center h-100">
                                    <div id="lost_map" class="w-100 h-350px">
                                        <p class="pt-5 text-center text-muted">Lost Sales Map or Data Here</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5 row g-5 gx-xl-10">
            <div class="pe-0 col-xl-12">
                <div class="shadow-none card h-md-100 bg-gr-b">
                    <div class="pt-5 border-0 ps-0 pe-3 card-header align-items-center">
                        <div class="ps-3 d-flex align-items-center">
                            <div>
                                <h1 class="mb-0">Forecast Details</h1>
                                <span>All forecast details are here</span>
                            </div>
                            <div class="d-flex justify-content-between ms-5">
                                <ul class="nav nav-tabs nav-line-tabs"
                                    role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link show active"
                                            data-bs-toggle="tab" href="#quotesDeals" aria-selected="true"
                                            role="tab">
                                            <span class="fs-6 fw-bold"> Quotes </span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link"
                                            data-bs-toggle="tab" href="#mainDeals" aria-selected="false"
                                            role="tab" tabindex="-1">
                                            <span class="fs-6 fw-bold"> Deals </span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link"
                                            data-bs-toggle="tab" href="#lostDeals" aria-selected="false" role="tab"
                                            tabindex="-1">
                                            <span class="fs-6 fw-bold"> Lost </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <form
                                class="mb-5 d-none d-lg-block w-100 mb-lg-0 position-relative"
                                autocomplete="off">

                                <i class="text-gray-500 fab fa-sistrix fs-2 position-absolute top-50 translate-middle-y ms-4"></i>

                                <input
                                    type="text"
                                    class="border-gray-200 form-control form-control-solid h-40px ps-13 fs-7"
                                    name="search"
                                    value=""
                                    placeholder="Search..."
                                    data-kt-search-element="input" />
                            </form>
                        </div>
                    </div>
                    <div class="px-0 py-0 card-body">
                        <div class="px-3 mb-2 tab-content" id="filteredContainer">
                            <div id="spinnerLoader" style="display: none;" class="py-5 text-center">
                                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;"
                                    role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            @include('metronic.pages.sales.partials.forecastFiltered')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5 gx-xl-10">
            <div class="pe-0 col-xl-12">
                <div class="shadow-none card h-md-100 bg-gr-b">
                    <div class="pt-5 border-0 ps-0 pe-3 card-header align-items-center">
                        <div class="ps-3 d-flex align-items-center">
                            <div>
                                <h1 class="mb-0">Performance Details</h1>
                                <span>All performance details are here</span>
                            </div>
                            <div class="d-flex justify-content-between ms-5">
                                <ul class="nav nav-tabs nav-line-tabs"
                                    role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link show active"
                                            data-bs-toggle="tab" href="#countryDeals" aria-selected="true"
                                            role="tab">
                                            <span class="fs-6 fw-bold"> Country </span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link"
                                            data-bs-toggle="tab" href="#salespersonDeals" aria-selected="false"
                                            role="tab" tabindex="-1">
                                            <span class="fs-6 fw-bold"> Salesperson </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <form
                                class="mb-5 d-none d-lg-block w-100 mb-lg-0 position-relative"
                                autocomplete="off">

                                <i class="text-gray-500 fab fa-sistrix fs-2 position-absolute top-50 translate-middle-y ms-4"></i>

                                <input
                                    type="text"
                                    class="border-gray-200 form-control form-control-solid h-40px ps-13 fs-7"
                                    name="search"
                                    value=""
                                    placeholder="Search..."
                                    data-kt-search-element="input" />
                            </form>
                        </div>
                    </div>
                    <div class="px-0 py-0 card-body">
                        <div class="px-3 mb-2 tab-content" id="filteredContainer">
                            <div id="spinnerLoader" style="display: none;" class="py-5 text-center">
                                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;"
                                    role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            @include('metronic.pages.sales.partials.performanceFiltered')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $(document).ready(function() {
            function initializeDataTables() {
                $('.dataTable').DataTable({
                    "fixedHeader": {
                        "header": true,
                        "headerOffset": 5
                    },
                    "language": {
                        "lengthMenu": "Show _MENU_",
                    },
                    "dom": "<'row mb-2'" +
                        "<'col-sm-6 d-flex align-items-center justify-content-start dt-toolbar'l>" +
                        "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
                        ">" +
                        "<'table-responsive'tr>" +
                        "<'row'" +
                        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                        ">"
                });
            }

            function fetchFilteredData(country = '') {
                $.ajax({
                    url: "{{ route('admin.forecast.filter') }}",
                    method: "GET",
                    data: {
                        country: country
                    },
                    beforeSend: function() {
                        $('#filteredContainer').hide();
                        $('#spinnerLoader').show();
                    },
                    success: function(response) {
                        $('#filteredContainer').html(response).fadeIn();
                        initializeDataTables();
                    },
                    error: function() {
                        $('#filteredContainer').html(`
                    <div class="mt-4 text-center alert alert-danger">
                        Something went wrong while fetching data.
                    </div>
                `).fadeIn();
                    },
                    complete: function() {
                        $('#spinnerLoader').fadeOut();
                    }
                });
            }

            // Radio filter
            $('.filterCountry[type=radio]').on('change', function() {
                const selectedCountry = $(this).val();
                fetchFilteredData(selectedCountry);
            });

            // Dropdown filter
            $('#filterCountry').on('change', function() {
                const selectedCountry = $(this).val();
                fetchFilteredData(selectedCountry);
            });
        });
    </script>
    <script>
        var KTChartsWidget16 = {
            init: function() {
                !(function() {
                    if ("undefined" != typeof am5) {
                        var e = document.getElementById("kt_charts_widget_16_chart");
                        e &&
                            am5.ready(function() {
                                var a = am5.Root.new(e);
                                a.setThemes([am5themes_Animated.new(a)]);
                                var t = a.container.children.push(
                                        am5xy.XYChart.new(a, {
                                            panX: !1,
                                            panY: !1,
                                            wheelX: "panX",
                                            wheelY: "zoomX",
                                            layout: a.verticalLayout,
                                        })
                                    ),
                                    l =
                                    (t.get("colors"),
                                        [{
                                                country: "Forecast",
                                                visits: 700
                                            },
                                            {
                                                country: "Actual",
                                                visits: 750
                                            },
                                            {
                                                country: "Target",
                                                visits: 800
                                            }
                                        ]);
                                !(function() {
                                    for (var e = 0, a = 0; a < l.length; a++) {
                                        var t = l[a].visits;
                                        e += t;
                                    }
                                    var o = 0;
                                    for (a = 0; a < l.length; a++)
                                        (o += t = l[a].visits),
                                        (l[a].pareto = (o / e) * 100);
                                })();
                                var o = t.xAxes.push(
                                    am5xy.CategoryAxis.new(a, {
                                        categoryField: "country",
                                        renderer: am5xy.AxisRendererX.new(a, {
                                            minGridDistance: 30,
                                        }),
                                    })
                                );
                                o
                                    .get("renderer")
                                    .labels.template.setAll({
                                        paddingTop: 10,
                                        fontWeight: "400",
                                        fontSize: 13,
                                        fill: am5.color(
                                            KTUtil.getCssVariableValue("--bs-gray-500")
                                        ),
                                    }),
                                    o
                                    .get("renderer")
                                    .grid.template.setAll({
                                        disabled: !0,
                                        strokeOpacity: 0,
                                    }),
                                    o.data.setAll(l);
                                var r = t.yAxes.push(
                                    am5xy.ValueAxis.new(a, {
                                        renderer: am5xy.AxisRendererY.new(a, {}),
                                    })
                                );
                                r
                                    .get("renderer")
                                    .labels.template.setAll({
                                        paddingLeft: 10,
                                        fontWeight: "400",
                                        fontSize: 13,
                                        fill: am5.color(
                                            KTUtil.getCssVariableValue("--bs-gray-500")
                                        ),
                                    }),
                                    r
                                    .get("renderer")
                                    .grid.template.setAll({
                                        stroke: am5.color(
                                            KTUtil.getCssVariableValue(
                                                "--bs-gray-300"
                                            )
                                        ),
                                        strokeWidth: 1,
                                        strokeOpacity: 1,
                                        strokeDasharray: [3],
                                    });
                                var i = am5xy.AxisRendererY.new(a, {
                                        opposite: !0
                                    }),
                                    s = t.yAxes.push(
                                        am5xy.ValueAxis.new(a, {
                                            renderer: i,
                                            min: 0,
                                            max: 100,
                                            strictMinMax: !0,
                                        })
                                    );
                                s
                                    .get("renderer")
                                    .labels.template.setAll({
                                        fontWeight: "400",
                                        fontSize: 13,
                                        fill: am5.color(
                                            KTUtil.getCssVariableValue("--bs-gray-500")
                                        ),
                                    }),
                                    i.grid.template.set("forceHidden", !0),
                                    s.set("numberFormat", "#'%");
                                var n = t.series.push(
                                    am5xy.ColumnSeries.new(a, {
                                        xAxis: o,
                                        yAxis: r,
                                        valueYField: "visits",
                                        categoryXField: "country",
                                    })
                                );
                                n.columns.template.setAll({
                                        tooltipText: "{categoryX}: {valueY}",
                                        tooltipY: 0,
                                        strokeOpacity: 0,
                                        cornerRadiusTL: 6,
                                        cornerRadiusTR: 6,
                                    }),
                                    n.columns.template.adapters.add(
                                        "fill",
                                        function(e, a) {
                                            return t
                                                .get("colors")
                                                .getIndex(
                                                    n.dataItems.indexOf(a.dataItem)
                                                );
                                        }
                                    );
                                var m = t.series.push(
                                    am5xy.LineSeries.new(a, {
                                        xAxis: o,
                                        yAxis: s,
                                        valueYField: "pareto",
                                        categoryXField: "country",
                                        stroke: am5.color(
                                            KTUtil.getCssVariableValue("--bs-dark")
                                        ),
                                        maskBullets: !1,
                                    })
                                );
                                m.bullets.push(function() {
                                        return am5.Bullet.new(a, {
                                            locationY: 1,
                                            sprite: am5.Circle.new(a, {
                                                radius: 5,
                                                fill: am5.color(
                                                    KTUtil.getCssVariableValue(
                                                        "--bs-primary"
                                                    )
                                                ),
                                                stroke: am5.color(
                                                    KTUtil.getCssVariableValue("--bs-dark")
                                                ),
                                            }),
                                        });
                                    }),
                                    n.data.setAll(l),
                                    m.data.setAll(l),
                                    n.appear(),
                                    t.appear(1e3, 100);
                            });
                    }
                })();
            },
        };
        "undefined" != typeof module && (module.exports = KTChartsWidget16),
            KTUtil.onDOMContentLoaded(function() {
                KTChartsWidget16.init();
            });
    </script>
    @endpush
</x-admin-app-layout>