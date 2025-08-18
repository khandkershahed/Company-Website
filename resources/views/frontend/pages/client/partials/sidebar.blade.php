<style>
    /* NAVBAR */
    .navbar {
        padding: 15px 10px;
        background: #fff;
        border: none;
        border-radius: 0;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .navbar-btn {
        box-shadow: none;
        outline: none !important;
        border: none;
    }

    /* LINE */
    .line {
        width: 100%;
        height: 1px;
        border-bottom: 1px dashed #ddd;
        margin: 40px 0;
    }

    /* WRAPPER */
    .wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
        perspective: 1500px;
    }

    /* SIDEBAR */
    #sidebar {
        min-width: 250px;
        max-width: 250px;
        background: #f8f9fb;
        color: #000;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* Changed from 100vh */
        transition: all 0.6s cubic-bezier(0.945, 0.02, 0.27, 0.665);
    }

    #sidebar .sidebar-header {
        padding: 20px !important;
    }

    #sidebar ul.components {
        /* padding: 20px 20px 0 20px; */
        margin: 0;
    }

    #sidebar ul li a {
        display: flex;
        font-size: 1rem;
        line-height: 1.5rem;
        padding: 10px 30px;
        margin-bottom: 0.3125rem;
        position: relative;
    }

    #sidebar ul li a:hover {
        background: #fff;
    }

    #sidebar ul li.active>a {
        background: #ae0a46;
        color: #fff;
    }

    /* SIDEBAR TOGGLE */
    #sidebar.active {
        margin-left: -250px;
        transform: rotateY(100deg);
    }

    /* DROPDOWN */
    .dropdown-toggle {
        padding-right: 15px;
    }

    a[aria-expanded="true"] {
        background: #fff;
    }

    a[aria-expanded="true"]::after {
        transform: translateY(-50%) rotate(0deg) !important;
    }

    a[data-toggle="collapse"] {
        position: relative;
    }

    .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 5px;
        transform: translateY(-50%);
    }

    /* CTAs */
    ul.CTAs {
        padding: 20px;
    }

    ul.CTAs a {
        text-align: center;
        font-size: 0.9em !important;
        display: block;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    a.download {
        background: #fff;
        color: #7386d5;
    }

    a.article {
        background: #6d7fcc !important;
        color: #fff !important;
    }

    a.article:hover {
        background: #6d7fcc !important;
        color: #fff !important;
    }

    .list_dashboard {
        margin-bottom: 8px;
    }

    /* CONTENT */
    #content {
        width: 100%;
        min-height: 100vh;
        transition: all 0.3s;
    }

    /* SIDEBAR COLLAPSE BUTTON */
    #sidebarCollapse {
        width: 40px;
        height: 40px;
        background: #f5f5f5;
        cursor: pointer;
    }

    #sidebarCollapse span {
        width: 80%;
        height: 2px;
        margin: 0 auto;
        display: block;
        background: #ae0a46;
        transition: all 0.8s cubic-bezier(0.81, -0.33, 0.345, 1.375);
        transition-delay: 0.2s;
    }

    /* Remove default Bootstrap arrow */
    .dropdown-toggle::after {
        display: none !important;
    }

    /* Style the custom icon */
    .dropdown-toggle i {
        float: right;
        /* place icon on the right */
        transition: transform 0.3s;
    }

    /* Rotate icon when expanded */
    .dropdown-toggle[aria-expanded="false"] i {
        transform: rotate(-90deg);
        /* right → down */
    }

    .dropdown-toggle[aria-expanded="true"] i {
        transform: rotate(0deg);
        /* right → down */
    }

    #sidebarCollapse span:first-of-type {
        transform: rotate(45deg) translate(2px, 2px);
    }

    #sidebarCollapse span:nth-of-type(2) {
        opacity: 0;
    }

    #sidebarCollapse span:last-of-type {
        transform: rotate(-45deg) translate(1px, -1px);
    }

    #sidebarCollapse.active span {
        transform: none;
        opacity: 1;
        margin: 5px auto;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        #sidebar {
            margin-left: -250px;
            transform: rotateY(90deg);
        }

        #sidebar.active {
            margin-left: 0;
            transform: none;
        }

        #sidebarCollapse span {
            transform: none;
            opacity: 1;
            margin: 5px auto;
        }

        #sidebarCollapse.active span:first-of-type {
            transform: rotate(45deg) translate(2px, 2px);
        }

        #sidebarCollapse.active span:nth-of-type(2) {
            opacity: 0;
        }

        #sidebarCollapse.active span:last-of-type {
            transform: rotate(-45deg) translate(1px, -1px);
        }
    }

    .nav-tabs .nav-item .user-tab {
        border: 0 !important;
    }
</style>
<nav id="sidebar" class="d-flex flex-column">
    <div>
        <!-- Sidebar Header / User Info -->
        <div class="sidebar-header text-center p-3">
            @php
            $userPhoto = Auth::guard('client')->user()->photo;
            $photoUrl = $userPhoto
            ? asset('upload/Profile/user/' . $userPhoto)
            : 'https://i.pravatar.cc/150?img=' . rand(1, 70);
            @endphp

            <img src="{{ $photoUrl }}"
                alt="User Profile"
                class="rounded-circle"
                width="150"
                height="150"
                style="object-fit: cover; border: 2px solid #fff;">

            <div class="mt-2">
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <span class="main_color">
                        <i class="fa fa-circle me-1 fa-beat"></i> Online
                    </span>
                    <span class="ms-2">{{ ucfirst(Auth::guard('client')->user()->user_type) }}</span>
                </div>
                <p class="user-name fw-bold mb-1">{{ Auth::guard('client')->user()->name ?? 'No Name' }}</p>
                <p class="user-company mb-1 text-muted">{{ Auth::guard('client')->user()->company_name }}</p>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <ul class="list-unstyled components">
            <li class="active">
                <a href="{{ route('client.dashboard') }}">Dashboard</a>
            </li>
            <li><a href="{{ route('client.profile') }}">My Profile</a></li>
            <li><a href="{{route('client.rfq')}}">My RFQs</a></li>
            <li><a href="javascript:void(0);">My Assets</a></li>
            <li>
                <a href="#contentSubmenu"
                    data-bs-toggle="collapse"
                    aria-expanded="false"
                    class="dropdown-toggle d-flex justify-content-between align-items-center">
                    Project & Support
                    <i class="fas fa-chevron-down ms-2"></i> <!-- Manually added toggle icon -->
                </a>
                <ul class="collapse list-unstyled" id="contentSubmenu">
                    <li><a href="{{ route('client.project') }}">My Projects</a></li>
                    <li><a href="{{ route('client.support') }}">Supports</a></li>
                    <li><a href="{{ route('client.case') }}">Support Cases</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- Logout Button at the bottom -->
    <div class="mt-auto p-3 w-100">
        <a href="{{ route('client.logout') }}" class="btn-color w-100">Logout</a>
    </div>
</nav>