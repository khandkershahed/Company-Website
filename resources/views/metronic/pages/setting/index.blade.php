<x-admin-app-layout :title="'Website Setting'">
    <style>
        .nav-line-tabs .nav-item .nav-link.active,
        .nav-line-tabs .nav-item .nav-link:hover:not(.disabled),
        .nav-line-tabs .nav-item.show .nav-link {
            background-color: transparent;
            padding: 13px;
            color: #500066 !important;
        }
    </style>
    <div class="card">
        <div class="card-header align-items-center">
            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold">
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#general">
                        <span class="svg-icon svg-icon-2 me-2">
                            <i class="fas fa-home fs-3"></i>
                        </span>
                        General
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#smtp">
                        <span class="svg-icon svg-icon-2 me-2">
                            <i class="fa-solid fa-square-sliders fs-3"></i>
                        </span>
                        SMTP
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#seo">
                        <span class="svg-icon svg-icon-2 me-2">
                            <i class="fa-brands fa-searchengin fs-3"></i>
                        </span>
                        SEO
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#advanced">
                        <span class="svg-icon svg-icon-2 me-2">
                            <i class="fa-solid fa-gears fs-3"></i>
                        </span>
                        Advanced
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade active show" id="general" role="tabpanel">
                    @include('metronic.pages.setting.partials.general')
                </div>


                <div class="tab-pane fade" id="smtp" role="tabpanel">
                    @include('metronic.pages.setting.partials.smtp')
                </div>


                <div class="tab-pane fade" id="seo" role="tabpanel">
                    @include('metronic.pages.setting.partials.seo')
                </div>


                <div class="tab-pane fade" id="advanced" role="tabpanel">
                    @include('metronic.pages.setting.partials.advanced')
                </div>

            </div>
        </div>
    </div>
</x-admin-app-layout>
