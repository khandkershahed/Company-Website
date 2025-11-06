<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg sidebar-main-resized"
style="background: url('{{ asset('images/mandala-bg.jpg') }}') no-repeat center center; background-size: cover;">
    <!-- Sidebar content -->
    <div class="sidebar-content">
        <!-- Sidebar header -->
        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Ngen It</h5>
                <div>
                    <button type="button"
                        class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>
                    <button type="button"
                        class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->
        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="ph-house"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                @if (Auth::user()->can('sourcing-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="fas fa-boxes"></i>
                            <span>Product Sourcing, SAS</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            @if (Auth::user()->can('product-sourcing.menu'))
                                <li class="nav-item"><a href="{{ route('product-sourcing.index') }}" class="nav-link"><i
                                            class="ph-layout"></i>
                                        <span>Product Sourcing</span>
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->can('product-approval.menu'))
                                <li class="nav-item"><a href="{{ route('product.approve') }}" class="nav-link"><i class="ph-layout"></i>
                                        <span>Product Approval</span>
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->can('product-sas.menu'))
                                <li class="nav-item"><a href="{{ route('sas.index') }}" class="nav-link"><i
                                            class="ph-layout"></i>
                                        <span>SAS List </span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('product-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="fas fa-boxes"></i>
                            <span>Product, Category, Brand</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item"><a href="{{ route('category.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Category</span></a></li>
                            <li class="nav-item"><a href="{{ route('admin.brand.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Brand</span></a></li>
                            <li class="nav-item"><a href="{{ route('all.product') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Product</span></a></li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('rfq-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="fas fa-industry"></i>
                            <span>RFQ, Deal, Quote</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item"><a href="{{ route('rfq-manage.index') }}" class="nav-link">
                                <i class="ph-layout"></i>
                                <span>RFQ Management</span></a>
                            </li>
                            {{-- <li class="nav-item"><a href="{{ route('rfq.index') }}" class="nav-link">
                                <i class="ph-layout"></i>
                                <span>RFQ list</span></a>
                            </li>
                            <li class="nav-item"><a href="{{ route('deal.index') }}" class="nav-link">
                                <i class="ph-layout"></i>
                                <span>Deals list</span></a>
                            </li>
                            <li class="nav-item"><a href="{{ route('deal-sas.index') }}" class="nav-link">
                                <i class="ph-layout"></i>
                                <span>Deals SAS list</span></a>
                            </li> --}}
                            <li class="nav-item"><a href="{{ route('deal.create') }}" class="nav-link">
                                <i class="ph-layout"></i>
                                <span>Deal Registration</span></a>
                            </li>
                            <li class="nav-item"><a href="{{ route('revised-deal.index') }}" class="nav-link">
                                <i class="ph-layout"></i>
                                <span>Revised Deal</span></a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('sales-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="fas fa-boxes"></i>
                            <span>Sales</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item"><a href="{{ route('salesYearTarget.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Year Target</span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('salesTeamTarget.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Team Target</span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('sales-achievement.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Sales Achievement</span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('rfqOrderStatus.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Sales Order Status</span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('sales-forcast.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Sales Forcast</span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('sales-profit-loss.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Sales Profit Loss</span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('commercial-document.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Commercial Documents</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('accounts-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="fas fa-boxes"></i>
                            <span>Accounts</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item">
                                <a href="{{ route('account-profit-loss.index') }}" class="nav-link">
                                    <i class="ph-layout"></i>
                                    <span>Accounts Profit Loss</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('account-payable.index') }}" class="nav-link">
                                    <i class="ph-layout"></i>
                                    <span>Payable</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('account-receivable.index') }}" class="nav-link">
                                    <i class="ph-layout"></i>
                                    <span>Receivable</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('purchase.index') }}" class="nav-link">
                                    <i class="ph-layout"></i>
                                    <span>Purchase</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('income-expense.overview') }}" class="nav-link">
                                    <i class="ph-layout"></i>
                                    <span>Income & Expense</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('marketing-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="fas fa-boxes"></i>
                            <span>Marketing</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item"><a href="{{ route('marketing-manager-role.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Marketing Manager Role</span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('marketing-team-target.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Marketing Team Target</span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('admin.marketing-dmar.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Marketing DMAR</span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('knowledge.index') }}" class="nav-link"><i
                                class="ph-layout"></i>
                                    <span>Knowledge</span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('presentation.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Presentation</span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('show-case-video.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Show Case Video</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('industry-solutions-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="fas fa-industry"></i>
                            <span>Solution & Industry</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            {{-- <li class="nav-item"><a href="{{ route('solution.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Solution</span></a></li> --}}
                            <li class="nav-item"><a href="{{ route('industry.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Industry</span></a></li>
                            <li class="nav-item"><a href="{{ route('solutionDetails.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Solution Details</span></a></li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('feature-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="ph-layout"></i>
                            <span>Success, Features</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item"><a href="{{ route('success.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Client Success</span></a></li>
                            <li class="nav-item">
                                <a href="{{ route('feature.index') }}" class="nav-link">
                                    <i class="ph-tree"></i>
                                    <span>
                                        Features
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('blog-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="ph-layout"></i>
                            <span>Client Story, Blog, Tech Glossy</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item">
                                <a href="{{ route('clientstory.index') }}" class="nav-link">
                                    <i class="ph-tree"></i>
                                    <span>
                                        Client Story
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.blog.index') }}" class="nav-link">
                                    <i class="ph-tree"></i>
                                    <span>
                                        Blog
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('techglossy.index') }}" class="nav-link">
                                    <i class="ph-tree"></i>
                                    <span>
                                        Tech Glossy
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('sitesettings-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="ph-layout"></i>
                            <span>Site Settings</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item">
                                <a href="{{ route('setting.index') }}" class="nav-link">
                                    <i class="ph-gear"></i>
                                    <span>
                                        Website Settings
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('country.index') }}" class="nav-link"><i class="ph-layout"></i>
                                    <span>Region & Country</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('payment-method-details.index') }}" class="nav-link"><i class="ph-layout"></i>
                                    <span>Payment Method Details</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('deal-type-settings.index') }}" class="nav-link"><i class="ph-layout"></i>
                                    <span>Deal Type Settings</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('effort-ratings.index') }}" class="nav-link"><i class="ph-layout"></i>
                                    <span>Effort Ratings</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('technology-data.index') }}" class="nav-link"><i class="ph-layout"></i>
                                    <span>Technology Data</span></a>
                            </li>
                            <li class="nav-item"><a href="{{ route('office-location.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Office Location</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('support-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="icon-envelop4"></i>
                            <span>Support, Contact, NewsLetter</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item"><a href="{{ route('support.all') }}" class="nav-link"><i
                                        class="ph-headset"></i>
                                    <span>Support</span></a></li>
                            <li class="nav-item"><a href="{{ route('contact.index') }}" class="nav-link"><i
                                        class="mi-message"></i>
                                    <span>Contact</span></a></li>
                            <li class="nav-item"><a href="{{ route('newsLetter.index') }}" class="nav-link"><i
                                        class="ph-envelope-open"></i>
                                    <span>NewsLetter</span></a></li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('account-approval-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="icon-envelop4"></i>
                            <span>Account Approval & Settings</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item"><a href="{{ route('clientPermission.index') }}" class="nav-link">
                                    <i class="ph-user-plus"></i>
                                    <span>
                                        Client Approval
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('partnerPermission.index') }}" class="nav-link">
                                    <i class="ph-user-plus"></i>
                                    <span>
                                        Partner Approval
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('partner-account.index') }}" class="nav-link">
                                    <i class="ph-user-plus"></i>
                                    <span>
                                        Partners
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('sales-account.index') }}" class="nav-link"><i
                                        class="ph-user-plus"></i>
                                    <span>Sales Manager </span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('accounts-manager.index') }}" class="nav-link"><i
                                        class="ph-user-plus"></i>
                                    <span>Accounts Manager </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('row-builder-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="ph-buildings"></i>
                            <span>Row, Column, Card Builder</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item">
                                <a href="{{ route('admin.row.index') }}" class="nav-link">
                                    <i class="ph-tree"></i>
                                    <span>
                                        Row
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('rowWithCol.index') }}" class="nav-link">
                                    <i class="ph-tree"></i>
                                    <span>
                                        Row With Column
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('solutionCard.index') }}" class="nav-link">
                                    <i class="ph-tree"></i>
                                    <span>
                                        Card
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('page-builder-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="ph-buildings"></i>
                            <span>Page Builder</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item">
                                <a href="{{ route('learnMore.index') }}" class="nav-link">
                                    <i class="ph-tree"></i>
                                    <span>
                                        Learn More
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('allpage') }}" class="nav-link"><i
                                        class="ph-headset"></i>
                                    <span>Home Page</span></a></li>
                            <li class="nav-item"><a href="{{ route('industryPage.index') }}" class="nav-link"><i
                                        class="mi-message"></i>
                                    <span>Industry Page</span></a></li>
                            <li class="nav-item"><a href="{{ route('brandPage.index') }}" class="nav-link"><i
                                        class="mi-message"></i>
                                    <span>Brand Page</span></a></li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('order-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="ph-shopping-cart"></i>
                            <span>Order Module</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item"> <a class="nav-link" href="{{ route('pending.order') }}"><i
                                        class="ph-shopping-bag"></i><span>Pending Order</span> </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.confirmed.order') }}"><i
                                        class="ph-shopping-bag"></i><span>Confirmed Order</span> </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.processing.order') }}"><i
                                        class="ph-shopping-bag"></i><span>Processing Order</span> </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.delivered.order') }}"><i
                                        class="ph-shopping-bag"></i><span>Delivered Order</span> </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('role-permission-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="ph-lock-key"></i>
                            <span>Role & Permission</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item"> <a class="nav-link" href="{{ route('all.permission') }}">
                                    <i class="ph-key"></i>
                                    <span>All Permission</span></a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('all.roles') }}">
                                    <i class="ph-lock-key-open"></i>
                                    <span>All Roles</span> </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('add.roles.permission') }}">
                                    <i class="ph-lock"></i>
                                    <span> Roles in Permission</span></a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('all.roles.permission') }}">
                                    <i class="ph-lock-key"></i>
                                    <span> All Roles in Permission</span></a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('job-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="icon-envelop4"></i>
                            <span>Job</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item"><a href="{{ route('admin.job-post.index') }}" class="nav-link"><i
                                        class="ph-headset"></i>
                                    <span>Job Posting</span></a></li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->can('terms-policy-management.menu'))
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">
                            <i class="ph-layout"></i>
                            <span>Terms & Policy</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item"><a href="{{ route('policy.index') }}" class="nav-link"><i
                                        class="ph-layout"></i>
                                    <span>Policy</span></a></li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
        <!-- /main navigation -->
    </div>
    <!-- /sidebar content -->
</div>
