<div id="kt_aside" class="shadow-none aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
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
        <div id="kt_aside_toggle" class="w-auto px-0 btn btn-icon btn-active-color-dark aside-toggle active"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <span class="rotate-180 svg-icon svg-icon-1">
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
        <div class="my-5 hover-scroll-overlay-y my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
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
                {{-- @if ((Auth::user()->myDepartmentsInstance(['sales', 'marketing']) && Auth::user()->role === 'admin') || Auth::user()->myDepartmentsInstance(['super_admin']))
                    <div class="menu-item">
                        <a class="menu-link {{ Route::is('admin.dashboard') ? 'active' : '' }}"
                            href="{{ route('admin.dashboard') }}">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <span class="symbol-label">
                                        <span class="svg-icon svg-icon-2 svg-icon-primary">
                                            <i class="fa-solid fa-briefcase fs-3 me-3 text-active-gray-400"></i>
                                        </span>
                                    </span>
                                </span>
                            </span>
                            <span class="menu-title">Business Dashboard</span>
                        </a>
                    </div>
                @endif --}}


                @php
                    $menuItems = [
                        [
                            'title' => 'Business',
                            'icon' => 'fa-solid fa-suitcase fs-3',
                            'allowed_departments' => ['sales', 'marketing', 'super_admin'],
                            'routes' => [
                                'admin.rfq.index',
                                'admin.rfq.create',
                                'admin.rfq.edit',
                                'admin.single-rfq.quoation_mail',
                                'admin.sales.forecast',
                                'admin.sales.report',
                                'admin.sales.target',
                                'deal.index',
                                'deal.create',
                                'deal.edit',
                                'admin.sales-dashboard.index',
                                'admin.marketing.dashboard',
                                'admin.marketing-dmar.index',
                                'admin.marketing-dmar.create',
                                'admin.marketing-dmar.edit',
                                'admin.marketing-emar.index',
                                'admin.marketing-plan.index',
                                'admin.marketing-plan.create',
                                'admin.marketing-plan.edit',
                                'admin.marketing-target.index',
                                'admin.marketing-target.create',
                                'admin.marketing-target.edit',
                                'admin.tender-security.index',
                                'admin.tender-security.create',
                                'admin.tender-security.edit',
                                'admin.tender.index',
                                'admin.tender-sites.index',
                                'admin.tender-access-pass.index',
                            ],
                            'subMenu' => [
                                // [
                                //     'title' => 'Business Dashboard',
                                //     'icon' => 'fa-solid fa-chart-simple fs-3',
                                //     'allowed_departments' => ['sales', 'marketing', 'super_admin'],
                                //     'routes' => ['admin.business.dashboard'],
                                //     'route' => 'admin.business.dashboard',
                                // ],
                                [
                                    'title' => 'Sales',
                                    'icon' => 'fa-solid fa-badge-dollar fs-3',
                                    'allowed_departments' => ['sales', 'super_admin'],
                                    'routes' => [
                                        'admin.rfq.index',
                                        'admin.rfq.create',
                                        'admin.rfq.edit',
                                        'admin.single-rfq.quoation_mail',
                                        'admin.sales.forecast',
                                        'admin.sales.report',
                                        'admin.sales.target',
                                        'deal.index',
                                        'deal.create',
                                        'deal.edit',
                                        'admin.sales-dashboard.index',
                                    ],
                                    'subMenu' => [
                                        [
                                            'title' => 'Sales Dashboard',
                                            'routes' => ['admin.sales-dashboard.index'],
                                            'allowed_departments' => ['sales', 'super_admin'],
                                            'route' => 'admin.sales-dashboard.index',
                                        ],
                                        [
                                            'title' => 'RFQ Dashboard',
                                            'routes' => [
                                                'admin.rfq.index',
                                                'admin.rfq.create',
                                                'admin.rfq.edit',
                                                'admin.single-rfq.quoation_mail',
                                            ],
                                            'allowed_departments' => ['sales', 'super_admin'],
                                            'route' => 'admin.rfq.index',
                                        ],
                                        [
                                            'title' => 'Deals Drafts',
                                            'routes' => ['deal.index', 'deal.create', 'deal.edit'],
                                            'allowed_departments' => ['sales', 'super_admin'],
                                            'route' => 'deal.index',
                                        ],
                                        [
                                            'title' => 'Sales Forecast',
                                            'routes' => ['admin.sales.forecast'],
                                            'allowed_departments' => ['sales', 'super_admin'],
                                            'route' => 'admin.sales.forecast',
                                        ],
                                        [
                                            'title' => 'Sales Report',
                                            'routes' => ['admin.sales.report'],
                                            'allowed_departments' => ['sales', 'super_admin'],
                                            'route' => 'admin.sales.report',
                                        ],
                                        [
                                            'title' => 'Sales Target',
                                            'routes' => ['admin.sales.target'],
                                            'allowed_departments' => ['sales', 'super_admin'],
                                            'route' => 'admin.sales.target',
                                        ],
                                    ],
                                ],
                                [
                                    'title' => 'Marketing',
                                    'icon' => 'fa-light fa-business-time fs-3',
                                    'allowed_departments' => ['marketing', 'super_admin'],
                                    'routes' => [
                                        'admin.marketing.dashboard',
                                        'admin.marketing-dmar.index',
                                        'admin.marketing-dmar.create',
                                        'admin.marketing-dmar.edit',
                                        'admin.marketing-emar.index',
                                        'admin.marketing-plan.index',
                                        'admin.marketing-plan.create',
                                        'admin.marketing-plan.edit',
                                        'admin.marketing-target.index',
                                        'admin.marketing-target.create',
                                        'admin.marketing-target.edit',
                                        'admin.tender-security.index',
                                        'admin.tender-security.create',
                                        'admin.tender-security.edit',
                                        'admin.tender.index',
                                        'admin.tender-sites.index',
                                        'admin.tender-access-pass.index',
                                    ],
                                    'subMenu' => [
                                        [
                                            'title' => 'Marketing Dashboard',
                                            'allowed_departments' => ['marketing', 'super_admin'],
                                            'routes' => ['admin.marketing.dashboard'],
                                            'route' => 'admin.marketing.dashboard',
                                        ],
                                        [
                                            'title' => 'Marketing DMAR',
                                            'allowed_departments' => ['marketing', 'super_admin'],
                                            'routes' => [
                                                'admin.marketing-dmar.index',
                                                'admin.marketing-dmar.create',
                                                'admin.marketing-dmar.edit',
                                            ],
                                            'route' => 'admin.marketing-dmar.index',
                                        ],
                                        [
                                            'title' => 'Marketing EMAR',
                                            'allowed_departments' => ['marketing', 'super_admin'],
                                            'routes' => ['admin.marketing-emar.index'],
                                            'route' => 'admin.marketing-emar.index',
                                        ],
                                        [
                                            'title' => 'Marketing Plan',
                                            'allowed_departments' => ['marketing', 'super_admin'],
                                            'routes' => [
                                                'admin.marketing-plan.index',
                                                'admin.marketing-plan.create',
                                                'admin.marketing-plan.edit',
                                            ],
                                            'route' => 'admin.marketing-plan.index',
                                        ],
                                        [
                                            'title' => 'Marketing Target',
                                            'allowed_departments' => ['marketing', 'super_admin'],
                                            'routes' => [
                                                'admin.marketing-target.index',
                                                'admin.marketing-target.create',
                                                'admin.marketing-target.edit',
                                            ],
                                            'route' => 'admin.marketing-target.index',
                                        ],
                                        [
                                            'title' => 'Tender',
                                            'allowed_departments' => ['marketing', 'super_admin'],
                                            'routes' => [
                                                'admin.tender-security.index',
                                                'admin.tender-security.create',
                                                'admin.tender-security.edit',
                                                'admin.tender.index',
                                                'admin.tender-sites.index',
                                                'admin.tender-access-pass.index',
                                            ],
                                            'subMenu' => [
                                                [
                                                    'title' => 'Tender Records',
                                                    'allowed_departments' => ['marketing', 'super_admin'],
                                                    'routes' => ['admin.tender.index'],
                                                    'route' => 'admin.tender.index',
                                                ],
                                                [
                                                    'title' => 'Tenderer Sites',
                                                    'allowed_departments' => ['marketing', 'super_admin'],
                                                    'routes' => ['admin.tender-sites.index'],
                                                    'route' => 'admin.tender-sites.index',
                                                ],
                                                [
                                                    'title' => 'Tenderer eAccess',
                                                    'allowed_departments' => ['marketing', 'super_admin'],
                                                    'routes' => ['admin.tender-access-pass.index'],
                                                    'route' => 'admin.tender-access-pass.index',
                                                ],
                                                [
                                                    'title' => 'Tender Securities',
                                                    'allowed_departments' => ['marketing', 'super_admin'],
                                                    'routes' => [
                                                        'admin.tender-security.index',
                                                        'admin.tender-security.create',
                                                        'admin.tender-security.edit',
                                                    ],
                                                    'route' => 'admin.tender-security.index',
                                                ],
                                                [
                                                    'title' => 'Tender Compliances',
                                                    'allowed_departments' => ['marketing', 'super_admin'],
                                                    'routes' => ['admin.tender.index'],
                                                    'route' => 'admin.tender.index',
                                                ],
                                                [
                                                    'title' => 'Tender Submissions',
                                                    'allowed_departments' => ['marketing', 'super_admin'],
                                                    'routes' => ['admin.tender.index'],
                                                    'route' => 'admin.tender.index',
                                                ],
                                            ],
                                        ],
                                        [
                                            'title' => 'Contact Informations',
                                            'allowed_departments' => ['marketing', 'super_admin'],
                                            'routes' => [
                                                'admin.marketing-target.index',
                                                'admin.marketing-target.create',
                                                'admin.marketing-target.edit',
                                            ],
                                            'route' => 'admin.marketing-target.index',
                                        ],
                                    ],
                                ],
                            ],
                        ],

                        [
                            'title' => 'Site CRM',
                            'icon' => 'fa-duotone fa-sitemap fs-3',
                            'allowed_departments' => ['super_admin', 'site', 'crm'],
                            'routes' => [
                                'admin.brand.index',
                                'admin.supplychain.index',
                                'admin.brand.create',
                                'admin.brand.edit',
                                'admin.categories.index',
                                'admin.categories.create',
                                'admin.categories.edit',
                                'product.saved',
                                'product.sourced',
                                'product.approved',
                                'product-sourcing.index',
                                'product-sourcing.create',
                                'product-sourcing.edit',
                                'purchase.index',
                                'purchase.create',
                                'purchase.edit',
                                'purchase.show',
                                'admin.solution-cms.index',
                                'admin.solution-cms.create',
                                'admin.solution-cms.edit',
                                'admin.site-content.index',
                                'admin.job-post.index',
                                'admin.job-post.create',
                                'admin.job-post.edit',
                                'admin.row.index',
                                'admin.row.create',
                                'admin.row.edit',
                                'admin.blog.index',
                                'admin.blog.create',
                                'admin.blog.edit',
                                'admin.brandPage.index',
                                'admin.brandPage.create',
                                'admin.brandPage.edit',
                                'admin.catalogues.index',
                                'admin.catalogues.create',
                                'admin.catalogues.edit',
                                'admin.setting.index',
                            ],
                            'subMenu' => [
                                [
                                    'title' => 'Site',
                                    'allowed_departments' => ['super_admin', 'site'],
                                    'routes' => [
                                        'admin.brand.index',
                                        'admin.supplychain.index',
                                        'admin.brand.create',
                                        'admin.brand.edit',
                                        'admin.categories.index',
                                        'admin.categories.create',
                                        'admin.categories.edit',
                                        'product.saved',
                                        'product.sourced',
                                        'product.approved',
                                        'product-sourcing.index',
                                        'product-sourcing.create',
                                        'product-sourcing.edit',
                                        'purchase.index',
                                        'purchase.create',
                                        'purchase.edit',
                                        'purchase.show',
                                        'admin.solution-cms.index',
                                        'admin.solution-cms.create',
                                        'admin.solution-cms.edit',
                                        'admin.site-content.index',
                                        'admin.job-post.index',
                                        'admin.job-post.create',
                                        'admin.job-post.edit',
                                        'admin.row.index',
                                        'admin.row.create',
                                        'admin.row.edit',
                                        'admin.setting.index',
                                        'admin.blog.index',
                                        'admin.blog.create',
                                        'admin.blog.edit',
                                        'admin.brandPage.index',
                                        'admin.brandPage.create',
                                        'admin.brandPage.edit',
                                        'admin.catalogues.index',
                                        'admin.catalogues.create',
                                        'admin.catalogues.edit',
                                    ],
                                    'subMenu' => [
                                        [
                                            'title' => 'Site Management',
                                            'allowed_departments' => ['super_admin', 'site'],
                                            'routes' => ['admin.brand.index', 'admin.brand.create', 'admin.brand.edit'],
                                            'route' => 'admin.brand.index',
                                        ],

                                        [
                                            'title' => 'Product Management',
                                            'allowed_departments' => ['super_admin', 'site'],
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
                                        [
                                            'title' => 'Content Management',
                                            'allowed_departments' => ['super_admin', 'site'],
                                            'routes' => [
                                                'admin.site-content.index',
                                                'admin.row.index',
                                                'admin.row.create',
                                                'admin.row.edit',
                                                'admin.blog.index',
                                                'admin.blog.create',
                                                'admin.blog.edit',
                                                'admin.brandPage.index',
                                                'admin.brandPage.create',
                                                'admin.brandPage.edit',
                                                'admin.catalogues.index',
                                                'admin.catalogues.create',
                                                'admin.catalogues.edit',
                                            ],
                                            'route' => 'admin.site-content.index',
                                        ],
                                        [
                                            'title' => 'SEO Management',
                                            'allowed_departments' => ['super_admin', 'site'],
                                            'routes' => ['admin.setting.index'],
                                            'route' => 'admin.setting.index',
                                        ],
                                        [
                                            'title' => 'Brand Management',
                                            'allowed_departments' => ['super_admin', 'site'],
                                            'routes' => ['admin.brand.index', 'admin.brand.create', 'admin.brand.edit'],
                                            'route' => 'admin.brand.index',
                                        ],
                                        [
                                            'title' => 'Category Management',
                                            'allowed_departments' => ['super_admin', 'site'],
                                            'routes' => [
                                                'admin.category.index',
                                                'admin.category.create',
                                                'admin.category.edit',
                                            ],
                                            'route' => 'admin.category.index',
                                        ],

                                        [
                                            'title' => 'Solution CMS',
                                            'allowed_departments' => ['super_admin', 'site'],
                                            'routes' => [
                                                'admin.solution-cms.index',
                                                'admin.solution-cms.create',
                                                'admin.solution-cms.edit',
                                            ],
                                            'route' => 'admin.solution-cms.index',
                                        ],
                                    ],
                                    [
                                        'title' => 'CRM',
                                        'allowed_departments' => ['super_admin', 'crm'],
                                        'routes' => [
                                            'admin.contact.index',
                                            'admin.contact.create',
                                            'admin.contact.edit',
                                        ],
                                        'subMenu' => [
                                            [
                                                'title' => 'Contact Messages',
                                                'allowed_departments' => ['super_admin', 'supplychain'],
                                                'routes' => [
                                                    'admin.contact.index',
                                                    'admin.contact.create',
                                                    'admin.contact.edit',
                                                ],
                                                'route' => 'admin.contact.index',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],

                        [
                            'title' => 'HR & Admin',
                            'icon' => 'fa-duotone fa-users fs-3',
                            'allowed_departments' => ['hr', 'super_admin'],
                            'routes' => ['admin.hrDashboard.index', 'admin.employee.index', 'admin.attendance.history'],
                            'subMenu' => [
                                [
                                    'title' => 'HR Admin Dashboard',
                                    'allowed_departments' => ['hr', 'super_admin'],
                                    'routes' => ['admin.hrDashboard.index'],
                                    'route' => 'admin.hrDashboard.index',
                                ],
                                [
                                    'title' => 'Attendance, Leave , Movement History',
                                    'allowed_departments' => ['hr', 'super_admin'],
                                    'routes' => ['admin.attendance.history'],
                                    'route' => 'admin.attendance.history',
                                ],
                                [
                                    'title' => 'Employee List',
                                    'allowed_departments' => ['hr', 'super_admin'],
                                    'routes' => ['admin.employee.index'],
                                    'route' => 'admin.employee.index',
                                ],
                            ],
                        ],
                        [
                            'title' => 'Supply Chain',
                            'icon' => 'fa-duotone fa-truck fs-3',
                            'allowed_departments' => ['super_admin', 'supplychain'],
                            'routes' => ['purchase.index', 'purchase.create', 'purchase.edit', 'purchase.show'],
                            'subMenu' => [
                                [
                                    'title' => 'Purchase Management',
                                    'allowed_departments' => ['super_admin', 'supplychain'],
                                    'routes' => ['purchase.index', 'purchase.create', 'purchase.edit', 'purchase.show'],
                                    'route' => 'purchase.index',
                                ],
                            ],
                        ],

                        [
                            'title' => 'Accounts',
                            'icon' => '	fas fa-chart-pie fs-3',
                            'allowed_departments' => ['super_admin', 'accounts'],
                            'routes' => ['accounts-finance.index'],
                            'subMenu' => [
                                // [
                                //     'title' => 'Dashboard',
                                //     'allowed_departments' => [
                                //         'super_admin',
                                //         'accounts',
                                //     ],
                                //     'routes' => ['admin.hrDashboard.index'],
                                //     'route' => 'admin.hrDashboard.index',
                                // ],
                                [
                                    'title' => 'Expenses',
                                    'allowed_departments' => ['super_admin', 'accounts'],
                                    'routes' => ['admin.expenses.index','admin.expenses.index','admin.expenses.index'],
                                    'route' => 'admin.expenses.index',
                                ],
                                // [
                                //     'title' => 'Attendance, Leave , Movement History',
                                //     'allowed_departments' => [
                                //         'super_admin',
                                //         'sales',
                                //         'marketing',
                                //         'accounts',
                                //         'site',
                                //         'supplychain',
                                //         'crm',
                                //         'hr',
                                //     ],
                                //     'routes' => ['admin.attendance.history'],
                                //     'route' => 'admin.attendance.history',
                                // ],
                                // [
                                //     'title' => 'Employee List',
                                //     'allowed_departments' => [
                                //         'super_admin',
                                //         'sales',
                                //         'marketing',
                                //         'accounts',
                                //         'site',
                                //         'supplychain',
                                //         'crm',
                                //         'hr',
                                //     ],
                                //     'routes' => ['admin.employee.index'],
                                //     'route' => 'admin.employee.index',
                                // ],
                            ],
                        ],
                        [
                            'title' => 'My HR',
                            'icon' => 'fa-duotone fa-clock fs-3',
                            'allowed_departments' => [
                                'super_admin',
                                'sales',
                                'marketing',
                                'accounts',
                                'site',
                                'supplychain',
                                'crm',
                                'hr',
                            ],
                            'routes' => ['admin.profile'],
                            'subMenu' => [
                                [
                                    'title' => 'My Tasks',
                                    'allowed_departments' => [
                                        'super_admin',
                                        'sales',
                                        'marketing',
                                        'accounts',
                                        'site',
                                        'supplychain',
                                        'crm',
                                        'hr',
                                    ],
                                    'routes' => ['admin.profile'],
                                    'route' => 'admin.profile',
                                ],
                                [
                                    'title' => 'My Attendance',
                                    'allowed_departments' => [
                                        'super_admin',
                                        'sales',
                                        'marketing',
                                        'accounts',
                                        'site',
                                        'supplychain',
                                        'crm',
                                        'hr',
                                    ],
                                    'routes' => ['admin.profile'],
                                    'route' => 'admin.profile',
                                ],
                                [
                                    'title' => 'My Leave',
                                    'allowed_departments' => [
                                        'super_admin',
                                        'sales',
                                        'marketing',
                                        'accounts',
                                        'site',
                                        'supplychain',
                                        'crm',
                                        'hr',
                                    ],
                                    'routes' => ['admin.profile'],
                                    'route' => 'admin.profile',
                                ],
                                [
                                    'title' => 'My KPI',
                                    'allowed_departments' => [
                                        'super_admin',
                                        'sales',
                                        'marketing',
                                        'accounts',
                                        'site',
                                        'supplychain',
                                        'crm',
                                        'hr',
                                    ],
                                    'routes' => ['admin.profile'],
                                    'route' => 'admin.profile',
                                ],
                                [
                                    'title' => 'My Evalution',
                                    'allowed_departments' => [
                                        'super_admin',
                                        'sales',
                                        'marketing',
                                        'accounts',
                                        'site',
                                        'supplychain',
                                        'crm',
                                        'hr',
                                    ],
                                    'routes' => ['admin.profile'],
                                    'route' => 'admin.profile',
                                ],
                                [
                                    'title' => 'My Remuneration',
                                    'allowed_departments' => [
                                        'super_admin',
                                        'sales',
                                        'marketing',
                                        'accounts',
                                        'site',
                                        'supplychain',
                                        'crm',
                                        'hr',
                                    ],
                                    'routes' => ['admin.profile'],
                                    'route' => 'admin.profile',
                                ],
                                [
                                    'title' => 'My Profile',
                                    'allowed_departments' => [
                                        'super_admin',
                                        'sales',
                                        'marketing',
                                        'accounts',
                                        'site',
                                        'supplychain',
                                        'crm',
                                        'hr',
                                    ],
                                    'routes' => ['admin.profile'],
                                    'route' => 'admin.profile',
                                ],
                            ],
                        ],
                    ];
                @endphp

                @php
                    function filterMenuByDepartment($items)
                    {
                        $user = Auth::user();
                        $filtered = [];

                        foreach ($items as $item) {
                            $allowed = $item['allowed_departments'] ?? ['super_admin'];
                            $hasAccess = $user->myDepartments($allowed);

                            if (!empty($item['subMenu'])) {
                                $item['subMenu'] = filterMenuByDepartment($item['subMenu']);
                            }

                            if ($hasAccess || !empty($item['subMenu'])) {
                                $filtered[] = $item;
                            }
                        }

                        return $filtered;
                    }

                    $filteredMenu = filterMenuByDepartment($menuItems);
                @endphp

                {{-- Recursive menu rendering --}}
                @include('metronic.layouts.menu-recursive', ['items' => $filteredMenu])

                {{-- --- RENDER MENU (Metronic-compatible) --- --}}
                {{-- @foreach ($menuItems as $item)
                    @php
                        $isActive = isset($item['route']) && Route::is($item['route']);
                        $hasSubMenu = !empty($item['subMenu']);
                    @endphp

                    @if ($hasSubMenu)
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{ Route::is(...$item['routes'] ?? []) ? 'here show' : '' }}">
                            <span class="menu-link">
                                @if (isset($item['icon']))
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-2">
                                            <i class="{{ $item['icon'] }}"></i>
                                        </span>
                                    </span>
                                @else
                                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                @endif
                                <span class="menu-title">{{ $item['title'] }}</span>
                                <span class="menu-arrow"></span>
                            </span>

                            <div class="menu-sub menu-sub-accordion">
                                @include('components.menu-recursive', ['items' => $item['subMenu']])
                            </div>
                        </div>
                    @else
                        <div class="menu-item">
                            <a class="menu-link {{ $isActive ? 'active' : '' }}"
                                href="{{ isset($item['route']) ? route($item['route']) : '#' }}">
                                @if (isset($item['icon']))
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-2">
                                            <i class="{{ $item['icon'] }}"></i>
                                        </span>
                                    </span>
                                @else
                                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                @endif
                                <span class="menu-title">{{ $item['title'] }}</span>
                            </a>
                        </div>
                    @endif
                @endforeach --}}


            </div>
        </div>
    </div>
    <div class="px-5 pt-5 aside-footer flex-column-auto pb-7" id="kt_aside_footer">
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
