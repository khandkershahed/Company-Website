@extends('frontend.master')
@section('content')
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
</style>

<div class="container-fliud">
    <div class="wrapper">
        <!-- Sidebar Holder -->
        @include('frontend.pages.client.partials.sidebar')

        <!-- Page Content Holder -->
        <div id="content">
            <header class="mb-3">
                <div class="container-fluid ps-0">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </header>
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <div>
                            <h2>Welcome to NGen IT</h2>
                            <p class="w-75">
                                My NGEN is a platform designed to optimize your technology projects, support, and product supply chain. Here, you can discover, purchase, and manage hardware, software, digital, and cloud solutions. Additionally, you can handle your project and support management efficiently. Soon, we will introduce tools for Asset & Logistics Management, allowing you to track software licenses, hardware warranties, and calculate shipping and freight costs. Our dedicated account management team is also available to provide the highest level of personalized service and customer satisfaction.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-5">
                        <h2>Order Management</h2>
                        <p class="w-75">Manage and track all your orders efficiently, view details, and monitor their current status in one place.</p>
                        <ul>
                            <li class="list_dashboard">
                                <a href="{{ route('mycart') }}" class="main_color">See/Create Work Orders and RFQs</a>
                            </li>
                            <li class="list_dashboard">
                                <a href="{{ route('mycart') }}" class="main_color">Issue Work Orders</a>
                            </li>
                            <li class="list_dashboard">
                                <a href="{{ route('client.orders') }}" class="main_color">See Order Status</a>
                            </li>
                            <li class="list_dashboard">
                                <a href="{{ route('client.orders') }}" class="main_color">Payment & Invoices</a>
                            </li>
                        </ul>
                        <div>
                            <a href="{{ route('client.orders') }}" class="pt-3 business_item_button justify-content-start">
                                <span>Learn More</span>
                                <span class="business_item_button_icon">
                                    <i class="fa-solid fa-arrow-right-long" aria-hidden="true"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-5">
                        <h2>Product & Solution</h2>
                        <p class="w-75">Explore our range of products and solutions designed to meet your business needs and drive success.</p>

                        <ul>
                            <li class="list_dashboard">
                                <a href="{{ route('mycart') }}" class="main_color">Brand & Category</a>
                            </li>
                            <li class="list_dashboard">
                                <a href="{{ route('mycart') }}" class="main_color">Product Knowledge</a>
                            </li>
                            <li class="list_dashboard">
                                <a href="{{ route('client.orders') }}" class="main_color">Product info & Solutions</a>
                            </li>
                            <li class="list_dashboard">
                                <a href="{{ route('client.orders') }}" class="main_color">Track Contracts</a>
                            </li>
                        </ul>
                        <div>
                            <a href="{{ route('client.orders') }}" class="pt-3 business_item_button justify-content-start">
                                <span>Learn More</span>
                                <span class="business_item_button_icon">
                                    <i class="fa-solid fa-arrow-right-long" aria-hidden="true"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-5">
                        <h2>Asset Management. <br> (upcoming)</h2>
                        <p class="w-75">Stay tuned for our upcoming asset management features to help you track, organize, and optimize your resources effectively.</p>

                        <ul>
                            <li class="list_dashboard">
                                <a href="{{ route('mycart') }}" class="main_color">Upcoming</a>
                            </li>
                            <li class="list_dashboard">
                                <a href="{{ route('mycart') }}" class="main_color">Renewals.</a>
                            </li>
                            <li class="list_dashboard">
                                <a href="{{ route('client.orders') }}" class="main_color">Review & Manage Software License Agreements</a>
                            </li>
                            <li class="list_dashboard">
                                <a href="{{ route('client.orders') }}" class="main_color">Warranty & Purchased Items.</a>
                            </li>
                        </ul>
                        <div>
                            <a href="{{ route('client.orders') }}" class="pt-3 business_item_button justify-content-start">
                                <span>Learn More</span>
                                <span class="business_item_button_icon">
                                    <i class="fa-solid fa-arrow-right-long" aria-hidden="true"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-5">
                        <h2>Account Management</h2>
                        <p class="w-75">Manage your account settings, update personal information, and control access all in one place.</p>
                        <ul>
                            <li class="list_dashboard">
                                <a href="{{ route('mycart') }}" class="main_color">My Profile & Security</a>
                            </li>
                            <li class="list_dashboard">
                                <a href="{{ route('mycart') }}" class="main_color">User & Role Management</a>
                            </li>
                        </ul>
                        <div>
                            <a href="{{ route('client.orders') }}" class="pt-3 business_item_button justify-content-start">
                                <span>Learn More</span>
                                <span class="business_item_button_icon">
                                    <i class="fa-solid fa-arrow-right-long" aria-hidden="true"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection