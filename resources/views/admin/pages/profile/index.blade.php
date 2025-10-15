@extends('admin.master') 
@section('content')
    <div class="content-wrapper">

        <!-- Inner content -->


        <!-- Page header -->
        <div class="page-header page-header-light shadow">


            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <span class="breadcrumb-item active">My Profile</span>
                    </div>

                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->

        <div class="content">

            <!-- Inner container -->
            <div class="d-lg-flex align-items-lg-start">

                <!-- Left sidebar component -->
                <div class="sidebar sidebar-component sidebar-expand-lg bg-transparent shadow-none me-lg-3">

                    <!-- Sidebar content -->
                    <div class="sidebar-content">

                        <!-- Navigation -->
                        <div class="card rounded-0">
                            <div class="sidebar-section-body text-center">
                                <div class="card-img-actions d-inline-block mb-3">
                                    <img class="img-fluid rounded-circle"
                                        src="{{ !empty($data->photo) ? url('upload/Profile/user/' . $data->photo) : url('upload/no_image.jpg') }}"
                                        width="150" height="150" alt="">
                                    <div class="card-img-actions-overlay card-img rounded-circle">
                                        <a href="#" class="btn btn-outline-white btn-icon rounded-pill">
                                            <i class="ph-pencil"></i>
                                        </a>
                                    </div>
                                </div>

                                <h6 class="mb-0">{{ $data->name }}</h6>
                                <span class="text-muted">{{ $data->designation }}</span>
                            </div>

                            <ul class="nav nav-sidebar" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="#profile" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                                        role="tab">
                                        <i class="ph-user me-2"></i>
                                        My profile
                                    </a>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <a href="#schedule" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                                        tabindex="-1" role="tab">
                                        <i class="ph-calendar me-2"></i>
                                        Schedule
                                        <span class="fs-sm fw-normal text-muted ms-auto">02:56pm</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#inbox" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                                        tabindex="-1" role="tab">
                                        <i class="ph-envelope me-2"></i>
                                        Inbox
                                        <span class="badge bg-secondary rounded-pill ms-auto">29</span>
                                    </a>
                                </li> --}}
                                <li class="nav-item" role="presentation">
                                    <a href="#profile-setting" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                                        tabindex="-1" role="tab">
                                        <i class="ph-gear me-2"></i>
                                        Profile Settings
                                    </a>
                                </li>
                                <li class="nav-item-divider"></li>
                                <li class="nav-item" role="presentation">
                                    <a href="{{ route('admin.logout') }}" class="nav-link">
                                        <i class="ph-sign-out me-2"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /navigation -->

                    </div>
                    <!-- /sidebar content -->

                </div>
                <!-- /left sidebar component -->


                <!-- Right content -->
                <div class="tab-content flex-fill">
                    <div class="tab-pane fade active show" id="profile" role="tabpanel">

                        <div class="card rounded-0">
                            <div class="card-header rounded-0 border-0 shadow-sm px-3 py-2 d-flex justify-content-between">
                                <h4 class="pb-0 mb-0 text-uppercase site_color">Profile Information</h4>
                                @if (auth()->check() && in_array('support', json_decode(auth()->user()->department, true)))
                                @else
                                    @if (!empty($data->sign))
                                        <a class="" href="">
                                            <i class="site_color icon-pencil7 mt-1"></i>
                                        </a>
                                    @else
                                        <a class="" href="{{ route('employeement.create') }}">
                                            <i class="site_color icon-plus-circle2 mt-1"></i>
                                        </a>
                                    @endif
                                @endif

                            </div>
                            <div class="card-body pt-0">
                                <div class="row border p-3">
                                    <div class="col-lg-6 boder-left">
                                        <div class="row mb-1">
                                            <div class="col-4">
                                                <h6 class="main_color fw-bold p-0 m-0">Name </h6>
                                            </div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">
                                                <h6 class="p-0 m-0 ms-1">{{ $data->name }}</h6>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-4">
                                                <h6 class="main_color fw-bold p-0 m-0">Designation </h6>
                                            </div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">
                                                <h6 class="p-0 m-0 ms-1">{{ $data->designation }}</h6>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-4">
                                                <h6 class="main_color fw-bold p-0 m-0">Job Status </h6>
                                            </div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">
                                                <h6 class="p-0 m-0 ms-1">{{ $data->getCategoryName() }}</h6>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-4">
                                                <h6 class="main_color fw-bold p-0 m-0">Department </h6>
                                            </div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">
                                                <h6 class="p-0 m-0 ms-1">
                                                    @if (is_array(json_decode($data->department)))
                                                        @foreach (json_decode($data->department) as $department)
                                                            <span
                                                                class="badge bg-success">{{ ucfirst($department) }}</span>
                                                        @endforeach
                                                    @else
                                                        <span
                                                            class="badge bg-success">{{ ucfirst($data->department) }}</span>
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-4">
                                                <h6 class="main_color fw-bold p-0 m-0">Employee ID </h6>
                                            </div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">
                                                <h6 class="p-0 m-0 ms-1">{{ $data->employee_id }}</h6>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-4">
                                                <h6 class="ms-3 main_color fw-bold p-0 m-0">Email</h6>
                                            </div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">
                                                <h6 class="p-0 m-0 ms-1">{{ $data->email }}</h6>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-4">
                                                <h6 class="ms-3 main_color fw-bold p-0 m-0">Phone</h6>
                                            </div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">
                                                <h6 class="p-0 m-0 ms-1">{{ $data->phone }}</h6>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-4">
                                                <h6 class="ms-3 main_color fw-bold p-0 m-0">Address</h6>
                                            </div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">
                                                <h6 class="p-0 m-0 ms-1">{{ $data->address }}</h6>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-4">
                                                <h6 class="ms-3 main_color fw-bold p-0 m-0">Country</h6>
                                            </div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">
                                                <h6 class="p-0 m-0 ms-1">{{ $data->country }}</h6>
                                            </div>
                                        </div>
                                        <div class="row mb-1 d-flex align-items-center">
                                            <div class="col-4">
                                                <h6 class="ms-3 main_color fw-bold p-0 m-0">Sign</h6>
                                            </div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">
                                                <img src="{{ !empty($data->sign) ? url('upload/Profile/user/' . $data->sign) : url('upload/no_image.jpg') }}"
                                                    alt="{{ $data->sign }}" height="75px" width="135px">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="tab-pane fade" id="schedule" role="tabpanel">



                    </div>

                    <div class="tab-pane fade" id="inbox" role="tabpanel">



                    </div>

                    <div class="tab-pane fade" id="profile-setting" role="tabpanel">

                        <!-- Orders history -->
                        <div class="card">
                            <div class="card-header py-1">
                                <h5 class="text-center p-0 m-0">Your Account Details</h5>
                            </div>
                            <div class="card-body py-0">
                                <form id="myform" method="post" action="{{ route('admin.profile.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicpill-firstname-input">Full
                                                    Name</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="basicpill-firstname-input" name="name"
                                                    value="{{ $data->name }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicpill-email-input">Designation</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="basicpill-email-input" name="designation" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicpill-phoneno-input">Phone</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="basicpill-phoneno-input" name="phone"
                                                    value="{{ $data->phone }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicpill-email-input">Email</label>
                                                <input type="email" class="form-control form-control-sm"
                                                    id="basicpill-email-input" name="email"
                                                    value="{{ $data->email }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicpill-address-input">Address</label>
                                                <textarea id="basicpill-address-input" class="form-control form-control-sm" rows="2" name="address">{{ $data->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicpill-firstname-input">City</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="basicpill-firstname-input" name="city"
                                                    value="{{ $data->city }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicpill-firstname-input">Postal</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="basicpill-firstname-input" name="postal"
                                                    value="{{ $data->postal }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicpill-firstname-input">Profile
                                                    Picture</label>
                                                <input id="image" type="file" class="form-control form-control-sm"
                                                    id="basicpill-firstname-input" name="photo" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"> </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showImage"
                                                src="{{ !empty($data->photo) ? url('upload/Profile/admin/' . $data->photo) : url('upload/no_image.jpg') }}"
                                                alt="Admin" style="width:100px; height: 100px;" />
                                        </div>
                                    </div>

                                    <div class="row mt-1 mb-1">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn btn-primary" id="submitbtn">Submit<i
                                                    class="ph-paper-plane-tilt ms-2"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /orders history -->

                    </div>
                </div>
                <!-- /right content -->

            </div>
            <!-- /inner container -->

        </div>
        <!-- Content area -->

        <!-- /content area -->
        <!-- /inner content -->

    </div>
@endsection

{{-- @push('script')

@endpush


<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});


</script> --}}
