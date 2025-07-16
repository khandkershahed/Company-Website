<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <a href="{{ route('admin.dashboard') }}">
            {{-- <img alt="Logo"
                src="{{ !empty(optional($setting)->site_logo_black) && file_exists(public_path('storage/' . optional($setting)->site_logo_white)) ? asset('storage/' . optional($setting)->site_logo_black) : asset('frontend/img/logo.png') }}"
                class="w-100px"> --}}
            <img alt="Logo" src="{{ asset('frontend/images/logo_black.png') }}" class="w-200px">
        </a>
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-dark aside-toggle active"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="currentColor"></path>
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="currentColor"></path>
                </svg>
            </span>
        </div>
    </div>
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0" style="height: 318px;">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <div class="menu-item">
                    <a class="menu-link {{ Route::is('admin.dashboard') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <span class="symbol-label">
                                    <span class="svg-icon svg-icon-2 svg-icon-primary">
                                        <i class="fa-regular fa-house-day fs-3 me-3 text-active-gray-400"></i>
                                    </span>
                                </span>
                            </span>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>

                {{-- Site Content  --}}
                @php
                    $menuItems = [
                        [
                            'title' => 'Supply Chain',
                            'icon' => 'fa-light fa-truck-field fs-3',
                            'routes' => [
                                'admin.brand.index',
                                'admin.brand.create',
                                'admin.brand.edit',
                                'admin.categories.index',
                                'admin.categories.create',
                                'admin.categories.edit',
                                'product-sourcing.index',
                                'product.saved',
                                'product.sourced',
                                'product.approved',
                                'product-sourcing.create',
                                'product-sourcing.edit',
                            ],
                            'subMenu' => [
                                [
                                    'title' => 'Brand Management',
                                    'routes' => ['admin.brand.index', 'admin.brand.create', 'admin.brand.edit'],
                                    'route' => 'admin.brand.index',
                                ],
                                [
                                    'title' => 'Category Management',
                                    'routes' => [
                                        'admin.category.index',
                                        'admin.category.create',
                                        'admin.category.edit',
                                    ],
                                    'route' => 'admin.category.index',
                                ],
                                // [
                                //     'title' => 'Category Management',
                                //     'routes' => ['admin.brand.index','brand.create', 'brand.edit'],
                                //     'route' => 'product-sourcing.index',
                                // ],
                                [
                                    'title' => 'Sourcing',
                                    'routes' => [
                                        'product-sourcing.index',
                                        'product.saved',
                                        'product.sourced',
                                        'product.approved',
                                        'product-sourcing.create',
                                        'product-sourcing.edit',
                                    ],
                                    'route' => 'product-sourcing.index',
                                ],
                            ],
                        ],
                        [
                            'title' => 'Business',
                            'icon' => 'fa-light fa-business-time fs-3',
                            'routes' => [
                                'admin.brands.index',
                                'admin.brands.create',
                                'admin.brands.edit',
                                'admin.categories.index',
                                'admin.categories.create',
                                'admin.categories.edit',
                                'admin.rfq.index',
                                'admin.rfq.create',
                                'admin.rfq.edit',
                                'single-rfq.quoation_mail',
                            ],
                            'subMenu' => [
                                [
                                    'title' => 'RFQ List',
                                    'routes' => [
                                        'admin.rfq.index',
                                        'admin.rfq.create',
                                        'admin.rfq.edit',
                                        'single-rfq.quoation_mail',
                                    ],
                                    'route' => 'admin.rfq.index',
                                ],
                            ],
                        ],
                        [
                            'title' => 'Site Contents',
                            'icon' => 'fa-duotone fa-sidebar-flip fs-3',
                            'routes' => [
                                'admin.solution-cms.index',
                                'admin.solution-cms.create',
                                'admin.solution-cms.edit',
                                'admin.site-content.index',
                                'admin.job-post.index',
                                'admin.job-post.create',
                                'admin.job-post.edit',
                            ],
                            'subMenu' => [
                                [
                                    'title' => 'Pages',
                                    'routes' => [
                                        'admin.site-content.index',
                                        'admin.job-post.index',
                                        'admin.job-post.create',
                                        'admin.job-post.edit',
                                    ],
                                    'route' => 'admin.site-content.index',
                                ],
                                [
                                    'title' => 'Solution CMS',
                                    'routes' => [
                                        'admin.solution-cms.index',
                                        'admin.solution-cms.create',
                                        'admin.solution-cms.edit',
                                    ],
                                    'route' => 'admin.solution-cms.index',
                                ],
                            ],
                        ],

                        [
                            'title' => 'CRM',
                            'icon' => 'fa-duotone fa-headphones-simple fs-3',
                            'routes' => ['admin.contact.index', 'admin.contact.create', 'admin.contact.edit'],
                            'subMenu' => [
                                [
                                    'title' => 'Contact Messages',
                                    'routes' => ['admin.contact.index', 'admin.contact.create', 'admin.contact.edit'],
                                    'route' => 'admin.contact.index',
                                ],
                            ],
                        ],
                        [
                            'title' => 'HR & Admin',
                            'icon' => 'fa-duotone fa-user-tie fs-3',
                            'routes' => ['admin.hrDashboard.index'],
                            'subMenu' => [
                                [
                                    'title' => 'Dashboard',
                                    'routes' => ['admin.hrDashboard.index'],
                                    'route' => 'admin.hrDashboard.index',
                                ],
                            ],
                        ],

                        [
                            'title' => 'Settings',
                            'icon' => 'fa-duotone fa-cog fs-3',
                            'routes' => ['admin.setting.index'],
                            'subMenu' => [
                                [
                                    'title' => 'Website Setting',
                                    'routes' => ['admin.setting.index'],
                                    'route' => 'admin.setting.index',
                                ],
                            ],
                        ],
                    ];
                @endphp

                @foreach ($menuItems as $item)
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion {{ Route::is(...$item['routes'] ?? []) ? 'here show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <i class="{{ $item['icon'] }}"></i>
                                </span>
                            </span>
                            <span class="menu-title">{{ $item['title'] }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        @if (!empty($item['subMenu']))
                            <div
                                class="menu-sub menu-sub-accordion {{ Route::is(...$item['routes'] ?? []) ? 'menu-active-bg' : '' }}">
                                @foreach ($item['subMenu'] as $subItem)
                                    @if (isset($subItem['subMenu']))
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                                            <span class="menu-link">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ $subItem['title'] }}</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <div
                                                class="menu-sub menu-sub-accordion {{ Route::is(...array_column($subItem['subMenu'], 'route') ?? []) ? 'here show' : '' }}">
                                                @foreach ($subItem['subMenu'] as $subSubItem)
                                                    <div class="menu-item">
                                                        @if (isset($subSubItem['route']))
                                                            <a class="menu-link {{ Route::is($subSubItem['route']) ? 'active' : '' }}"
                                                                href="{{ route($subSubItem['route']) }}">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span
                                                                    class="menu-title">{{ $subSubItem['title'] }}</span>
                                                            </a>
                                                        @else
                                                            <span class="menu-title">{{ $subSubItem['title'] }}</span>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <div class="menu-item">
                                            @if (isset($subItem['route']))
                                                <a class="menu-link {{ Route::is($subItem['routes']) ? 'active' : '' }}"
                                                    href="{{ route($subItem['route']) }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">{{ $subItem['title'] }}</span>
                                                </a>
                                            @else
                                                <span class="menu-title">{{ $subItem['title'] }}</span>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
        <form method="POST" action="{{ route('admin.logout') }}">
            <a href="{{ route('admin.logout') }}" class="btn btn-custom btn-primary w-100"
                onclick="event.preventDefault();this.closest('form').submit();">
                <span class="btn-label">
                    @csrf
                    <i class="fa-solid fa-right-from-bracket"></i> Log Out
                </span>
            </a>
        </form>
    </div>
</div>
