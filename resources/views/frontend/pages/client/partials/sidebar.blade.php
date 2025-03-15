<style>
    .page-content {
        height: auto;
        z-index: 0;
    }

    .chiller-theme .sidebar-wrapper .sidebar-menu ul li a i,
    .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown div,
    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
    .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
        background: none;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown>a:after {
    top: 2px !important;
    position: relative;
    left: 4px;
}
    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li {
        padding-left: 2.4rem;
        font-size: 15px;
    }

</style>

<a id="show-sidebar" class="bg-site" href="#">
    <i class="fa-solid fa-chevron-right"></i>
</a>
<!-- Button  -->

<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand d-flex justify-content-end">
            <div id="close-sidebar">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
        </div>
        <!-- sidebar-brand -->
        <div class="sidebar-header d-lg-flex flex-column align-items-center pb-5" style="border-bottom: 1px solid #eee;">
            <div class="user-pic" style="color:#fff;">
                {{-- <img width="70px" height="70px" class="rounded-circle"
                    src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?cs=srgb&dl=pexels-pixabay-220453.jpg&fm=jpg"
                    alt=""> --}}
                @if (!empty(Auth::guard('client')->user()->photo))
                    <img width="70px" height="70px" class="rounded-circle"
                        src="{{ asset('upload/Profile/user/' . Auth::guard('client')->user()->photo) }}" alt="">
                @else
                    <i class="fa fa-user-circle fa-4x" aria-hidden="true"></i>
                @endif
            </div>
            <div class="user-info text-center">
                <p class="user-name main_color mb-0"> <strong>{{ Auth::guard('client')->user()->name }}</strong></span>
                <div class="d-flex align-items-center justify-content-center text-center">
                    <p class="user-role mb-0 pt-1 text-black fw-bold">{{ ucfirst(Auth::guard('client')->user()->user_type) }}</span>
                    <p class="user-role mb-0 pt-1 text-black">{{ Auth::guard('client')->user()->company_name }}</span>
                    <p class="user-status mb-0 ms-2 text-black"><i class="fa fa-circle"></i> <span>Online</span></span>
                    <p class="user-status mb-0 ms-2 text-black">
                        <a href="{{ route('client.logout') }}" class="main_color">
                            <i class="fa-solid fa-right-from-bracket main_color" style="font-size: 13px;"></i>
                            Log Out
                        </a>
                        </span>
                </div>
            </div>
        </div>
        <div class="sidebar-menu mt-4 pt-1">
            <ul>

                <li><a href="{{ route('client.dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                </li>
                <li><a href="{{ route('client.profile') }}"><i class="fa fa-user"></i><span>My Profile</span></a></li>
                <li><a href="{{route('client.rfq')}}"><i class="fa fa-calendar"></i><span>My RFQs</span></a></li>
                {{-- <li><a href="{{route('client.orders')}}"><i class="fa fa-shopping-cart"></i><span>My Orders</span></a></li> --}}
                <li><a href="javascript:void(0);"><i class="fa-solid fa-wallet"></i><span>My Assets</span></a></li>
                <li class="sidebar-dropdown">
                    <a href="javascript:void(0);"><i class="fa-solid fa-diagram-project"></i><span>Project &
                            Support</span></a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('client.project') }}">My Projects</a></li>
                            <li><a href="{{ route('client.support') }}">Supports</a></li>
                            <li><a href="{{ route('client.case') }}">Support Cases</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer sticky-bottoms-client">
        <a href="{{ route('client.profile') }}">
            <i class="fa fa-cog"></i>
            <span class="badge-sonar"></span>
        </a>
        <a href="{{ route('client.logout') }}">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
    </div>
    <!-- sidebar-footer  -->
</nav>
<!-- sidebar-wrapper  -->
