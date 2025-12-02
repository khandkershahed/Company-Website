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
                <div class="header-menu align-items-stretch me-4" data-kt-drawer="true"
                    data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                    data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle"
                    data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <!--begin::Menu-->
                    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">

                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                            class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3 align-items-center">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <i class="fas fa-cog"></i>
                                    </span>
                                </span>
                                <span class="menu-title">
                                    Quick Settings
                                    <i class="fas fa-arrow-down ms-2"></i>
                                </span>
                            </span>
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                {{-- <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
                                    <span class="menu-link py-3">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z" fill="currentColor" />
                                                    <path d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title">Projects</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="../../demo1/dist/apps/projects/list.html">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">My Projects</span>
                                            </a>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{ route('admin.industrial-sector.index') }}">
                                        <span class="menu-title">Industrial Sector
                                            <i class="fas fa-arrow-right ms-2"></i>
                                        </span>
                                    </a>
                                </div>
                                @if (Auth::user()->myDepartments(['super_admin', 'accounts']))
                                    <div class="menu-item">
                                        <a class="menu-link py-3" href="{{ route('admin.expense-categories.index') }}">
                                            <span class="menu-title">Expense Category
                                                <i class="fas fa-arrow-right ms-2"></i>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link py-3" href="{{ route('admin.expense-types.index') }}">
                                            <span class="menu-title">Expense Type
                                                <i class="fas fa-arrow-right ms-2"></i>
                                            </span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--end::Menu-->
                </div>
            </div>
            <div class="flex-shrink-0 d-flex align-items-stretch">
                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    @if (Route::currentRouteName() === 'admin.rfq.index' || Route::currentRouteName() == 'admin.archived.rfq')
                        <a class="btn btn-md btn-info me-3" href="{{ route('admin.sales.forecast') }}">Forecast</a>
                        <a class="btn btn-md btn-info me-4" href="{{ route('deal.create') }}">Deal</a>
                    @endif
                    @if (Route::currentRouteName() === 'admin.sales.forecast')
                    <a class="btn btn-md btn-info me-3" href="{{ route('admin.sales-dashboard.index') }}">Sales Dashboard</a>
                    <a class="btn btn-md btn-info me-4" href="{{ route('admin.rfq.index') }}">Rfqs</a>
                        <a class="btn btn-md btn-info me-3" href="javascript:void(0);">Notificaton</a>
                    @endif

                    @if (Route::currentRouteName() === 'deal.create')
                        <a class="btn btn-md btn-info me-4" href="{{ route('admin.rfq.index') }}">Rfqs</a>
                        <a class="btn btn-md btn-info me-4" href="{{ route('deal.index') }}">Deals List</a>
                        <a class="btn btn-md btn-info me-3" href="{{ route('admin.sales.forecast') }}">Forecast</a>
                    @endif
                    @if (Route::currentRouteName() === 'admin.marketing-plan.index')
                        <a class="btn btn-md btn-info me-4 d-none d-lg-block"
                            href="{{ route('admin.marketing-plan.create') }}">Add Marketing Plan</a>
                        <a class="btn btn-md btn-info me-4 d-none d-lg-block"
                            href="{{ route('admin.marketing-target.index') }}">Marketing Target</a>
                    @endif
                    @if (Route::currentRouteName() === 'admin.marketing-target.index')
                        {{-- <a class="btn btn-md btn-info me-4" href="{{ route('admin.marketing-plan.create') }}">Add Marketing Plan</a> --}}
                        <a class="btn btn-md btn-info me-4" href="{{ route('admin.marketing-target.create') }}">Add
                            Marketing Target</a>
                    @endif
                    @if (Route::currentRouteName() === 'admin.tender.index')
                        <a class="btn btn-md btn-info me-4" href="{{ route('admin.tender.create') }}">Add Tender
                            information</a>
                    @endif
                    @if (Route::currentRouteName() === 'admin.tender.create')
                        <a class="btn btn-md btn-info me-4" href="{{ route('admin.tender.index') }}">Tender Lists</a>
                    @endif
                    @if (Route::currentRouteName() === 'admin.marketing-dmar.create')
                        <a class="btn btn-md btn-info me-4"
                            href="{{ route('admin.marketing-dmar.index') }}">Marketing
                            DMAR</a>
                    @endif
                    @if (Route::currentRouteName() === 'admin.marketing-dmar.index')
                        <a class="btn btn-md btn-info me-4" href="{{ route('admin.marketing-dmar.create') }}">Set
                            DMAR</a>
                    @endif
                    @if (Route::currentRouteName() === 'product.saved')
                        <a class="btn btn-md btn-info me-4" href="{{ route('product-sourcing.index') }}">Sourced
                            Products</a>
                        <a class="btn btn-md btn-info me-4" href="{{ route('product.approved') }}">Approved
                            Products</a>
                    @endif
                    @if (in_array(Route::current()->getName(), ['product-sourcing.index', 'product.sourced']))
                        <a class="btn btn-md btn-info me-4" href="{{ route('product.saved') }}">Drafts</a>
                        <a class="btn btn-md btn-info me-4" href="{{ route('product.approved') }}">Approved
                            Products</a>
                    @endif
                    @if (Route::currentRouteName() === 'product.approved')
                        <a class="btn btn-md btn-info me-4" href="{{ route('product-sourcing.index') }}">Sourced
                            Products</a>
                        <a class="btn btn-md btn-info me-4" href="{{ route('product.saved') }}">Drafts</a>
                    @endif
                    @if (Route::currentRouteName() === 'admin.expenses.index')
                        <a class="btn btn-md btn-info me-4"
                            href="{{ route('admin.expense-categories.index') }}">Expense Category</a>
                        <a class="btn btn-md btn-info me-4" href="{{ route('admin.expense-types.index') }}">Expense
                            Type</a>
                    @endif
                    @if (Route::currentRouteName() === 'admin.expense-types.index')
                        <a class="btn btn-md btn-info me-4"
                            href="{{ route('admin.expense-categories.index') }}">Expense Category</a>
                        <a class="btn btn-md btn-info me-4" href="{{ route('admin.expenses.index') }}">Expenses</a>
                    @endif
                    @if (Route::currentRouteName() === 'admin.expense-categories.index')
                        <a class="btn btn-md btn-info me-4" href="{{ route('admin.expense-types.index') }}">Expense
                            Type</a>
                        <a class="btn btn-md btn-info me-4" href="{{ route('admin.expenses.index') }}">Expenses</a>
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
                @php
                    $ncount = Auth::user()->unreadNotifications()->count();
                @endphp

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
                            <a href="{{ route('admin.profile') }}" class="px-5 menu-link">My
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
