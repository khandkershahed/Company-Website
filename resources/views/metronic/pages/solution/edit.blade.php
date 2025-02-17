<x-admin-app-layout :title="'Solution Create'">
    @include('metronic.pages.solution.partials.style')
    <section>
        <div class="container-fluid px-0">
            <div class="row main-preview">
                <div class="col-lg-2 col-md-3">
                    <div class="card">
                        <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-0 mb-3 mb-md-0 fs-6">
                            <li class="nav-item me-0 mb-md-2">
                                <a class="nav-link active btn btn-flex btn-active-success w-100" data-bs-toggle="tab"
                                    href="#template">
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bolder">Template Section</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item me-0 mb-md-2">
                                <a class="nav-link btn btn-flex btn-active-info w-100" data-bs-toggle="tab"
                                    href="#banner">
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bolder">Important Section</span>
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
                            {{-- <li class="nav-item ">
                                <a class="nav-link btn btn-flex btn-active-secondary w-100" data-bs-toggle="tab"
                                    href="#footer">
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bolder">Footer Section</span>
                                    </span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9">
                    <form action="{{ route('admin.solution-cms.update', $solution->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="template" role="tabpanel">
                                    <div class="card-header py-2">
                                        <h3 class="card-title">Choose Template</h3>
                                    </div>
                                    <div class="card-body">
                                        @include('metronic.pages.solution.edit_partials.template')
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="banner" role="tabpanel">
                                    <div class="card-header py-2">
                                        <h3 class="card-title">Banner Section</h3>
                                    </div>
                                    <div class="card-body">
                                        @include('metronic.pages.solution.edit_partials.banner')
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="content" role="tabpanel">
                                    <div class="card-header py-2">
                                        <h3 class="card-title">Write Content</h3>
                                    </div>
                                    <div class="card-body">
                                        @include('metronic.pages.solution.edit_partials.content')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="footer" role="tabpanel">
                                    <div class="card-header py-2">
                                        <h3 class="card-title">Choose Template</h3>
                                    </div>
                                    <div class="card-body">
                                        {{-- @include('metronic.pages.solution.edit_partials.banner') --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit"
                                    class="kt_docs_formvalidation_text_submit btn btn-primary me-2">
                                    <span class="indicator-label">
                                        Save Template
                                    </span>
                                    <span class="indicator-progress" style="display: none;">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                <!-- Next Button -->
                                <button type="submit" class="btn btn-primary d-flex align-items-center">Submit</button>
                                {{-- <a href="javascript:void(0)"
                                    class="btn btn-primary d-flex align-items-center">
                                    <span>Submit</span>
                                    <span><i class="fa-solid fa-arrow-right-long ps-2"></i></span>
                                </a> --}}
                                {{-- <a href="javascript:void(0)" onclick="goToTab(event, '#banner')"
                                    class="btn btn-primary d-flex align-items-center">
                                    <span>Submit</span>
                                    <span><i class="fa-solid fa-arrow-right-long ps-2"></i></span>
                                </a> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function goToTab(event, target) {
                event.preventDefault();
                var nextTab = new bootstrap.Tab(document.querySelector('a[href="' + target + '"]'));
                nextTab.show();
                document.querySelector(target).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        </script>
    @endpush
    @include('metronic.pages.solution.partials.script')
</x-admin-app-layout>
