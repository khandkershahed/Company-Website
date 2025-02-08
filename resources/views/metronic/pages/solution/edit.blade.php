<x-admin-app-layout :title="'Solution Create'">
    @include('metronic.pages.solution.partials.style')
    <section>
        <div class="container-fluid px-0">
            <div class="row main-preview">
                <div class="col-lg-2">
                    <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6">
                        <li class="nav-item me-0 mb-md-2">
                            <a class="nav-link active btn btn-flex btn-active-success w-100" data-bs-toggle="tab"
                                href="#template">
                                <span class="d-flex flex-column align-items-start">
                                    <span class="fs-4 fw-bolder">Template</span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item me-0 mb-md-2">
                            <a class="nav-link btn btn-flex btn-active-info w-100" data-bs-toggle="tab"
                                href="#banner">
                                <span class="d-flex flex-column align-items-start">
                                    <span class="fs-4 fw-bolder">Banner Section</span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link btn btn-flex btn-active-danger w-100" data-bs-toggle="tab"
                                href="#content">
                                <span class="d-flex flex-column align-items-start">
                                    <span class="fs-4 fw-bolder">Content Section</span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link btn btn-flex btn-active-danger w-100" data-bs-toggle="tab"
                                href="#footer">
                                <span class="d-flex flex-column align-items-start">
                                    <span class="fs-4 fw-bolder">Footer Section</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-10">
                    <form action="{{ route('admin.solution-cms.edit', $solution->id) }}" method="post"
                        enctype="multipart/form-data">
                        <div class="card">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="template" role="tabpanel">
                                    <div class="card-header py-2">
                                        <h3 class="card-title">Choose Template</h3>
                                    </div>
                                    <div class="card-body">
                                        
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="banner" role="tabpanel">
                                    ...
                                </div>

                                <div class="tab-pane fade" id="content" role="tabpanel">
                                    ...
                                </div>
                                <div class="tab-pane fade" id="footer" role="tabpanel">
                                    ...
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- @push('scripts')
        <!-- Gsap With Animation -->
        <script src="http://clou.agency/wp-content/themes/clou-digital-agency/js/frontpage/Scrollsmoother.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
        <script src="{{ asset('backend/metronic/solution/solution.js') }}"></script>
    @endpush --}}
    @include('metronic.pages.solution.partials.script')
</x-admin-app-layout>
