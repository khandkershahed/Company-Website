<x-admin-app-layout :title="'Deal Create Form'">
    @include('metronic.pages.deal.partials.deal_css')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="px-0 app-container container-fluid px-lg-auto">
            <div class="d-flex align-items-center justify-content-center">
                <div class="container">
                    <div class="mt-4">
                        <div id="full-process-box">
                            <div class="mt-5 row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="mb-5 text-center">
                                        <h1 class="mb-0 rfq-title fw-bold text-primary"> Business Manager & Deal
                                            Information </h1>
                                        <div class="mt-2">
                                            <p class="mb-0 fs-7 text-muted"> Fill out the form below to complete the
                                                deal.<br>Review the details, confirm accuracy, submit, and update the
                                                status. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-0 mx-0 col-lg-10 col-12 px-lg-auto">
                                    <div class="border shadow-sm card">
                                        <div class="py-10 mx-0 row g-0 align-items-center card-header"
                                            style="background-color: #0b6476">

                                            <div class="col-lg-3 ps-5">
                                                <h4 class="text-white fw-bold mb-1 fs-6"> Sales Manager Details </h4>
                                                <ul class="mb-0 text-white ps-0 fs-7" style="list-style-type: none">
                                                    <li><span class="text-gray-400 fw-semibold me-1">Name:</span><span
                                                            class="text-white fw-semibold">{{ Auth::user()->name }}</span>
                                                    </li>
                                                    <li><span class="text-gray-400 fw-semibold me-1">Email:</span><a
                                                            href="mailto:{{ Auth::user()->email }}"
                                                            class="text-white text-hover-primary fw-semibold">{{ Auth::user()->email }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-center text-white col-lg-7 ps-0"></div>
                                            <div class="text-white col-lg-2 pe-5 text-end">
                                                <h4 class="text-white fw-bold mb-1 fs-6"> Deal Information </h4>
                                                <p class="mb-1 pe-2 fs-7"> <span class="fw-semibold">Date:</span> <span
                                                        class="text-white">{{ date('d M, Y') }}</span> </p>
                                                {{-- <div class="mt-2"> <button type="button" id="btnDraft"
                                                        class="btn btn-sm btn-light">Add Quick Draft</button> </div> --}}
                                            </div>
                                        </div>
                                        @include('metronic.pages.deal.partials.deal_form')
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div id="draft-box" style="display: none;">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="mb-5 text-center">
                                        <h1 class="mb-0 rfq-title fw-bold text-primary"> Save Deal as Quick Draft </h1>
                                        <div class="mt-2">
                                            <p class="mb-0 fs-7 text-muted"> Fill out the form below to save your deal
                                                as a draft. <br> You can review and update the details later before
                                                final submission. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="shadow-sm card rounded-1">
                                        <div class="py-5 card-header d-flex justify-content-between align-items-center"
                                            style="background-color: #f5f8fa">
                                            <div>
                                                <h4 class="fw-bold mb-0 fs-6">Quick Draft Form</h4>
                                            </div> <button type="button" id="btnFull"
                                                class="btn btn-sm btn-light-primary"> Go To Full Process </button>
                                        </div>
                                        <div class="card-body p-5">
                                            <form action="{{ route('admin.quick.deal.store') }}" method="post"
                                                enctype="multipart/form-data"> @csrf <div class="row gx-3">
                                                    <div class="mb-3 col-12"> <label for="quick_clientName"
                                                            class="form-label fs-7 fw-semibold required">Client
                                                            Name</label> <input type="text"
                                                            class="form-control form-control-sm" id="quick_clientName"
                                                            name="name" required> </div>
                                                    <div class="mb-3 col-md-4"> <label for="quick_companyName"
                                                            class="form-label fs-7 fw-semibold required">Company
                                                            Name</label> <input type="text"
                                                            class="form-control form-control-sm"
                                                            id="quick_companyName" name="company_name" required>
                                                    </div>
                                                    <div class="mb-3 col-md-4"> <label for="quick_clientEmail"
                                                            class="form-label fs-7 fw-semibold required">Client
                                                            Email</label> <input type="email"
                                                            class="form-control form-control-sm"
                                                            id="quick_clientEmail" name="email" required> </div>
                                                    <div class="mb-3 col-md-4"> <label for="quick_clientPhone"
                                                            class="form-label fs-7 fw-semibold required">Client
                                                            Phone</label> <input type="tel"
                                                            class="form-control form-control-sm"
                                                            id="quick_clientPhone" name="phone" required> </div>
                                                    <div class="mb-3 col-12"> <label for="quick_clientImage"
                                                            class="form-label fs-7 fw-semibold">Upload Image</label>
                                                        <input type="file" class="form-control form-control-sm"
                                                            id="quick_clientImage" name="client_image"
                                                            accept="image/*">
                                                    </div>
                                                    <div class="mb-3 col-12"> <label for="quick_clientMessage"
                                                            class="form-label fs-7 fw-semibold">Message / Notes</label>
                                                        <textarea class="form-control form-control-sm" id="quick_clientMessage" name="message" rows="3"></textarea>
                                                    </div>
                                                    <div class="mt-3 d-flex justify-content-end col-12"> <button
                                                            type="submit" class="btn btn-sm btn-primary"
                                                            style="background-color: #0b6476"> Add To Draft <i
                                                                class="fas fa-check fs-8 ms-1"></i> </button> </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')

        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

        @include('metronic.pages.deal.partials.deal_js')
    @endpush

</x-admin-app-layout>
