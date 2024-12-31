<div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom-white border-opacity-10 pt-0 pb-0"
style="background: url({{ asset('images/mandala-bg.jpg') }}) no-repeat center center; background-size: cover;">
    <div class="container-fluid">
        <div class="d-flex d-lg-none me-5">
            <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                <i class="ph-list"></i>
            </button>
            {{-- <button type="button" class="navbar-toggler sidebar-mobile-component-toggle rounded-pill">
                <i class="ph-arrow-down"></i>
            </button> --}}
        </div>

        <div class="navbar-brand flex-lg-0">
            <a href="{{ route('admin.dashboard') }}" class="d-inline-flex align-items-center">
                {{-- <img src="{{ !empty($setting->logo) && file_exists(public_path('storage/' . $setting->logo)) ? asset('storage/' . $setting->logo) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}"
                    alt="NGen IT" style="height: 51px;"> --}}
                <img src="{{ asset('frontend/images/ngen_logo_white.png') }}"
                    alt="NGen IT" style="height: 51px;">
            </a>
        </div>

        <ul class="nav flex-row">
            <li class="nav-item d-lg-none me-2">
                <a href="#navbar_search" class="navbar-nav-link navbar-nav-link-icon rounded-pill"
                    data-bs-toggle="collapse">
                    <i class="ph-clock"></i>
                </a>
            </li>

            {{-- <li class="nav-item nav-item-dropdown-lg dropdown">
                <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="dropdown">
                    <i class="ph-squares-four"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-scrollable-sm wmin-lg-900 p-0">
                    <div class="d-flex align-items-center border-bottom p-3">
                        <h6 class="mb-0">Important Links</h6>
                        <a href="#" class="ms-auto">
                            View all
                            <i class="ph-arrow-circle-right ms-1"></i>
                        </a>
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 g-0">
                        <div class="col">
                            <a href="{{ route('leave-application.show', Auth::user()->id) }}"
                                class="dropdown-item text-wrap h-100 align-items-start border-end-sm border-bottom p-3">
                                <div>
                                    <img src="{{ asset('backend/assets/images/demo/logos/1.svg') }}" class="h-40px mb-2"
                                        alt="">
                                    <div class="fw-semibold my-1">Leave Dashboard</div>
                                    <div class="text-muted">You can check your leave history and make leave application from here.</div>
                                </div>
                            </a>
                        </div>

                        <div class="col">
                            <button type="button"
                                class="dropdown-item text-wrap h-100 align-items-start border-bottom p-3">
                                <div>
                                    <img src="{{ asset('backend/assets/images/demo/logos/2.svg') }}" class="h-40px mb-2"
                                        alt="">
                                    <div class="fw-semibold my-1">Data catalog</div>
                                    <div class="text-muted">Discover, inventory, and organize data assets</div>
                                </div>
                            </button>
                        </div>

                        <div class="col">
                            <button type="button"
                                class="dropdown-item text-wrap h-100 align-items-start border-end-sm border-bottom border-bottom-sm-0 rounded-bottom-start p-3">
                                <div>
                                    <img src="../../../assets/images/demo/logos/3.svg" class="h-40px mb-2"
                                        alt="">
                                    <div class="fw-semibold my-1">Data governance</div>
                                    <div class="text-muted">The collaboration hub and data marketplace</div>
                                </div>
                            </button>
                        </div>

                        <div class="col">
                            <button type="button"
                                class="dropdown-item text-wrap h-100 align-items-start rounded-bottom-end p-3">
                                <div>
                                    <img src="../../../assets/images/demo/logos/4.svg" class="h-40px mb-2"
                                        alt="">
                                    <div class="fw-semibold my-1">Data privacy</div>
                                    <div class="text-muted">Automated provisioning of non-production datasets</div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </li> --}}
        </ul>

        <div class="navbar-collapse justify-content-center flex-lg-1 order-2 order-lg-1 collapse show"
            id="navbar_search">
            <div class="navbar-search flex-fill position-relative mt-2 mt-lg-0 mx-lg-3 d-sm-none d-lg-block">
                <div id="clock">
                    <!-- Time units wrapper -->
                    <span class="wrap-time">
                        <!-- Time unit - Day -->
                        <span class="time-unit">
                            <span class="large day">0</span>
                            <span class="small">DAY</span>
                        </span>
                        <!-- Time unit - Hours -->
                        <span class="time-unit">
                            <span class="large hours">00</span>
                            <span class="small">HOURS</span>
                        </span>
                        <span class="separator">:</span>
                        <!-- Time unit - Minutes -->
                        <span class="time-unit">
                            <span class="large minutes">00</span>
                            <span class="small">MINUTES</span>
                        </span>
                        <span class="separator">:</span>
                        <!-- Time unit - Seconds -->
                        <span class="time-unit">
                            <span class="large seconds">00</span>
                            <span class="small">SECONDS</span>
                        </span>
                        <!-- Time unit - Period -->
                        <span class="time-unit">
                            <span class="large period">AM</span>
                            <span class="small">PERIOD</span>
                        </span>
                    </span>
                </div>
            </div>
        </div>

        @php
            $ncount = Auth::user()
                ->unreadNotifications()
                ->count();
        @endphp

        <ul class="nav flex-row justify-content-end order-1 order-lg-2">
            <li class="nav-item ms-lg-2 me-2 mb-0">
                <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="offcanvas"
                    data-bs-target="#notifications">
                    <i class="ph-bell"></i>
                    <span
                        class="badge bg-yellow text-black position-absolute top-0 end-0 translate-middle-top zindex-1 rounded-pill mt-1 me-1">{{ $ncount }}</span>
                </a>
            </li>

            <li class="nav-item nav-item-dropdown-lg dropdown ms-2 mb-0">
                <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                    <div class="status-indicator-container">
                        <img src="{{ !empty(Auth::user()->photo) && file_exists(public_path('upload/Profile/admin/' . Auth::user()->photo)) ? asset('upload/Profile/admin/' . Auth::user()->photo) : asset('backend/assets/images/admin_profile.png') }}"
                            class="w-32px h-32px rounded-pill" alt="">
                        <span class="status-indicator bg-success"></span>
                    </div>
                    <span class="d-none d-lg-inline-block mx-lg-2">{{ Auth::user()->name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{ route('admin.profile') }}" class="dropdown-item">
                        <i class="ph-user-circle me-2"></i>
                        My profile
                    </a>
                    <a href="{{ route('admin.change.password') }}" class="dropdown-item">
                        <i class="ph-password"></i>
                        Change Password
                    </a>
                    {{-- <a href="#" class="dropdown-item">
                        <i class="ph-currency-circle-dollar me-2"></i>
                        My subscription
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ph-shopping-cart me-2"></i>
                        My orders
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ph-envelope-open me-2"></i>
                        My inbox
                        <span class="badge bg-primary rounded-pill ms-auto">26</span>
                    </a> --}}
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.profile') }}" class="dropdown-item">
                        <i class="ph-gear me-2"></i>
                        Account settings
                    </a>
                    <a href="{{ route('admin.logout') }}" class="dropdown-item">
                        <i class="ph-sign-out me-2"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
