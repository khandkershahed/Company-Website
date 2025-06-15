@php
    //$menus = App\Models\Admin\AdminMenuBuilder::all();
    $setting = App\Models\Site::first();
@endphp


<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg sidebar-main-resized"
    style="background: url({{ asset('images/mandala-bg.jpg') }}) no-repeat center center; background-size: cover;">
    <!-- Sidebar content -->
    <div class="sidebar-content">
        <!-- Sidebar header -->
        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">{{ Auth::user()->name }}</h5>

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
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::current()->getName() == 'admin.dashboard' ? 'active' : '' }}">
                        <i class="fa-regular fa-house-day side_baricon"></i>
                        <span class="text-start">Dashboard</span>
                    </a>
                </li>
                @if (auth()->check() && in_array('logistics', json_decode(auth()->user()->department, true)))
                    <li
                        class="nav-item nav-item-submenu {{ in_array(Route::current()->getName(), ['supplychain', 'product-sourcing.index', 'sas.index', 'purchase.index', 'delivery.index', 'product.saved', 'product.sourced', 'product.approved']) ? ' nav-item-open' : '' }}">
                        <a href="" class="nav-link">
                            <i class="fa-light fa-truck-field side_baricon"></i>
                            <span class="text-start">Supply Chain</span>
                        </a>
                        <ul
                            class="nav-group-sub collapse ms-4 {{ in_array(Route::current()->getName(), ['supplychain', 'product-sourcing.index', 'sas.index', 'purchase.index', 'delivery.index', 'product.saved', 'product.sourced', 'product.approved']) ? 'show' : '' }}">
                            <li class="nav-item {{ Route::current()->getName() == 'supplychain' ? 'active' : '' }}"><a
                                    href="{{ route('supplychain') }}" class="nav-link">Dashboard</a>
                            </li>
                            <li
                                class="nav-item {{ in_array(Route::current()->getName(), ['product-sourcing.index', 'product.saved', 'product.sourced', 'product.approved']) ? 'active' : '' }}">
                                <a href="{{ route('product-sourcing.index') }}" class="nav-link">Sourcing</a>
                            </li>
                            <li class="nav-item {{ Route::current()->getName() == 'sas.index' ? 'active' : '' }}"><a
                                    href="{{ route('sas.index') }}" class="nav-link">SAS</a></li>
                            <li class="nav-item {{ Route::current()->getName() == 'purchase.index' ? 'active' : '' }}">
                                <a href="{{ route('purchase.index') }}" class="nav-link">Purchase</a>
                            </li>
                            <li class="nav-item {{ Route::current()->getName() == 'delivery.index' ? 'active' : '' }}">
                                <a href="{{ route('delivery.index') }}" class="nav-link">Delivery</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (auth()->check() && in_array('business', json_decode(auth()->user()->department, true)))
                    <li class="nav-item nav-item-submenu {{ Route::current()->getName() == '' ? 'active' : '' }}">
                        <a href="" class="nav-link">
                            <i class="fa-light fa-business-time side_baricon"></i>
                            <span class="text-start">Business</span></a>
                        <ul class="nav-group-sub collapse ms-4" style="">
                            <li class="nav-item"><a href="{{ route('business.index') }}" class="nav-link">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.rfq.index') }}" class="nav-link">RFQ
                                    Management</a>
                                </li>
                            <li class="nav-item"><a href="{{ route('sales-dashboard.index') }}" class="nav-link">
                                    Sales</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('marketing-dashboard.index') }}"
                                    class="nav-link">Marketing</a></li>
                            <li class="nav-item"><a href="{{ route('project.dashboard') }}"
                                    class="nav-link">Projects</a></li>
                        </ul>


                    </li>
                @endif

                @if (auth()->check() && in_array('site', json_decode(auth()->user()->department, true)))
                    <li class="nav-item nav-item-submenu {{ in_array(Route::current()->getName(), ['admin.solution-cms.index','solution.create']) ? ' nav-item-open' : '' }}">
                        <a href="" class="nav-link {{ in_array(Route::current()->getName(), ['admin.solution-cms.index','solution.create']) ? ' active' : '' }}">
                            <i class="fa-duotone fa-sidebar-flip side_baricon"></i>
                            <span class="text-start ps-1">Site Contents</span></a>
                        <ul class="nav-group-sub collapse ms-4 {{ in_array(Route::current()->getName(), ['admin.solution-cms.index','solution.create']) ? 'show' : '' }}">
                            <li class="nav-item"><a href="{{ route('site-content.index') }}"
                                    class="nav-link">Dashboard</a></li>
                            <li class="nav-item">
                                <a href="{{ route('admin.solution-cms.index') }}"
                                    class="nav-link{{ in_array(Route::current()->getName(), ['admin.solution-cms.index','admin.solution-cms.create']) ? ' active' : '' }}">
                                    All Solutions
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('site-content.index') }}" class="nav-link">Blog</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('site-content.index') }}"
                                    class="nav-link">Techglossy</a></li>
                            <li class="nav-item"><a href="{{ route('site-content.index') }}"
                                    class="nav-link">Feature</a></li>
                            <li class="nav-item"><a href="{{ route('site-content.index') }}" class="nav-link">Client
                                    Story</a></li>
                            <li class="nav-item"><a href="{{ route('site-content.index') }}"
                                    class="nav-link">Showcase</a></li>
                            <li class="nav-item"><a href="{{ route('policy.index') }}" class="nav-link">Terms and
                                    Policy</a></li>
                        </ul>


                    </li>
                @endif
                {{-- @if (auth()->check() && in_array('site', json_decode(auth()->user()->department, true)))
                    <li class="nav-item nav-item-submenu {{ Route::current()->getName() == '' ? 'active' : '' }}">
                        <a href="{{ route('crm.index') }}" class="nav-link">
                            <i class="fa-light fa-people-roof side_baricon"></i>
                            <span class="text-start ">CRM</span></a>
                        <ul class="nav-group-sub collapse ms-4" style="">

                            <li class="nav-item"><a href="{{ route('contact.index') }}" class="nav-link">Contact</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('client-support.index') }}"
                                    class="nav-link">Client Support</a></li>

                            <li class="nav-item"><a href="{{ route('client-database.index') }}"
                                    class="nav-link">Client Database</a></li>
                            <li class="nav-item"><a href="" class="nav-link">Live Chat</a></li>
                        </ul>


                    </li>
                @endif --}}
                @if (auth()->check() && in_array('admin', json_decode(auth()->user()->department, true)))
                    <li class="nav-item nav-item-submenu {{ Route::current()->getName() == '' ? 'active' : '' }}">
                        <a href="" class="nav-link">
                            <i class="fa-light fa-user-tie side_baricon"></i>
                            <span class="text-start ps-1">HR & Admin</span></a>
                        <ul class="nav-group-sub collapse ms-4" style="">
                            <li class="nav-item"><a href="{{ route('hr-and-admin.index') }}"
                                    class="nav-link">Dashboard</a></li>
                            <li class="nav-item"><a href="{{ route('leaveApplications') }}"
                                    class="nav-link">Leave</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('attendance.dashboard') }}"
                                    class="nav-link">Attendance</a></li>
                            <li class="nav-item"><a href="{{ route('employee.index') }}"
                                    class="nav-link">Employees</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('admin.job-post.index') }}" class="nav-link">Job Post</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('job.regiserUser') }}" class="nav-link">Job
                                    Applier's List</a></li>
                        </ul>


                    </li>
                @endif
                @if (auth()->check() && in_array('site', json_decode(auth()->user()->department, true)))
                    <li class="nav-item nav-item-submenu {{ Route::current()->getName() == '' ? 'active' : '' }}">
                        <a href="" class="nav-link">
                            <i class="fa-light fa-screwdriver-wrench side_baricon"></i>
                            <span class="text-start ps-1">Site Setting</span></a>
                        <ul class="nav-group-sub collapse ms-4" style="">
                            <li class="nav-item"><a href="{{ route('site-setting.index') }}"
                                    class="nav-link">Dashboard</a></li>
                            <li class="nav-item"><a href="{{ route('supplychain') }}" class="nav-link">Supply
                                    Chain</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('marketing-dashboard.index') }}"
                                    class="nav-link">
                                    Business</a></li>
                            <li class="nav-item"><a href="{{ route('site-content.index') }}"
                                    class="nav-link">Accounts</a></li>
                            <li class="nav-item"><a href="{{ route('hr-and-admin.index') }}" class="nav-link">HR
                                    Admin</a></li>
                            <li class="nav-item"><a href="{{ route('site-content.index') }}"
                                    class="nav-link">Website
                                    Settings</a></li>
                            <li class="nav-item"><a href="{{ route('site-content.index') }}" class="nav-link">Role
                                    Settings</a></li>
                        </ul>


                    </li>
                @endif
                @if (auth()->check() && in_array('support', json_decode(auth()->user()->department, true)))
                    <li
                        class="nav-item nav-item-submenu {{ in_array(Route::current()->getName(), ['project.dashboard', 'project.index', 'client-support.index', 'support-case.index']) ? ' nav-item-open' : '' }}">
                        <a href="" class="nav-link">
                            <i class="fa-solid fa-diagram-project"></i>
                            <span class="text-start">Project & Support</span>
                        </a>
                        <ul
                            class="nav-group-sub collapse ms-4 {{ in_array(Route::current()->getName(), ['project.dashboard', 'project.index', 'client-support.index', 'support-case.index']) ? 'show' : '' }}">
                            <li
                                class="nav-item {{ Route::current()->getName() == 'project.dashboard' ? 'active' : '' }}">
                                <a href="{{ route('project.dashboard') }}" class="nav-link">Dashboard</a>
                            </li>
                            <li
                                class="nav-item {{ in_array(Route::current()->getName(), ['project.index']) ? 'active' : '' }}">
                                <a href="{{ route('project.index') }}" class="nav-link">Projects</a>
                            </li>
                            <li
                                class="nav-item {{ Route::current()->getName() == 'client-support.index' ? 'active' : '' }}">
                                <a href="{{ route('client-support.index') }}" class="nav-link">Supports</a>
                            </li>
                            <li
                                class="nav-item {{ Route::current()->getName() == 'support-case.index' ? 'active' : '' }}">
                                <a href="{{ route('support-case.index') }}" class="nav-link">Support Cases</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>








        <!-- Main navigation -->


        <!-- /main navigation -->
    </div>
    <!-- /sidebar content -->
</div>
