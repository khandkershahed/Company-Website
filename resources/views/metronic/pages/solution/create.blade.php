<x-admin-app-layout :title="'Solution Create'">
    @include('metronic.pages.solution.partials.style')
    <section>
        <div class="container-fluid px-0">
            <div class="row main-preview">
                <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6">
                    <li class="nav-item me-0 mb-md-2">
                        <a class="nav-link active btn btn-flex btn-active-light-success" data-bs-toggle="tab"
                            href="#kt_vtab_pane_4">
                            <span class="svg-icon svg-icon-2"><svg>...</svg></span>
                            <span class="d-flex flex-column align-items-start">
                                <span class="fs-4 fw-bolder">Link 1</span>
                                <span class="fs-7">Description</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item me-0 mb-md-2">
                        <a class="nav-link btn btn-flex btn-active-light-info" data-bs-toggle="tab"
                            href="#kt_vtab_pane_5">
                            <span class="svg-icon svg-icon-2"><svg>...</svg></span>
                            <span class="d-flex flex-column align-items-start">
                                <span class="fs-4 fw-bolder">Link 2</span>
                                <span class="fs-7">Description</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link btn btn-flex btn-active-light-danger" data-bs-toggle="tab"
                            href="#kt_vtab_pane_6">
                            <span class="svg-icon svg-icon-2"><svg>...</svg></span>
                            <span class="d-flex flex-column align-items-start">
                                <span class="fs-4 fw-bolder">Link 3</span>
                                <span class="fs-7">Description</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    @push('scripts')
        <!-- Gsap With Animation -->
        <script src="http://clou.agency/wp-content/themes/clou-digital-agency/js/frontpage/Scrollsmoother.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
        <script src="{{ asset('backend/metronic/solution/solution.js') }}"></script>
    @endpush
    @include('metronic.pages.solution.partials.script')
</x-admin-app-layout>
