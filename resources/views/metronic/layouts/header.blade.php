<div id="kt_header" class="shadow-sm header align-items-stretch">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                id="kt_aside_mobile_toggle">
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                            fill="currentColor" />
                        <path opacity="0.3"
                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                            fill="currentColor" />
                    </svg>
                </span>
            </div>
        </div>
        {{-- Breadcrumb --}}
        <div class="d-flex align-items-center">
            <a href="{{ url()->previous() }}" class="px-3 btn btn-sm btn-secondary rounded-3 me-2">
                <i class="fas fa-chevron-left"></i>
            </a>

            <nav aria-label="breadcrumb">
                <ol class="mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ ucfirst(Request::segment(2)) }}
                    </li>
                </ol>
            </nav>
        </div>



        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1 flex-lg-grow-0">
            <div class="d-flex align-items-stretch justify-content-center w-lg-75" id="kt_header_nav">
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
            <div class="flex-shrink-0 d-flex align-items-stretch">
                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    @if (Route::currentRouteName() == 'admin.rfq.index' || Route::currentRouteName() == 'admin.archived.rfq')
                        <a class="btn btn-md btn-info me-3" href="{{ route('admin.sales.forecast') }}">Forecast</a>
                        <a class="btn btn-md btn-info me-4" href="{{ route('deal.create') }}">Deal</a>
                    @endif
                    @if (Route::currentRouteName() == 'admin.sales.forecast')
                        <a class="btn btn-md btn-info me-3" href="{{ route('admin.business.index') }}">Business</a>
                        <a class="btn btn-md btn-info me-3" href="{{ route('admin.sales-dashboard.index') }}">Sales</a>
                        <a class="btn btn-md btn-info me-4" href="{{ route('admin.rfq.index') }}">Rfqs</a>
                    @endif

                    @if (Route::currentRouteName() == 'deal.create')
                        <a class="btn btn-md btn-info me-4" href="{{ route('admin.rfq.index') }}">Rfqs</a>
                        <a class="btn btn-md btn-info me-3" href="{{ route('admin.sales.forecast') }}">Forecast</a>
                    @endif
                    {{-- <div class="btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px"
                        data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-1">
                            <i class="fa-solid fa-bell fs-2"></i>
                        </span>

                    </div>

                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">

                        <div class="d-flex flex-column bgi-no-repeat rounded-top"
                            style="background-image:url('{{ asset('admin/assets/media/misc/pattern-1.jpg') }}')">

                            <h3 class="mt-10 mb-6 text-white fw-bold px-9">Notifications
                                <span class="opacity-75 fs-8 ps-3">24 reports</span>
                            </h3>

                        </div>

                    </div> --}}


                </div>

                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
                        data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">

                        <img src="{{ !empty(Auth::user()->photo) && file_exists(public_path('upload/Profile/admin/' . Auth::user()->photo)) ? asset('upload/Profile/admin/' . Auth::user()->photo) : asset('backend/assets/images/admin_profile.png') }}"
                            alt="">
                    </div>
                    <div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold fs-6 w-275px"
                        data-kt-menu="true">
                        <div class="px-3 menu-item">
                            <div class="px-3 menu-content d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <img src="{{ !empty(Auth::user()->photo) && file_exists(public_path('upload/Profile/admin/' . Auth::user()->photo)) ? asset('upload/Profile/admin/' . Auth::user()->photo) : asset('backend/assets/images/admin_profile.png') }}"
                                        alt="">
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bolder d-flex align-items-center fs-5">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <a href="mailto:{{ Auth::user()->email }}"
                                        class="fw-bold text-muted text-hover-primary fs-7"
                                        style="overflow-wrap: anywhere;">
                                        {{ Auth::user()->email }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="my-2 separator"></div>
                        <div class="px-5 menu-item">
                            <a href="" class="px-5 menu-link">My
                                Profile</a>
                        </div>
                        <div class="my-2 separator"></div>
                        {{-- <div class="px-5 menu-item" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                        </div> --}}
                        <div class="px-5 menu-item">
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <a href="{{ route('admin.logout') }}"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                    class="px-5 menu-link"> {{ __('Sign Out') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
