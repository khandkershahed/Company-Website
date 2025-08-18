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

    .nav-tabs .nav-item .user-tab {
        border: 0 !important;
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
            <div class="container px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="card shadow-sm border-0 rounded-1">
                            <div class="card-body p-4">
                                <div class="row align-items-center g-4">
                                    <!-- Profile Image -->
                                    <div class="col-auto">
                                        <img src="{{ !empty($data->photo) ? url('upload/Profile/user/' . $data->photo) : url('upload/no_image.jpg') }}"
                                            class="rounded-1 border shadow-sm"
                                            style="width: 150px; height: 150px; object-fit: cover;"
                                            alt="{{ $data->name }}">
                                    </div>
                                    <!-- Profile Info -->
                                    <div class="col">
                                        <h3 class="fw-bold mb-3 main_color">{{ ucfirst($data->name) }}</h3>

                                        <!-- Badges -->
                                        <div class="d-flex flex-wrap gap-2 mb-3">
                                            @if (!empty($data->user_type))
                                            <span class="badge bg-light text-dark d-flex align-items-center">
                                                <i class="fa-solid fa-user-check me-1"></i> {{ $data->user_type }}
                                            </span>
                                            @endif
                                            @if (!empty($data->company_name))
                                            <span class="badge bg-light text-dark d-flex align-items-center">
                                                <i class="fa fa-building me-1"></i> {{ $data->company_name }}
                                            </span>
                                            @endif
                                            @if (!empty($data->city))
                                            <span class="badge bg-light text-dark d-flex align-items-center">
                                                <i class="fa fa-map-marker-alt me-1"></i> {{ $data->city }}
                                            </span>
                                            @endif
                                            @if (!empty($data->email))
                                            <span class="badge bg-light text-dark d-flex align-items-center">
                                                <i class="fa fa-envelope me-1"></i> {{ $data->email }}
                                            </span>
                                            @endif
                                        </div>

                                        <!-- Profile Completion -->
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <span class="text-muted">Profile Completion</span>
                                                <span class="fw-bold">{{ $completionPercentage }}%</span>
                                            </div>
                                            <div class="progress rounded-pill" style="height: 10px;">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: {{ $completionPercentage }}%;"
                                                    aria-valuenow="{{ $completionPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                        <!-- About -->
                                        @if (!empty($data->about))
                                        <p class="text-muted mb-0">{{ $data->about }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3">
                                <ul class="nav nav-tabs flex-column px-0 border" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-start m-0 fs-6 py-3 w-100 border-0 rounded-0 active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profileInfo" type="button" role="tab" aria-controls="profileInfo" aria-selected="true">Profile Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-start m-0 fs-6 py-3 w-100 border-0 rounded-0" id="password-tab" data-bs-toggle="tab" data-bs-target="#passwordSecu" type="button" role="tab" aria-controls="passwordSecu" aria-selected="false">Password & Security</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-start m-0 fs-6 py-3 w-100 border-0 rounded-0" id="team-tab" data-bs-toggle="tab" data-bs-target="#TeamMember" type="button" role="tab" aria-controls="TeamMember" aria-selected="false">Team Members</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-start m-0 fs-6 py-3 w-100 border-0 rounded-0" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false">Additional Details</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-9">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="profileInfo" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="card shadow-sm border-0 rounded-0">
                                            <div class="card-header py-3 bg-light d-flex justify-content-between align-items-center px-4">
                                                <h5 class="mb-0">Profile Information</h5>
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#profileModal" class="home-btn p-2 py-1 rounded-full">
                                                    <i class="fa fa-pencil-alt text-black"></i>
                                                </a>
                                            </div>
                                            <div class="card-body px-4 py-3">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <h6 class="text-muted mb-1">Name</h6>
                                                        <p class="fw-semibold mb-0 text-capitalize">{{ $data->name }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 class="text-muted mb-1">Email</h6>
                                                        <p class="fw-semibold mb-0">{{ $data->email }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 class="text-muted mb-1">Phone</h6>
                                                        <p class="fw-semibold mb-0">{{ $data->phone }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 class="text-muted mb-1">Company Name</h6>
                                                        <p class="fw-semibold mb-0">{{ $data->company_name }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Password & Security Tab -->
                                    <div class="tab-pane fade" id="passwordSecu" role="tabpanel" aria-labelledby="password-tab">
                                        <div class="card shadow-sm border-0 rounded-0">
                                            <div class="card-header bg-light py-3 px-4">
                                                <h5 class="mb-0">Password & Security</h5>
                                            </div>
                                            <div class="card-body px-4 py-3">
                                                <form method="post" action="{{ route('client.update.password') }}">
                                                    @csrf
                                                    @if (session('status'))
                                                    <div class="alert alert-success">{{ session('status') }}</div>
                                                    @elseif(session('error'))
                                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                                    @endif
                                                    <div class="row g-3">
                                                        <div class="col-md-4">
                                                            <label class="form-label">Old Password</label>
                                                            <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Old Password">
                                                            @error('old_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">New Password</label>
                                                            <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="New Password">
                                                            @error('new_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Confirm New Password</label>
                                                            <input type="password" name="new_password_confirmation" class="form-control" placeholder="Confirm New Password">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end mt-4">
                                                        <button type="submit" class="btn-color">Submit <i class="ph-paper-plane-tilt ms-2"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Team Members Tab -->
                                    <div class="tab-pane fade" id="TeamMember" role="tabpanel" aria-labelledby="team-tab">
                                        <div class="card shadow-sm border-0 rounded-0">
                                            <div class="card-header bg-light d-flex justify-content-between align-items-center py-3 px-4">
                                                <h5 class="mb-0">Your Team Members</h5>
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#teamAddModal" class="home-btn p-2 py-1 rounded-full">
                                                    <i class="fa fa-plus-square text-black"></i>
                                                </a>
                                            </div>
                                            <div class="card-body px-3 py-2">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover text-center align-middle mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Company</th>
                                                                <th>Designation</th>
                                                                <th>Email</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($teams as $team)
                                                            <tr>
                                                                <td class="fw-semibold">{{ $team->name }}</td>
                                                                <td>{{ $team->company_name }}</td>
                                                                <td>{{ $team->designation }}</td>
                                                                <td>{{ $team->email }}</td>
                                                                <td>
                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#teamEditModal{{ $team->id }}" class="text-primary fs-5">
                                                                        <i class="fa fa-pen-square"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @if ($teams->isEmpty())
                                                            <tr>
                                                                <td colspan="5" class="text-muted">No team members added yet.</td>
                                                            </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Additional Details Tab -->
                                    <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                        <div class="card shadow-sm border-0 rounded-0">
                                            <div class="card-header bg-light main_color text-white py-3 px-4">
                                                <h5 class="mb-0">Additional Details</h5>
                                            </div>
                                            <div class="card-body px-4 py-3">
                                                <div class="row g-3">
                                                    @if (!empty($data->user_type) && $data->user_type === 'partner')
                                                    <div class="col-12">
                                                        <h6 class="text-muted mb-1">TIN Number</h6>
                                                        <p class="fw-semibold mb-0">{{ $data->tin_number }}</p>
                                                    </div>
                                                    @endif
                                                    <div class="col-12">
                                                        <h6 class="text-muted mb-1">Address</h6>
                                                        <p class="fw-semibold mb-0">{{ $data->address }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="text-muted mb-1">City</h6>
                                                        <p class="fw-semibold mb-0">{{ $data->city }}</p>
                                                    </div>
                                                    @if (!empty($data->user_type) && $data->user_type === 'client')
                                                    <div class="col-12">
                                                        <h6 class="text-muted mb-1">Country</h6>
                                                        <p class="fw-semibold mb-0">{{ $data->country }}</p>
                                                    </div>
                                                    @endif
                                                    <div class="col-12">
                                                        <h6 class="text-muted mb-1">Account Status <span class="badge bg-success py-1">{{ ucfirst($data->status) }}</span></h6>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="profileModal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow">
            <form method="post" action="{{ route('client.profile.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Modal Header -->
                <div class="modal-header main_bg text-white py-2 px-4 rounded-top-4">
                    <h5 class="modal-title mb-0">Edit Profile</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row g-3">

                        <!-- Full Name -->
                        <div class="col-lg-4">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control form-control-sm" value="{{ $data->name }}">
                        </div>

                        <!-- Username -->
                        <div class="col-lg-4">
                            <label class="form-label">User Name</label>
                            <input type="text" name="username" class="form-control form-control-sm" value="{{ $data->name }}">
                        </div>

                        <!-- Phone -->
                        <div class="col-lg-4">
                            <label class="form-label">Phone</label>
                            <input type="tel" name="phone" class="form-control form-control-sm"
                                placeholder="Eg: (+880)1754348949"
                                value="{{ $data->phone }}"
                                pattern="^\(\+\d{1,3}\)\d{1,}$"
                                title="Please enter a valid phone number in the format: (+XXX)XXXXXXXXX">
                        </div>

                        <!-- Email -->
                        <div class="col-lg-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control form-control-sm" value="{{ $data->email }}" placeholder="Eg: john@gmail.com">
                        </div>

                        <!-- Company Name -->
                        <div class="col-lg-3">
                            <label class="form-label">Company Name</label>
                            <input type="text" name="company_name" class="form-control form-control-sm" value="{{ $data->company_name }}" placeholder="Eg: NGen IT">
                        </div>

                        <!-- Country -->
                        <div class="col-lg-3">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" class="form-control form-control-sm" value="{{ $data->country }}" placeholder="Eg: Bangladesh">
                        </div>

                        <!-- City -->
                        <div class="col-lg-3">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control form-control-sm" value="{{ $data->city }}" placeholder="Eg: Dhaka">
                        </div>

                        <!-- Postal Code -->
                        <div class="col-lg-3">
                            <label class="form-label">Postal</label>
                            <input type="text" name="postal" class="form-control form-control-sm" value="{{ $data->postal }}" placeholder="Eg: 1215">
                        </div>

                        <!-- Profile Picture -->
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="flex-grow-1">
                                <label class="form-label">Profile Picture</label>
                                <input type="file" name="photo" class="form-control form-control-sm">
                            </div>
                            <div class="ms-3">
                                <img id="showImage" class="border rounded-circle" src="{{ !empty($data->photo) ? url('upload/Profile/user/' . $data->photo) : url('upload/no_image.jpg') }}" alt="Profile" width="60" height="60">
                            </div>
                        </div>

                        <!-- About Me -->
                        <div class="col-lg-6">
                            <label class="form-label">About Me</label>
                            <textarea name="about" class="form-control form-control-sm" rows="2" placeholder="About Yourself">{{ $data->about }}</textarea>
                        </div>

                        <!-- Address -->
                        <div class="col-lg-6">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control form-control-sm" rows="2" placeholder="Eg: Dhaka, Bangladesh">{{ $data->address }}</textarea>
                        </div>

                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer border-0 px-4 py-3">
                    <button type="submit" class="btn-color">Save Changes</button>
                </div>

            </form>
        </div>
    </div>
</div>


<div id="teamAddModal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow">
            <form method="post" action="{{ route('client-team.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Modal Header -->
                <div class="modal-header main_bg text-white py-2 px-4 rounded-top-4">
                    <h5 class="modal-title mb-0">Add Team Member</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row g-3">
                        <input type="hidden" name="client_id" value="{{ Auth::guard('client')->user()->id }}" />

                        <!-- Name -->
                        <div class="col-lg-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control form-control-sm" name="name" placeholder="Enter full name">
                        </div>

                        <!-- Email -->
                        <div class="col-lg-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control form-control-sm" name="email" placeholder="Enter email address">
                        </div>

                        <!-- Designation -->
                        <div class="col-lg-6">
                            <label class="form-label">Designation</label>
                            <input type="text" class="form-control form-control-sm" name="designation" placeholder="Enter designation">
                        </div>

                        <!-- Company Name -->
                        <div class="col-lg-6">
                            <label class="form-label">Company Name</label>
                            <input type="text" class="form-control form-control-sm" name="company_name" placeholder="Enter company name">
                        </div>

                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer border-0 px-4 py-3">
                    <button type="submit" class="btn-color">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- Edit Modal --}}
@foreach ($teams as $team)
<div id="teamEditModal{{ $team->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content rounded-0">
            <form id="myform" method="post"
                action="{{ route('client-team.update', $team->id) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-header p-2 pt-0 border-bottom shadow-sm px-3">
                    <h5 class="modal-title text-center">Add Team</h5>
                    <button type="button" class="close"
                        data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control form-control-sm"
                            name="client_id"
                            value="{{ Auth::guard('client')->user()->id }}" />
                        <div class="col-lg-6">
                            <div class="mb-1 text-start">
                                <label class="form-label fw-bold" style="font-size: 14px"
                                    for="basicpill-firstname-input">Name</label>
                                <input type="text" class="form-control form-control-sm"
                                    id="basicpill-firstname-input" name="name"
                                    value="{{ $team->name }}" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-1 text-start">
                                <label class="form-label fw-bold" style="font-size: 14px"
                                    for="basicpill-email-input">Email</label>
                                <input type="email" class="form-control form-control-sm"
                                    id="basicpill-email-input" name="email"
                                    value="{{ $team->email }}" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-1 text-start">
                                <label class="form-label fw-bold" style="font-size: 14px"
                                    for="basicpill-phoneno-input">Designation</label>
                                <input type="text" class="form-control form-control-sm"
                                    id="basicpill-phoneno-input" name="designation"
                                    value="{{ $team->designation }}" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-1 text-start">
                                <label class="form-label fw-bold" style="font-size: 14px"
                                    for="basicpill-email-input">Company Name</label>
                                <input type="text" class="form-control form-control-sm"
                                    id="basicpill-email-input" name="company_name"
                                    value="{{ $team->company_name }}" />
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer border-0 p-1">
                    <button type="submit" class="btn-color">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endforeach

@endsection

@section('scripts')
<script type="text/javascript">
    $('.supportDT').DataTable({
        "dom": 'frtp',
        "iDisplayLength": 10,
        "lengthMenu": false,
        columnDefs: [{
            orderable: false,
            targets: [0, 4, 5],
        }, ],
    });
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endsection