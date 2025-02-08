<x-admin-app-layout :title="'Solution Create'">
    @include('metronic.pages.solution.partials.style')
    <!-- Solutin Start -->
    <section>
        <div class="container-fluid px-0">
            <div class="row main-preview">
                <div class="col-3" id="secondColumn">
                    <div class="style-columns-twos">
                        <div class="site-bg-two text-white rounded-2">
                            <h4 class="text-center py-4 ps-4 mb-0 text-white">
                                All Sections
                            </h4>
                        </div>
                        <div class="pe-0 styling-container">
                            <div class="m-3 pt-3">
                                <!--begin::Accordion-->
                                <div class="accordion" id="kt_accordion_11">
                                    <!-- Accordion Item 1 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                            <button class="accordion-button fs-6 fw-semibold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_template_1"
                                                aria-expanded="true" aria-controls="kt_accordion_1_template_1">
                                                Template 1
                                                <span class="checked-count">(0 Section Selected)</span>
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_1_template_1" class="accordion-collapse collapse show"
                                            aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                                            <div class="accordion-body p-2">
                                                <div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox1"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/hero1.png') }}" />
                                                        <label for="imageCheckbox1">
                                                            <img src="{{ asset('backend/metronic/solution/hero1.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0 img-fluid" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Hero Section</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox2"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/section2.png') }}" />
                                                        <label for="imageCheckbox2">
                                                            <img src="{{ asset('backend/metronic/solution/section2.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Service Boxes</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox3"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/section3.png') }}" />
                                                        <label for="imageCheckbox3">
                                                            <img src="{{ asset('backend/metronic/solution/section3.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">
                                                                    Feature Section
                                                                </p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox4"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/section4.png') }}" />
                                                        <label for="imageCheckbox4">
                                                            <img src="{{ asset('backend/metronic/solution/section4.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">
                                                                    Feature Section
                                                                </p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox5"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/section5.png') }}" />
                                                        <label for="imageCheckbox5">
                                                            <img src="{{ asset('backend/metronic/solution/section5.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">
                                                                    Feature Section
                                                                </p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox6"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/section6.png') }}" />
                                                        <label for="imageCheckbox6">
                                                            <img src="{{ asset('backend/metronic/solution/section6.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">
                                                                    Feature Section
                                                                </p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox7"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/section7.png') }}" />
                                                        <label for="imageCheckbox7">
                                                            <img src="{{ asset('backend/metronic/solution/section7.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">
                                                                    Feature Section
                                                                </p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion Item 2 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="kt_accordion_2_header_1">
                                            <button class="accordion-button fs-6 fw-semibold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#kt_accordion_2_template_1"
                                                aria-expanded="true" aria-controls="kt_accordion_2_template_1">
                                                Template 2
                                                <span class="checked-count">(0 Section Selected)</span>
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_2_template_1" class="accordion-collapse collapse"
                                            aria-labelledby="kt_accordion_2_header_1"
                                            data-bs-parent="#kt_accordion_2">
                                            <div class="accordion-body p-2">
                                                <div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox21"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/tem-3-sec1.png') }}" />
                                                        <label for="imageCheckbox21">
                                                            <img src="{{ asset('backend/metronic/solution/tem-3-sec1.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Bio Section</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox22"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/tem-3-sec2.png') }}" />
                                                        <label for="imageCheckbox22">
                                                            <img src="{{ asset('backend/metronic/solution/tem-3-sec2.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Countdown Box</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox23"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/tem-3-sec3.png') }}" />
                                                        <label for="imageCheckbox23">
                                                            <img src="{{ asset('backend/metronic/solution/tem-3-sec3.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Blogs Card</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox24"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/tem-3-sec4.png') }}" />
                                                        <label for="imageCheckbox24">
                                                            <img src="{{ asset('backend/metronic/solution/tem-3-sec4.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Blogs Card</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox25"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/tem-3-sec5.png') }}" />
                                                        <label for="imageCheckbox25">
                                                            <img src="{{ asset('backend/metronic/solution/tem-3-sec5.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Blogs Card</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox26"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/tem-3-sec6.png') }}" />
                                                        <label for="imageCheckbox26">
                                                            <img src="{{ asset('backend/metronic/solution/tem-3-sec6.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Blogs Card</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion Item 3 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="kt_accordion_3_header_1">
                                            <button class="accordion-button fs-6 fw-semibold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#kt_accordion_3_template_1"
                                                aria-expanded="true" aria-controls="kt_accordion_3_template_1">
                                                Template 3
                                                <span class="checked-count">(0 Section Selected)</span>
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_3_template_1" class="accordion-collapse collapse"
                                            aria-labelledby="kt_accordion_3_header_1"
                                            data-bs-parent="#kt_accordion_3">
                                            <div class="accordion-body p-2">
                                                <div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox31"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/tem-4-sec1.png') }}" />
                                                        <label for="imageCheckbox31">
                                                            <img src="{{ asset('backend/metronic/solution/tem-4-sec1.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Bio Section</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox32"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/tem-4-sec2.png') }}" />
                                                        <label for="imageCheckbox32">
                                                            <img src="{{ asset('backend/metronic/solution/tem-4-sec2.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Countdown Box</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox33"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/tem-4-sec3.png') }}" />
                                                        <label for="imageCheckbox33">
                                                            <img src="{{ asset('backend/metronic/solution/tem-4-sec3.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Blogs Card</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox34"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/tem-4-sec4.png') }}" />
                                                        <label for="imageCheckbox34">
                                                            <img src="{{ asset('backend/metronic/solution/tem-4-sec4.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Blogs Card</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion Item 3 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="kt_accordion_4_header_1">
                                            <button class="accordion-button fs-6 fw-semibold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#kt_accordion_4_template_1"
                                                aria-expanded="true" aria-controls="kt_accordion_4_template_1">
                                                Template 4
                                                <span class="checked-count">(0 Section Selected)</span>
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_4_template_1" class="accordion-collapse collapse"
                                            aria-labelledby="kt_accordion_4_header_1"
                                            data-bs-parent="#kt_accordion_4">
                                            <div class="accordion-body p-2">
                                                <div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox41"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/tem-5-sec1.png') }}" />
                                                        <label for="imageCheckbox41">
                                                            <img src="{{ asset('backend/metronic/solution/tem-5-sec1.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Bio Section</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox42"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/tem-5-sec2.png') }}" />
                                                        <label for="imageCheckbox42">
                                                            <img src="{{ asset('backend/metronic/solution/tem-5-sec2.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Countdown Box</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox43"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/tem-5-sec3.png') }}" />
                                                        <label for="imageCheckbox43">
                                                            <img src="{{ asset('backend/metronic/solution/tem-5-sec3.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Blogs Card</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox44"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/tem-5-sec4.png') }}" />
                                                        <label for="imageCheckbox44">
                                                            <img src="{{ asset('backend/metronic/solution/tem-5-sec4.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Blogs Card</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox45"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/tem-5-sec5.png') }}" />
                                                        <label for="imageCheckbox45">
                                                            <img src="{{ asset('backend/metronic/solution/tem-5-sec5.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Blogs Card</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-image">
                                                        <input type="checkbox" id="imageCheckbox46"
                                                            class="image-checkbox"
                                                            data-img-src="{{ asset('backend/metronic/solution/tem-5-sec6.png') }}" />
                                                        <label for="imageCheckbox46">
                                                            <img src="{{ asset('backend/metronic/solution/tem-5-sec6.png') }}"
                                                                alt="Checkbox Image" class="m-0 border-0" />
                                                            <div class="bg-light py-2 border">
                                                                <p class="mb-0">Blogs Card</p>
                                                            </div>
                                                        </label>
                                                    </div>
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
                <div class="col-lg-9" id="mainColumn">
                    <div class="pe-0">
                        <div class="site-bg text-white rounded-2">
                            <div class="d-flex justify-content-between">
                                <h4 class="text-center py-4 ps-4 mb-0 text-white">
                                    Here Is Your Preview
                                </h4>
                                <div class="pe-1 pt-1">
                                    <button class="btn btn-sm fw-bold btn-secondary m-1" data-bs-toggle="modal"
                                        data-bs-target="#previewFull">
                                        Preview Page
                                        <i class="fa-solid fa-pager ps-3 fs-3"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="style-columns">
                            <div class="preview text-center p-3 pe-0">
                                <div id="previewContainer" style="position: relative"></div>
                                <div class="preview-not-text">
                                    <div id="emptyMessage" style="color: #000000">
                                        <div>
                                            <div>
                                                <img width="200px" class="img-fluid"
                                                    src="https://i.pinimg.com/736x/1d/03/ab/1d03aba6741e8c4518c29b1d75fe8fdf.jpg"
                                                    alt="" />
                                            </div>
                                            <h1>No Section Selected.</h1>
                                            <h6>
                                                Please Select an Section From Right Side.
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 remove_icons" style="display: none">
                    <div class="styling-container-1">
                        <ul class="nav nav-tabs nav-line-tabs mb-2 fs-6 solutions-tabss">
                            <li class="nav-item w-50">
                                <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1"><i
                                        class="fa-solid fa-newspaper pe-2"></i> Edit
                                    Sections</a>
                            </li>
                            <li class="nav-item w-50">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2"><i
                                        class="fa-solid fa-shapes pe-2"></i> Add
                                    Components</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                                <div class="templates-comps pe-0">
                                    <div class="style-columns-twos">
                                        <div class="site-bg-two text-white rounded-2">
                                            <h4 class="text-center py-4 ps-4 mb-0 text-white">
                                                Change Style & Content
                                            </h4>
                                        </div>
                                        <div class="pe-0 styling-container">
                                            <div class="p-3">
                                                <ul class="nav nav-tabs justify-content-between align-items-center bg-light-info p-3 rounded-2"
                                                    id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link solution-styles-tab active"
                                                            id="home-tab" data-bs-toggle="tab"
                                                            data-bs-target="#home" type="button" role="tab"
                                                            aria-controls="home" aria-selected="true">
                                                            <i class="fa-solid fa-pen pe-2"></i>
                                                            Content
                                                        </button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link solution-styles-tab" id="profile-tab"
                                                            data-bs-toggle="tab" data-bs-target="#profile"
                                                            type="button" role="tab" aria-controls="profile"
                                                            aria-selected="false">
                                                            <i class="fa-solid fa-mortar-pestle pe-2"></i>
                                                            Style
                                                        </button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link solution-styles-tab" id="contact-tab"
                                                            data-bs-toggle="tab" data-bs-target="#contact"
                                                            type="button" role="tab" aria-controls="contact"
                                                            aria-selected="false">
                                                            <i class="fa-solid fa-sliders pe-2"></i>
                                                            Advance
                                                        </button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="home"
                                                        role="tabpanel" aria-labelledby="home-tab">
                                                        <!-- Content Start -->
                                                        <div class="">
                                                            <form action="">
                                                                <div class="row mt-4">
                                                                    <div class="col-sm-12">
                                                                        <div class="mb-2">
                                                                            <label for="inputPassword5"
                                                                                class="form-label">Section
                                                                                Title</label>
                                                                            <input type="password" id="inputPassword5"
                                                                                class="form-control form-control-sm"
                                                                                aria-describedby="passwordHelpBlock" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="mb-2">
                                                                            <label for="inputPassword5"
                                                                                class="form-label">Section
                                                                                Paragraph</label>
                                                                            <textarea name="content" id="editor">
                                            <p>Hello, this is a CKEditor 5 instance!</p>
                                          </textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="mb-2">
                                                                            <label for="inputPassword5"
                                                                                class="form-label">Background
                                                                                Image</label>
                                                                            <input type="file" id="inputPassword5"
                                                                                class="form-control form-control-sm"
                                                                                aria-describedby="passwordHelpBlock" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="mb-2">
                                                                            <label for="inputPassword5"
                                                                                class="form-label">Section
                                                                                Image</label>
                                                                            <input type="file" id="inputPassword5"
                                                                                class="form-control form-control-sm"
                                                                                aria-describedby="passwordHelpBlock" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="mb-2">
                                                                            <label for="inputPassword5"
                                                                                class="form-label">Badge</label>
                                                                            <input type="text" id="inputPassword5"
                                                                                class="form-control form-control-sm"
                                                                                aria-describedby="passwordHelpBlock" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="mb-2">
                                                                            <label for="inputPassword5"
                                                                                class="form-label">Badge</label>
                                                                            <input type="text" id="inputPassword5"
                                                                                class="form-control form-control-sm"
                                                                                aria-describedby="passwordHelpBlock" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="mb-2">
                                                                            <label for="inputPassword5"
                                                                                class="form-label">Badge</label>
                                                                            <input type="text" id="inputPassword5"
                                                                                class="form-control form-control-sm"
                                                                                aria-describedby="passwordHelpBlock" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="mb-2">
                                                                            <label for="inputPassword5"
                                                                                class="form-label">Button Text</label>
                                                                            <input type="text" id="inputPassword5"
                                                                                class="form-control form-control-sm"
                                                                                aria-describedby="passwordHelpBlock" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="mb-2">
                                                                            <label for="inputPassword5"
                                                                                class="form-label">Button Link</label>
                                                                            <input type="text" id="inputPassword5"
                                                                                class="form-control form-control-sm"
                                                                                aria-describedby="passwordHelpBlock" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- Content End -->
                                                    </div>
                                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                                        aria-labelledby="profile-tab">
                                                        <div class="pt-2">
                                                            <label for="">Change Style</label>
                                                            <select class="form-select form-select-sm"
                                                                data-control="select2"
                                                                data-placeholder="Select Element">
                                                                <option></option>
                                                                <option value="Title">
                                                                    Title
                                                                </option>
                                                                <option value="Paragraph">
                                                                    Paragraph Description
                                                                </option>
                                                                <option value="Buttons">
                                                                    Buttons
                                                                </option>
                                                                <option value="Badges">
                                                                    Badges
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="py-5 mt-3">
                                                            <!-- Alignment -->
                                                            <div
                                                                class="d-flex justify-content-between align-items-center pb-2">
                                                                <small>Alignment</small>
                                                                <div>
                                                                    <a href="#"
                                                                        class="btn btn-sm btn-icon btn-primary me-1">
                                                                        <i class="fa-solid fa-align-left fs-6"></i>
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-sm btn-icon btn-primary me-1">
                                                                        <i class="fa-solid fa-align-center fs-6"></i>
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-sm btn-icon btn-primary me-1">
                                                                        <i class="fa-solid fa-align-right fs-6"></i>
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-sm btn-icon btn-primary me-1">
                                                                        <i class="fa-solid fa-align-justify fs-6"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <!-- Color -->
                                                            <div
                                                                class="d-flex justify-content-between align-items-center py-2">
                                                                <small>Text Color</small>
                                                                <div>
                                                                    <input type="color" name=""
                                                                        id="" />
                                                                </div>
                                                            </div>
                                                            <!-- Color -->
                                                            <div
                                                                class="d-flex justify-content-between align-items-center py-2">
                                                                <small>Typography</small>
                                                                <div>
                                                                    <span class="button_container">
                                                                        <span class="my_button">
                                                                            <i class="fa-solid fa-pen"></i>
                                                                        </span>
                                                                        <div class="my_target">
                                                                            <div>
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center mb-2">
                                                                                    <div class="w-50">
                                                                                        <label for=""
                                                                                            class="form-label mb-0">Fonts</label>
                                                                                    </div>
                                                                                    <div class="mb-0 w-50">
                                                                                        <select
                                                                                            class="form-select form-select-sm"
                                                                                            data-control="select2"
                                                                                            data-placeholder="Select Font">
                                                                                            <option></option>
                                                                                            <option value="Poppins">
                                                                                                Poppins
                                                                                            </option>
                                                                                            <option value="2">
                                                                                                Option 2
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center mb-2">
                                                                                    <div class="w-50">
                                                                                        <label for=""
                                                                                            class="form-label mb-0">Fonts
                                                                                            Size</label>
                                                                                    </div>
                                                                                    <div class="mb-0 w-50">
                                                                                        <select
                                                                                            class="form-select form-select-sm"
                                                                                            data-control="select2"
                                                                                            data-placeholder="Choose Font Size">
                                                                                            <option></option>
                                                                                            <option value="10">
                                                                                                10
                                                                                            </option>
                                                                                            <option value="11">
                                                                                                12
                                                                                            </option>
                                                                                            <option value="13">
                                                                                                13
                                                                                            </option>
                                                                                            <option value="10">
                                                                                                10
                                                                                            </option>
                                                                                            <option value="10">
                                                                                                10
                                                                                            </option>
                                                                                            <option value="10">
                                                                                                10
                                                                                            </option>
                                                                                            <option value="10">
                                                                                                10
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center mb-2">
                                                                                    <div class="w-50">
                                                                                        <label for=""
                                                                                            class="form-label mb-0">Weight</label>
                                                                                    </div>
                                                                                    <div class="mb-0 w-50">
                                                                                        <select
                                                                                            class="form-select form-select-sm"
                                                                                            data-control="select2"
                                                                                            data-placeholder="Select Font">
                                                                                            <option></option>
                                                                                            <option value="Poppins">
                                                                                                Poppins
                                                                                            </option>
                                                                                            <option value="2">
                                                                                                Option 2
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center mb-2">
                                                                                    <div class="w-50">
                                                                                        <label for=""
                                                                                            class="form-label mb-0">Transformation</label>
                                                                                    </div>
                                                                                    <div class="mb-0 w-50">
                                                                                        <select
                                                                                            class="form-select form-select-sm"
                                                                                            data-control="select2"
                                                                                            data-placeholder="Select Font">
                                                                                            <option></option>
                                                                                            <option value="Poppins">
                                                                                                Poppins
                                                                                            </option>
                                                                                            <option value="2">
                                                                                                Option 2
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center mb-2">
                                                                                    <div class="w-50">
                                                                                        <label for=""
                                                                                            class="form-label mb-0">Text
                                                                                            Style</label>
                                                                                    </div>
                                                                                    <div class="mb-0 w-50">
                                                                                        <select
                                                                                            class="form-select form-select-sm"
                                                                                            data-control="select2"
                                                                                            data-placeholder="Select Font">
                                                                                            <option></option>
                                                                                            <option value="Poppins">
                                                                                                Poppins
                                                                                            </option>
                                                                                            <option value="2">
                                                                                                Option 2
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center mb-2">
                                                                                    <div class="w-50">
                                                                                        <label for=""
                                                                                            class="form-label mb-0">Text
                                                                                            Decoration</label>
                                                                                    </div>
                                                                                    <div class="mb-0 w-50">
                                                                                        <select
                                                                                            class="form-select form-select-sm"
                                                                                            data-control="select2"
                                                                                            data-placeholder="Select Font">
                                                                                            <option></option>
                                                                                            <option value="Poppins">
                                                                                                Poppins
                                                                                            </option>
                                                                                            <option value="2">
                                                                                                Option 2
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="contact" role="tabpanel"
                                                        aria-labelledby="contact-tab">
                                                        Advance Tabs
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <button class="btn w-100 rounded-2 text-white"
                                                    style="background-color: #0b6476" data-bs-toggle="modal"
                                                    data-bs-target="#previewFull">
                                                    Preview Full Page
                                                </button>
                                                <button class="btn w-100 rounded-2 mt-2 text-white"
                                                    style="background-color: #0b6476">
                                                    Save Full Page
                                                </button>
                                                <!-- Modal Body -->
                                                <div class="modal fade" id="previewFull" tabindex="-1"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalTitleId">
                                                                    Solutin Template
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body p-0">
                                                                <div>
                                                                    <img src="./assets/template1Preview.png"
                                                                        class="img-fluid" alt="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                <div class="templates-comps pe-0">
                                    <div class="m-3 py-2">
                                        <!--begin::Accordion-->
                                        <div class="accordion my-3" id="kt_accordion_20">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="kt_accordion_111_header_1">
                                                    <button class="accordion-button fs-6 fw-semibold" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#kt_accordion_111_body_1" aria-expanded="true"
                                                        aria-controls="kt_accordion_111_body_1">
                                                        Buttons
                                                    </button>
                                                </h2>
                                                <div id="kt_accordion_111_body_1"
                                                    class="accordion-collapse collapse show"
                                                    aria-labelledby="kt_accordion_111_header_1"
                                                    data-bs-parent="#kt_accordion_111">
                                                    <div class="accordion-body">
                                                        <div>
                                                            <a href="#" class="btn btn-light m-2">Light</a>
                                                            <a href="#" class="btn btn-primary m-2">Primary</a>
                                                            <a href="#"
                                                                class="btn btn-secondary m-2">Secondary</a>
                                                            <a href="#" class="btn btn-success m-2">Success</a>
                                                            <a href="#" class="btn btn-info m-2">Info</a>
                                                            <a href="#" class="btn btn-warning m-2">Warning</a>
                                                            <a href="#" class="btn btn-danger m-2">Danger</a>
                                                            <a href="#" class="btn btn-dark m-2">Dark</a>
                                                            <a href="#"
                                                                class="btn btn-light-primary">Primary</a>
                                                            <a href="#"
                                                                class="btn btn-light-secondary m-2">Secondary</a>
                                                            <a href="#"
                                                                class="btn btn-light-success m-2">Success</a>
                                                            <a href="#" class="btn btn-light-info m-2">Info</a>
                                                            <a href="#"
                                                                class="btn btn-light-warning m-2">Warning</a>
                                                            <a href="#"
                                                                class="btn btn-light-danger m-2">Danger</a>
                                                            <a href="#" class="btn btn-light-dark m-2">Dark</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="kt_accordion_122_header_2">
                                                    <button class="accordion-button fs-6 fw-semibold collapsed"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#kt_accordion_122_body_2"
                                                        aria-expanded="false" aria-controls="kt_accordion_122_body_2">
                                                        Check Box & Radios
                                                    </button>
                                                </h2>
                                                <div id="kt_accordion_122_body_2" class="accordion-collapse collapse"
                                                    aria-labelledby="kt_accordion_1_header_2"
                                                    data-bs-parent="#kt_accordion_1">
                                                    <div class="accordion-body">
                                                        <div class="row">
                                                            <!-- Checkbox One -->
                                                            <div class="col-lg-4">
                                                                <div class="checkbox-wrapper-1">
                                                                    <input id="example-1" class="substituted"
                                                                        type="checkbox" aria-hidden="true" />
                                                                    <label for="example-1">Checkbox</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="checkbox-wrapper-2">
                                                                    <input type="checkbox" class="sc-gJwTLC ikxBAC" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="checkbox-wrapper-12">
                                                                    <div class="cbx">
                                                                        <input id="cbx-12" type="checkbox" />
                                                                        <label for="cbx-12"></label>
                                                                        <svg width="15" height="14"
                                                                            viewbox="0 0 15 14" fill="none">
                                                                            <path d="M2 8.36364L6.23077 12L13 2"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <!-- Gooey-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        version="1.1">
                                                                        <defs>
                                                                            <filter id="goo-12">
                                                                                <fegaussianblur in="SourceGraphic"
                                                                                    stddeviation="4" result="blur">
                                                                                </fegaussianblur>
                                                                                <fecolormatrix in="blur"
                                                                                    mode="matrix"
                                                                                    values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 22 -7"
                                                                                    result="goo-12"></fecolormatrix>
                                                                                <feblend in="SourceGraphic"
                                                                                    in2="goo-12"></feblend>
                                                                            </filter>
                                                                        </defs>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="kt_accordion_113_header_3">
                                                    <button class="accordion-button fs-6 fw-semibold collapsed"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#kt_accordion_113_body_3"
                                                        aria-expanded="false" aria-controls="kt_accordion_113_body_3">
                                                        Pop Hover
                                                    </button>
                                                </h2>
                                                <div id="kt_accordion_113_body_3" class="accordion-collapse collapse"
                                                    aria-labelledby="kt_accordion_113_header_3"
                                                    data-bs-parent="#kt_accordion_113">
                                                    <div class="accordion-body">
                                                        <div>
                                                            <button type="button" class="btn btn-secondary my-2 me-5"
                                                                data-bs-toggle="popover" data-bs-placement="top"
                                                                title="Popover on top"
                                                                data-bs-content="And here's some amazing content. It's very engaging. Right?">
                                                                Popover on top
                                                            </button>

                                                            <button type="button" class="btn btn-secondary my-2 me-5"
                                                                data-bs-toggle="popover" data-bs-placement="right"
                                                                title="Popover on right"
                                                                data-bs-content="And here's some amazing content. It's very engaging. Right?">
                                                                Popover on right
                                                            </button>

                                                            <button type="button" class="btn btn-secondary my-2 me-5"
                                                                data-bs-toggle="popover" data-bs-placement="bottom"
                                                                title="Popover on bottom"
                                                                data-bs-content="And here's some amazing content. It's very engaging. Right?">
                                                                Popover on bottom
                                                            </button>

                                                            <button type="button" class="btn btn-secondary my-2 me-5"
                                                                data-bs-toggle="popover" data-bs-placement="left"
                                                                title="Popover on left"
                                                                data-bs-content="And here's some amazing content. It's very engaging. Right?">
                                                                Popover on left
                                                            </button>

                                                            <button type="button" class="btn btn-secondary my-2"
                                                                data-bs-toggle="popover" data-bs-html="true"
                                                                title="<span><em>Popover</em> <u>title with</u> <b>HTML</b></span>"
                                                                data-bs-content="And here's some amazing content. It's very <b class='text-danger'>engaging</b>. Right?">
                                                                Popover with HTML
                                                            </button>
                                                            <div class="row">
                                                                <div class="d-flex flex-column col-lg-4">
                                                                    <li class="d-flex align-items-center py-2">
                                                                        <span class="bullet bullet-dot me-5"></span>
                                                                        Item 1
                                                                    </li>
                                                                    <li class="d-flex align-items-center py-2">
                                                                        <span
                                                                            class="bullet bullet-dot bg-danger me-5"></span>
                                                                        Item 2
                                                                    </li>
                                                                    <li class="d-flex align-items-center py-2">
                                                                        <span
                                                                            class="bullet bullet-dot bg-success me-5"></span>
                                                                        Item 3
                                                                    </li>
                                                                    <li class="d-flex align-items-center py-2">
                                                                        <span
                                                                            class="bullet bullet-dot bg-info me-5"></span>
                                                                        Item 4
                                                                    </li>
                                                                    <li class="d-flex align-items-center py-2">
                                                                        <span
                                                                            class="bullet bullet-dot bg-primary me-5"></span>
                                                                        Item 5
                                                                    </li>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="kt_accordion_114_header_3">
                                                    <button class="accordion-button fs-6 fw-semibold collapsed"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#kt_accordion_114_body_3"
                                                        aria-expanded="false" aria-controls="kt_accordion_114_body_3">
                                                        Form Elememts
                                                    </button>
                                                </h2>
                                                <div id="kt_accordion_114_body_3" class="accordion-collapse collapse"
                                                    aria-labelledby="kt_accordion_114_header_3"
                                                    data-bs-parent="#kt_accordion_114">
                                                    <div class="accordion-body">
                                                        <div>
                                                            <input type="text" class="form-control mb-2"
                                                                placeholder="name@example.com" />
                                                            <input type="text"
                                                                class="form-control form-control-solid mb-2"
                                                                placeholder="name@example.com" />
                                                            <input type="text"
                                                                class="form-control form-control-transparent mb-2"
                                                                placeholder="name@example.com" />
                                                            <select class="form-select mb-2"
                                                                aria-label="Select example">
                                                                <option>
                                                                    Open this select menu
                                                                </option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                            <div class="mb-2">
                                                                <label for="customRange1" class="form-label">Example
                                                                    range</label>
                                                                <input type="range" class="form-range"
                                                                    id="customRange1" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Accordion-->
                                        <!--end::Accordion-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities"
        data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="end"
        data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close">
        <div class="card shadow-none rounded-0">
            <div class="card-header" id="kt_activities_header">
                <h3 class="card-title fw-bolder text-dark">Activity Logs</h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5"
                        id="kt_activities_close">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </button>
                </div>
            </div>

            <div class="card-body position-relative" id="kt_activities_body">
                <div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5" data-kt-scroll="true"
                    data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_activities_body"
                    data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer"
                    data-kt-scroll-offset="5px">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-line w-40px"></div>

                            <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                                <div class="symbol-label bg-light">
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z"
                                                fill="currentColor" />
                                            <path
                                                d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            <div class="timeline-content mb-10 mt-n1">
                                <div class="pe-3 mb-5">
                                    <div class="fs-5 fw-bold mb-2">
                                        There are 2 new tasks for you in “AirPlus Mobile App”
                                        project:
                                    </div>

                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <div class="text-muted me-2 fs-7">
                                            Added at 4:23 PM by
                                        </div>

                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
                                            <img src="assets/media/avatars/300-14.jpg" alt="img" />
                                        </div>
                                    </div>
                                </div>

                                <div class="overflow-auto pb-5">
                                    <div
                                        class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">
                                        <a href="../../demo1/dist/apps/projects/project.html"
                                            class="fs-5 text-dark text-hover-primary fw-bold w-375px min-w-200px">Meeting
                                            with customer</a>

                                        <div class="min-w-175px pe-2">
                                            <span class="badge badge-light text-muted">Application Design</span>
                                        </div>

                                        <div
                                            class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px pe-2">
                                            <div class="symbol symbol-circle symbol-25px">
                                                <img src="assets/media/avatars/300-2.jpg" alt="img" />
                                            </div>

                                            <div class="symbol symbol-circle symbol-25px">
                                                <img src="assets/media/avatars/300-14.jpg" alt="img" />
                                            </div>

                                            <div class="symbol symbol-circle symbol-25px">
                                                <div class="symbol-label fs-8 fw-bold bg-primary text-inverse-primary">
                                                    A
                                                </div>
                                            </div>
                                        </div>

                                        <div class="min-w-125px pe-2">
                                            <span class="badge badge-light-primary">In Progress</span>
                                        </div>

                                        <a href="../../demo1/dist/apps/projects/project.html"
                                            class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                    </div>

                                    <div
                                        class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0">
                                        <a href="../../demo1/dist/apps/projects/project.html"
                                            class="fs-5 text-dark text-hover-primary fw-bold w-375px min-w-200px">Project
                                            Delivery Preparation</a>

                                        <div class="min-w-175px">
                                            <span class="badge badge-light text-muted">CRM System Development</span>
                                        </div>

                                        <div class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px">
                                            <div class="symbol symbol-circle symbol-25px">
                                                <img src="assets/media/avatars/300-20.jpg" alt="img" />
                                            </div>

                                            <div class="symbol symbol-circle symbol-25px">
                                                <div class="symbol-label fs-8 fw-bold bg-success text-inverse-primary">
                                                    B
                                                </div>
                                            </div>
                                        </div>

                                        <div class="min-w-125px">
                                            <span class="badge badge-light-success">Completed</span>
                                        </div>

                                        <a href="../../demo1/dist/apps/projects/project.html"
                                            class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-line w-40px"></div>

                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z"
                                                fill="currentColor" />
                                            <path
                                                d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            <div class="timeline-content mb-10 mt-n2">
                                <div class="overflow-auto pe-3">
                                    <div class="fs-5 fw-bold mb-2">
                                        Invitation for crafting engaging designs that speak human
                                        workshop
                                    </div>

                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <div class="text-muted me-2 fs-7">Sent at 4:23 PM by</div>

                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Alan Nilson">
                                            <img src="assets/media/avatars/300-1.jpg" alt="img" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-line w-40px"></div>

                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.2166 8.50002L10.5166 7.80007C10.1166 7.40007 10.1166 6.80005 10.5166 6.40005L13.4166 3.50002C15.5166 1.40002 18.9166 1.50005 20.8166 3.90005C22.5166 5.90005 22.2166 8.90007 20.3166 10.8001L17.5166 13.6C17.1166 14 16.5166 14 16.1166 13.6L15.4166 12.9C15.0166 12.5 15.0166 11.9 15.4166 11.5L18.3166 8.6C19.2166 7.7 19.1166 6.30002 18.0166 5.50002C17.2166 4.90002 16.0166 5.10007 15.3166 5.80007L12.4166 8.69997C12.2166 8.89997 11.6166 8.90002 11.2166 8.50002ZM11.2166 15.6L8.51659 18.3001C7.81659 19.0001 6.71658 19.2 5.81658 18.6C4.81658 17.9 4.71659 16.4 5.51659 15.5L8.31658 12.7C8.71658 12.3 8.71658 11.7001 8.31658 11.3001L7.6166 10.6C7.2166 10.2 6.6166 10.2 6.2166 10.6L3.6166 13.2C1.7166 15.1 1.4166 18.1 3.1166 20.1C5.0166 22.4 8.51659 22.5 10.5166 20.5L13.3166 17.7C13.7166 17.3 13.7166 16.7001 13.3166 16.3001L12.6166 15.6C12.3166 15.2 11.6166 15.2 11.2166 15.6Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M5.0166 9L2.81659 8.40002C2.31659 8.30002 2.0166 7.79995 2.1166 7.19995L2.31659 5.90002C2.41659 5.20002 3.21659 4.89995 3.81659 5.19995L6.0166 6.40002C6.4166 6.60002 6.6166 7.09998 6.5166 7.59998L6.31659 8.30005C6.11659 8.80005 5.5166 9.1 5.0166 9ZM8.41659 5.69995H8.6166C9.1166 5.69995 9.5166 5.30005 9.5166 4.80005L9.6166 3.09998C9.6166 2.49998 9.2166 2 8.5166 2H7.81659C7.21659 2 6.71659 2.59995 6.91659 3.19995L7.31659 4.90002C7.41659 5.40002 7.91659 5.69995 8.41659 5.69995ZM14.6166 18.2L15.1166 21.3C15.2166 21.8 15.7166 22.2 16.2166 22L17.6166 21.6C18.1166 21.4 18.4166 20.8 18.1166 20.3L16.7166 17.5C16.5166 17.1 16.1166 16.9 15.7166 17L15.2166 17.1C14.8166 17.3 14.5166 17.7 14.6166 18.2ZM18.4166 16.3L19.8166 17.2C20.2166 17.5 20.8166 17.3 21.0166 16.8L21.3166 15.9C21.5166 15.4 21.1166 14.8 20.5166 14.8H18.8166C18.0166 14.8 17.7166 15.9 18.4166 16.3Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            <div class="timeline-content mb-10 mt-n1">
                                <div class="mb-5 pe-3">
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">3 New
                                        Incoming Project Files:</a>

                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <div class="text-muted me-2 fs-7">
                                            Sent at 10:30 PM by
                                        </div>

                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Jan Hummer">
                                            <img src="assets/media/avatars/300-23.jpg" alt="img" />
                                        </div>
                                    </div>
                                </div>

                                <div class="overflow-auto pb-5">
                                    <div
                                        class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
                                        <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                            <img alt="" class="w-30px me-3"
                                                src="assets/media/svg/files/pdf.svg" />

                                            <div class="ms-1 fw-bold">
                                                <a href="../../demo1/dist/apps/projects/project.html"
                                                    class="fs-6 text-hover-primary fw-bolder">Finance KPI App
                                                    Guidelines</a>

                                                <div class="text-gray-400">1.9mb</div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                            <img alt="../../demo1/dist/apps/projects/project.html" class="w-30px me-3"
                                                src="assets/media/svg/files/doc.svg" />

                                            <div class="ms-1 fw-bold">
                                                <a href="#" class="fs-6 text-hover-primary fw-bolder">Client UAT
                                                    Testing Results</a>

                                                <div class="text-gray-400">18kb</div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-aligns-center">
                                            <img alt="../../demo1/dist/apps/projects/project.html" class="w-30px me-3"
                                                src="assets/media/svg/files/css.svg" />

                                            <div class="ms-1 fw-bold">
                                                <a href="#" class="fs-6 text-hover-primary fw-bolder">Finance
                                                    Reports</a>

                                                <div class="text-gray-400">20mb</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-line w-40px"></div>

                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                                fill="currentColor" />
                                            <path
                                                d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            <div class="timeline-content mb-10 mt-n1">
                                <div class="pe-3 mb-5">
                                    <div class="fs-5 fw-bold mb-2">
                                        Task
                                        <a href="#" class="text-primary fw-bolder me-1">#45890</a>merged with
                                        <a href="#" class="text-primary fw-bolder me-1">#45890</a>in “Ads Pro
                                        Admin Dashboard project:
                                    </div>

                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <div class="text-muted me-2 fs-7">
                                            Initiated at 4:23 PM by
                                        </div>

                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
                                            <img src="assets/media/avatars/300-14.jpg" alt="img" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-line w-40px"></div>

                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                fill="currentColor" />
                                            <path
                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            <div class="timeline-content mb-10 mt-n1">
                                <div class="pe-3 mb-5">
                                    <div class="fs-5 fw-bold mb-2">
                                        3 new application design concepts added:
                                    </div>

                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <div class="text-muted me-2 fs-7">
                                            Created at 4:23 PM by
                                        </div>

                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top"
                                            title="Marcus Dotson">
                                            <img src="assets/media/avatars/300-2.jpg" alt="img" />
                                        </div>
                                    </div>
                                </div>

                                <div class="overflow-auto pb-5">
                                    <div
                                        class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
                                        <div class="overlay me-10">
                                            <div class="overlay-wrapper">
                                                <img alt="img" class="rounded w-150px"
                                                    src="assets/media/stock/600x400/img-29.jpg" />
                                            </div>

                                            <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                <a href="#"
                                                    class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                            </div>
                                        </div>

                                        <div class="overlay me-10">
                                            <div class="overlay-wrapper">
                                                <img alt="img" class="rounded w-150px"
                                                    src="assets/media/stock/600x400/img-31.jpg" />
                                            </div>

                                            <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                <a href="#"
                                                    class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                            </div>
                                        </div>

                                        <div class="overlay">
                                            <div class="overlay-wrapper">
                                                <img alt="img" class="rounded w-150px"
                                                    src="assets/media/stock/600x400/img-40.jpg" />
                                            </div>

                                            <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                <a href="#"
                                                    class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-line w-40px"></div>

                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            <div class="timeline-content mb-10 mt-n1">
                                <div class="pe-3 mb-5">
                                    <div class="fs-5 fw-bold mb-2">
                                        New case
                                        <a href="#" class="text-primary fw-bolder me-1">#67890</a>is assigned
                                        to you in Multi-platform Database Design
                                        project
                                    </div>

                                    <div class="overflow-auto pb-5">
                                        <div class="d-flex align-items-center mt-1 fs-6">
                                            <div class="text-muted me-2 fs-7">
                                                Added at 4:23 PM by
                                            </div>

                                            <a href="#" class="text-primary fw-bolder me-1">Alice Tan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-line w-40px"></div>

                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                fill="currentColor" />
                                            <path
                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            <div class="timeline-content mb-10 mt-n1">
                                <div class="pe-3 mb-5">
                                    <div class="fs-5 fw-bold mb-2">
                                        You have received a new order:
                                    </div>

                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <div class="text-muted me-2 fs-7">
                                            Placed at 5:05 AM by
                                        </div>

                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Robert Rich">
                                            <img src="assets/media/avatars/300-4.jpg" alt="img" />
                                        </div>
                                    </div>
                                </div>

                                <div class="overflow-auto pb-5">
                                    <div
                                        class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
                                        <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M19.0687 17.9688H11.0687C10.4687 17.9688 10.0687 18.3687 10.0687 18.9688V19.9688C10.0687 20.5687 10.4687 20.9688 11.0687 20.9688H19.0687C19.6687 20.9688 20.0687 20.5687 20.0687 19.9688V18.9688C20.0687 18.3687 19.6687 17.9688 19.0687 17.9688Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M4.06875 17.9688C3.86875 17.9688 3.66874 17.8688 3.46874 17.7688C2.96874 17.4688 2.86875 16.8688 3.16875 16.3688L6.76874 10.9688L3.16875 5.56876C2.86875 5.06876 2.96874 4.46873 3.46874 4.16873C3.96874 3.86873 4.56875 3.96878 4.86875 4.46878L8.86875 10.4688C9.06875 10.7688 9.06875 11.2688 8.86875 11.5688L4.86875 17.5688C4.66875 17.7688 4.36875 17.9688 4.06875 17.9688Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>

                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                            <div class="mb-3 mb-md-0 fw-bold">
                                                <h4 class="text-gray-900 fw-bolder">
                                                    Database Backup Process Completed!
                                                </h4>
                                                <div class="fs-6 text-gray-700 pe-7">
                                                    Login into Admin Dashboard to make sure the data
                                                    integrity is OK
                                                </div>
                                            </div>

                                            <a href="#"
                                                class="btn btn-primary px-6 align-self-center text-nowrap">Proceed</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-line w-40px"></div>

                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            <div class="timeline-content mt-n1">
                                <div class="pe-3 mb-5">
                                    <div class="fs-5 fw-bold mb-2">
                                        New order
                                        <a href="#" class="text-primary fw-bolder me-1">#67890</a>is placed
                                        for Workshow Planning &amp; Budget Estimation
                                    </div>

                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <div class="text-muted me-2 fs-7">
                                            Placed at 4:23 PM by
                                        </div>

                                        <a href="#" class="text-primary fw-bolder me-1">Jimmy Bold</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer py-5 text-center" id="kt_activities_footer">
                <a href="../../demo1/dist/pages/user-profile/activity.html"
                    class="btn btn-bg-body text-primary">View All Activities

                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                transform="rotate(-180 18 13)" fill="currentColor" />
                            <path
                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat"
        data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end"
        data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">
        <div class="card w-100 rounded-0 border-0" id="kt_drawer_chat_messenger">
            <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
                <div class="card-title">
                    <div class="d-flex justify-content-center flex-column me-3">
                        <a href="#"
                            class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">Brian Cox</a>

                        <div class="mb-0 lh-1">
                            <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                            <span class="fs-7 fw-bold text-muted">Active</span>
                        </div>
                    </div>
                </div>

                <div class="card-toolbar">
                    <div class="me-2">
                        <button class="btn btn-sm btn-icon btn-active-light-primary" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <i class="bi bi-three-dots fs-3"></i>
                        </button>

                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                            data-kt-menu="true">
                            <div class="menu-item px-3">
                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                    Contacts
                                </div>
                            </div>

                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_users_search">Add Contact</a>
                            </div>

                            <div class="menu-item px-3">
                                <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_invite_friends">Invite Contacts
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="Specify a contact email to send an invitation"></i></a>
                            </div>

                            <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                data-kt-menu-placement="right-start">
                                <a href="#" class="menu-link px-3">
                                    <span class="menu-title">Groups</span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                            title="Coming soon">Create Group</a>
                                    </div>

                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                            title="Coming soon">Invite Members</a>
                                    </div>

                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                            title="Coming soon">Settings</a>
                                    </div>
                                </div>
                            </div>

                            <div class="menu-item px-3 my-1">
                                <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                    title="Coming soon">Settings</a>
                            </div>
                        </div>
                    </div>

                    <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <div class="card-body" id="kt_drawer_chat_messenger_body">
                <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true"
                    data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                    data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer"
                    data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
                    <div class="d-flex justify-content-start mb-10">
                        <div class="d-flex flex-column align-items-start">
                            <div class="d-flex align-items-center mb-2">
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                </div>

                                <div class="ms-3">
                                    <a href="#"
                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                    <span class="text-muted fs-7 mb-1">2 mins</span>
                                </div>
                            </div>

                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">
                                How likely are you to recommend our company to your friends
                                and family ?
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-10">
                        <div class="d-flex flex-column align-items-end">
                            <div class="d-flex align-items-center mb-2">
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">5 mins</span>
                                    <a href="#"
                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>

                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                </div>
                            </div>

                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                data-kt-element="message-text">
                                Hey there, we’re just writing to let you know that you’ve been
                                subscribed to a repository on GitHub.
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-start mb-10">
                        <div class="d-flex flex-column align-items-start">
                            <div class="d-flex align-items-center mb-2">
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                </div>

                                <div class="ms-3">
                                    <a href="#"
                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                    <span class="text-muted fs-7 mb-1">1 Hour</span>
                                </div>
                            </div>

                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">
                                Ok, Understood!
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-10">
                        <div class="d-flex flex-column align-items-end">
                            <div class="d-flex align-items-center mb-2">
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">2 Hours</span>
                                    <a href="#"
                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>

                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                </div>
                            </div>

                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                data-kt-element="message-text">
                                You’ll receive notifications for all issues, pull requests!
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-start mb-10">
                        <div class="d-flex flex-column align-items-start">
                            <div class="d-flex align-items-center mb-2">
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                </div>

                                <div class="ms-3">
                                    <a href="#"
                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                    <span class="text-muted fs-7 mb-1">3 Hours</span>
                                </div>
                            </div>

                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">
                                You can unwatch this repository immediately by clicking here:
                                <a href="https://ngenit.com">ngenit.com</a>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-10">
                        <div class="d-flex flex-column align-items-end">
                            <div class="d-flex align-items-center mb-2">
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">4 Hours</span>
                                    <a href="#"
                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>

                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                </div>
                            </div>

                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                data-kt-element="message-text">
                                Most purchased Business courses during this sale!
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-start mb-10">
                        <div class="d-flex flex-column align-items-start">
                            <div class="d-flex align-items-center mb-2">
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                </div>

                                <div class="ms-3">
                                    <a href="#"
                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                    <span class="text-muted fs-7 mb-1">5 Hours</span>
                                </div>
                            </div>

                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">
                                Company BBQ to celebrate the last quater achievements and
                                goals. Food and drinks provided
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
                        <div class="d-flex flex-column align-items-end">
                            <div class="d-flex align-items-center mb-2">
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">Just now</span>
                                    <a href="#"
                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>

                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                </div>
                            </div>

                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                data-kt-element="message-text"></div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
                        <div class="d-flex flex-column align-items-start">
                            <div class="d-flex align-items-center mb-2">
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                </div>

                                <div class="ms-3">
                                    <a href="#"
                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                    <span class="text-muted fs-7 mb-1">Just now</span>
                                </div>
                            </div>

                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">
                                Right before vacation season we have the next Big Deal for
                                you.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
                <textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input"
                    placeholder="Type a message"></textarea>

                <div class="d-flex flex-stack">
                    <div class="d-flex align-items-center me-2">
                        <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                            data-bs-toggle="tooltip" title="Coming soon">
                            <i class="bi bi-paperclip fs-3"></i>
                        </button>
                        <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                            data-bs-toggle="tooltip" title="Coming soon">
                            <i class="bi bi-upload fs-3"></i>
                        </button>
                    </div>

                    <button class="btn btn-primary" type="button" data-kt-element="send">
                        Send
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
    </div>

    <div class="modal fade" id="kt_modal_invite_friends" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog mw-650px">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <div class="text-center mb-13">
                        <h1 class="mb-3">Invite a Friend</h1>

                        <div class="text-muted fw-bold fs-5">
                            If you need more info, please check out
                            <a href="#" class="link-primary fw-bolder">FAQ Page</a>.
                        </div>
                    </div>

                    <div class="btn btn-light-primary fw-bolder w-100 mb-8">
                        <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg"
                            class="h-20px me-3" />Invite Gmail Contacts
                    </div>

                    <div class="separator d-flex flex-center mb-8">
                        <span class="text-uppercase bg-body fs-7 fw-bold text-muted px-3">or</span>
                    </div>

                    <textarea class="form-control form-control-solid mb-8" rows="3" placeholder="Type or paste emails here"></textarea>

                    <div class="mb-10">
                        <div class="fs-6 fw-bold mb-2">Your Invitations</div>

                        <div class="mh-300px scroll-y me-n7 pe-7">
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-6.jpg" />
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma
                                            Smith</a>
                                        <div class="fw-bold text-muted">smith@kpmg.com</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Melody
                                            Macy</a>
                                        <div class="fw-bold text-muted">melody@altbox.com</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Max Smith</a>
                                        <div class="fw-bold text-muted">max@kt.com</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-5.jpg" />
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Sean Bean</a>
                                        <div class="fw-bold text-muted">sean@dellito.com</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Brian Cox</a>
                                        <div class="fw-bold text-muted">brian@exchange.com</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-warning text-warning fw-bold">C</span>
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Mikaela
                                            Collins</a>
                                        <div class="fw-bold text-muted">mik@pex.com</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-9.jpg" />
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Francis
                                            Mitcham</a>
                                        <div class="fw-bold text-muted">f.mit@kpmg.com</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fw-bold">O</span>
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Olivia
                                            Wild</a>
                                        <div class="fw-bold text-muted">olivia@corpmail.com</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-primary text-primary fw-bold">N</span>
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Neil Owen</a>
                                        <div class="fw-bold text-muted">owen.neil@gmail.com</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-23.jpg" />
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Dan
                                            Wilson</a>
                                        <div class="fw-bold text-muted">dam@consilting.com</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma Bold</a>
                                        <div class="fw-bold text-muted">emma@intenso.com</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-12.jpg" />
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ana Crown</a>
                                        <div class="fw-bold text-muted">ana.cf@limtel.com</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-info text-info fw-bold">A</span>
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Robert
                                            Doe</a>
                                        <div class="fw-bold text-muted">robert@benko.com</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-13.jpg" />
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">John
                                            Miller</a>
                                        <div class="fw-bold text-muted">miller@mapple.com</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-success text-success fw-bold">L</span>
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Lucy
                                            Kunic</a>
                                        <div class="fw-bold text-muted">lucy.m@fentech.com</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/300-21.jpg" />
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ethan
                                            Wilder</a>
                                        <div class="fw-bold text-muted">ethan@loop.com.au</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-stack py-4">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-warning text-warning fw-bold">C</span>
                                    </div>

                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Mikaela
                                            Collins</a>
                                        <div class="fw-bold text-muted">mik@pex.com</div>
                                    </div>
                                </div>

                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-stack">
                        <div class="me-5 fw-bold">
                            <label class="fs-6">Adding Users by Team Members</label>
                            <div class="fs-7 text-muted">
                                If you need more info, please check budget planning
                            </div>
                        </div>

                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                            <span class="form-check-label fw-bold text-muted">Allowed</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_users_search" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <div class="text-center mb-13">
                        <h1 class="mb-3">Search Users</h1>
                        <div class="text-muted fw-bold fs-5">
                            Invite Collaborators To Your Project
                        </div>
                    </div>

                    <div id="kt_modal_users_search_handler" data-kt-search-keypress="true"
                        data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline">
                        <form data-kt-search-element="form" class="w-100 position-relative mb-5"
                            autocomplete="off">
                            <input type="hidden" />

                            <span
                                class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)"
                                        fill="currentColor" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>

                            <input type="text" class="form-control form-control-lg form-control-solid px-15"
                                name="search" value=""
                                placeholder="Search by username, full name or email..."
                                data-kt-search-element="input" />

                            <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                                data-kt-search-element="spinner">
                                <span class="spinner-border h-15px w-15px align-middle text-muted"></span>
                            </span>

                            <span
                                class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
                                data-kt-search-element="clear">
                                <span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                            rx="1" transform="rotate(-45 6 17.3137)"
                                            fill="currentColor" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                            transform="rotate(45 7.41422 6)" fill="currentColor" />
                                    </svg>
                                </span>
                            </span>
                        </form>

                        <div class="py-5">
                            <div data-kt-search-element="suggestions">
                                <h3 class="fw-bold mb-5">Recently searched:</h3>

                                <div class="mh-375px scroll-y me-n7 pe-7">
                                    <a href="#"
                                        class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                        <div class="symbol symbol-35px symbol-circle me-5">
                                            <img alt="Pic" src="assets/media/avatars/300-6.jpg" />
                                        </div>

                                        <div class="fw-bold">
                                            <span class="fs-6 text-gray-800 me-2">Emma Smith</span>
                                            <span class="badge badge-light">Art Director</span>
                                        </div>
                                    </a>

                                    <a href="#"
                                        class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                        <div class="symbol symbol-35px symbol-circle me-5">
                                            <span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                        </div>

                                        <div class="fw-bold">
                                            <span class="fs-6 text-gray-800 me-2">Melody Macy</span>
                                            <span class="badge badge-light">Marketing Analytic</span>
                                        </div>
                                    </a>

                                    <a href="#"
                                        class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                        <div class="symbol symbol-35px symbol-circle me-5">
                                            <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                        </div>

                                        <div class="fw-bold">
                                            <span class="fs-6 text-gray-800 me-2">Max Smith</span>
                                            <span class="badge badge-light">Software Enginer</span>
                                        </div>
                                    </a>

                                    <a href="#"
                                        class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                        <div class="symbol symbol-35px symbol-circle me-5">
                                            <img alt="Pic" src="assets/media/avatars/300-5.jpg" />
                                        </div>

                                        <div class="fw-bold">
                                            <span class="fs-6 text-gray-800 me-2">Sean Bean</span>
                                            <span class="badge badge-light">Web Developer</span>
                                        </div>
                                    </a>

                                    <a href="#"
                                        class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                        <div class="symbol symbol-35px symbol-circle me-5">
                                            <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                        </div>

                                        <div class="fw-bold">
                                            <span class="fs-6 text-gray-800 me-2">Brian Cox</span>
                                            <span class="badge badge-light">UI/UX Designer</span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div data-kt-search-element="results" class="d-none">
                                <div class="mh-375px scroll-y me-n7 pe-7">
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="0">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='0']"
                                                    value="0" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" src="assets/media/avatars/300-6.jpg" />
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma
                                                    Smith</a>
                                                <div class="fw-bold text-muted">smith@kpmg.com</div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2" selected="selected">Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>

                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="1">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='1']"
                                                    value="1" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <span
                                                    class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Melody
                                                    Macy</a>
                                                <div class="fw-bold text-muted">
                                                    melody@altbox.com
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1" selected="selected">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>

                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="2">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='2']"
                                                    value="2" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Max
                                                    Smith</a>
                                                <div class="fw-bold text-muted">max@kt.com</div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3" selected="selected">
                                                    Can Edit
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>

                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="3">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='3']"
                                                    value="3" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" src="assets/media/avatars/300-5.jpg" />
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Sean
                                                    Bean</a>
                                                <div class="fw-bold text-muted">sean@dellito.com</div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2" selected="selected">Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>

                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="4">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='4']"
                                                    value="4" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Brian
                                                    Cox</a>
                                                <div class="fw-bold text-muted">
                                                    brian@exchange.com
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3" selected="selected">
                                                    Can Edit
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>

                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="5">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='5']"
                                                    value="5" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <span
                                                    class="symbol-label bg-light-warning text-warning fw-bold">C</span>
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Mikaela
                                                    Collins</a>
                                                <div class="fw-bold text-muted">mik@pex.com</div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2" selected="selected">Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>

                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="6">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='6']"
                                                    value="6" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" src="assets/media/avatars/300-9.jpg" />
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Francis
                                                    Mitcham</a>
                                                <div class="fw-bold text-muted">f.mit@kpmg.com</div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3" selected="selected">
                                                    Can Edit
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>

                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="7">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='7']"
                                                    value="7" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <span
                                                    class="symbol-label bg-light-danger text-danger fw-bold">O</span>
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Olivia
                                                    Wild</a>
                                                <div class="fw-bold text-muted">
                                                    olivia@corpmail.com
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2" selected="selected">Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>

                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="8">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='8']"
                                                    value="8" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <span
                                                    class="symbol-label bg-light-primary text-primary fw-bold">N</span>
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Neil
                                                    Owen</a>
                                                <div class="fw-bold text-muted">
                                                    owen.neil@gmail.com
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1" selected="selected">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>

                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="9">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='9']"
                                                    value="9" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" src="assets/media/avatars/300-23.jpg" />
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Dan
                                                    Wilson</a>
                                                <div class="fw-bold text-muted">
                                                    dam@consilting.com
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3" selected="selected">
                                                    Can Edit
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>

                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="10">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='10']"
                                                    value="10" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <span
                                                    class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma
                                                    Bold</a>
                                                <div class="fw-bold text-muted">emma@intenso.com</div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2" selected="selected">Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>

                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="11">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='11']"
                                                    value="11" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" src="assets/media/avatars/300-12.jpg" />
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ana
                                                    Crown</a>
                                                <div class="fw-bold text-muted">
                                                    ana.cf@limtel.com
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1" selected="selected">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>

                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="12">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='12']"
                                                    value="12" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <span class="symbol-label bg-light-info text-info fw-bold">A</span>
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Robert
                                                    Doe</a>
                                                <div class="fw-bold text-muted">robert@benko.com</div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3" selected="selected">
                                                    Can Edit
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>

                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="13">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='13']"
                                                    value="13" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" src="assets/media/avatars/300-13.jpg" />
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">John
                                                    Miller</a>
                                                <div class="fw-bold text-muted">
                                                    miller@mapple.com
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3" selected="selected">
                                                    Can Edit
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>

                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="14">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='14']"
                                                    value="14" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <span
                                                    class="symbol-label bg-light-success text-success fw-bold">L</span>
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Lucy
                                                    Kunic</a>
                                                <div class="fw-bold text-muted">
                                                    lucy.m@fentech.com
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2" selected="selected">Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>

                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="15">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='15']"
                                                    value="15" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" src="assets/media/avatars/300-21.jpg" />
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ethan
                                                    Wilder</a>
                                                <div class="fw-bold text-muted">
                                                    ethan@loop.com.au
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1" selected="selected">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>

                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="16">
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='16']"
                                                    value="16" />
                                            </label>

                                            <div class="symbol symbol-35px symbol-circle">
                                                <span
                                                    class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                            </div>

                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Melody
                                                    Macy</a>
                                                <div class="fw-bold text-muted">
                                                    melody@altbox.com
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3" selected="selected">
                                                    Can Edit
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-center mt-15">
                                    <button type="reset" id="kt_modal_users_search_reset"
                                        data-bs-dismiss="modal" class="btn btn-active-light me-3">
                                        Cancel
                                    </button>
                                    <button type="submit" id="kt_modal_users_search_submit"
                                        class="btn btn-primary">
                                        Add Selected Users
                                    </button>
                                </div>
                            </div>

                            <div data-kt-search-element="empty" class="text-center d-none">
                                <div class="fw-bold py-10">
                                    <div class="text-gray-600 fs-3 mb-2">No users found</div>
                                    <div class="text-muted fs-6">
                                        Try to search by username, full name or email...
                                    </div>
                                </div>

                                <div class="text-center px-5">
                                    <img src="assets/media/illustrations/sketchy-1/1.png" alt=""
                                        class="w-100 h-200px h-sm-325px" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Solutin Start End -->
    @push('scripts')
        <!-- Gsap With Animation -->
        <script src="http://clou.agency/wp-content/themes/clou-digital-agency/js/frontpage/Scrollsmoother.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
        <script src="{{ asset('backend/metronic/solution/solution.js') }}"></script>
    @endpush
    @include('metronic.pages.solution.partials.script')
</x-admin-app-layout>
