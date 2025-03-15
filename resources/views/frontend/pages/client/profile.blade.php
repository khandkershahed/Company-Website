@extends('frontend.master')
@section('content')
    <section class="content_wrapper dashboard-container">
        <div class="page-wrapper chiller-theme toggled">
            @include('frontend.pages.client.partials.sidebar')
            <div class="content_wrapper">
                <div class="container dashboard-container-2">
                    <div class="section_wrapper pt-4">
                        <div class="card my-4 shadow-sm p-3 mx-0 rounded-0 border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <img src="{{ !empty($data->photo) ? url('upload/Profile/user/' . $data->photo) : url('upload/no_image.jpg') }}"
                                            class="img-fluid border shadow-sm p-2" alt="">
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="profile_info">
                                            <h4 class="m-0">
                                                <strong class="main_color">{{ ucfirst($data->name) }}</strong>
                                            </h4>
                                            <div class="d-flex flex-wrap fw-bold fs-6 pe-2">
                                                @if (!empty($data->user_type))
                                                    <a href="#"
                                                        class="d-flex align-items-center text-gray-400 text-hover-primary me-3 mb-2">
                                                        <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                        <span class="svg-icon svg-icon-4 me-1">
                                                            <i class="fa-solid fa-user-check"></i>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        {{ $data->user_type }}
                                                    </a>
                                                @endif
                                                @if (!empty($data->company_name))
                                                    <a href="#"
                                                        class="d-flex align-items-center text-gray-400 text-hover-primary me-3 mb-2">
                                                        <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                        <span class="svg-icon svg-icon-4 me-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path fill="#2b3344"
                                                                    d="M21.5,21H20V7.5A.49.49,0,0,0,19.66,7L16,5.47V21H15V3.5a.5.5,0,0,0-.5-.5h-9a.5.5,0,0,0-.5.5V21H3.5a.5.5,0,0,0,0,1h18a.5.5,0,0,0,0-1Zm-4-12h1a.5.5,0,0,1,.5.5.51.51,0,0,1-.5.5h-1a.51.51,0,0,1-.5-.5A.5.5,0,0,1,17.5,9Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3h1a.51.51,0,0,1,.5.5.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5A.51.51,0,0,1,17.5,15Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1ZM11,6h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1ZM7.94,6H9A.5.5,0,0,1,9,7h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm2.56,6V19h-1v2h-1V18.47A.5.5,0,0,1,9,18h2a.5.5,0,0,1,.5.5V21Z">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        {{ $data->company_name }}
                                                    </a>
                                                @endif
                                                @if (!empty($data->city))
                                                    <a href="#"
                                                        class="d-flex align-items-center text-gray-400 text-hover-primary me-3 mb-2">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                                        <span class="svg-icon svg-icon-4 me-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3"
                                                                    d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                                                    fill="currentColor"></path>
                                                                <path
                                                                    d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        {{ $data->city }}
                                                    </a>
                                                @endif
                                                @if (!empty($data->email))
                                                    <a href="#"
                                                        class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                        <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                        <span class="svg-icon svg-icon-4 me-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3"
                                                                    d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                                    fill="currentColor"></path>
                                                                <path
                                                                    d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        {{ $data->email }}
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 offset-lg-3 ms-0 pt-5">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="fw-bold fs-6 text-gray-400">Profile Compleation</p>
                                                        <p class="fw-bolder fs-6">{{ $completionPercentage }}%</p>
                                                    </div>
                                                    <div>
                                                        <div class="progress w-100 rounded-0">
                                                            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated"
                                                                role="progressbar"
                                                                style="width: {{ $completionPercentage }}%"
                                                                aria-valuenow="{{ $completionPercentage }}"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>{{ $data->about }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Content Detailes-->
                        <div class="row px-2">
                            <div class="card rounded-0 px-0 shadow-sm mt-0 border-0">
                                <div class="card-header m-0 rounded-0 p-1 main_bg">
                                    <div class="d-flex justify-content-between px-3">
                                        <div>
                                            <h4 class="text-end text-white ps-lg-4 ps-sm-0 pt-1">Profile Information
                                            </h4>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a class="" href="javascript:void(0);" title="Edit Your Profie"
                                                data-bs-toggle="modal" data-bs-target="#profileModal">
                                                <i class="fa fa-xl fa-pencil-square mt-1 text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row p-5 content-box-area">
                                        <div class="col-lg-6 col-sm-12 boder-left" style="border-right: 1px solid #f5f4ef;">
                                            <div class="row mb-1">
                                                <div class="col-lg-4 col-sm-12">
                                                    <h6 class="main_color fw-bold p-0 m-0">Name </h6>
                                                </div>
                                                <div class="col-lg-1">:</div>
                                                <div class="col-lg-7">
                                                    <h6 class="p-0 m-0 ms-1 text-capitalize">{{ $data->name }}</h6>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-lg-4">
                                                    <h6 class="main_color fw-bold p-0 m-0">Email</h6>
                                                </div>
                                                <div class="col-lg-1">:</div>
                                                <div class="col-lg-7">
                                                    <h6 class="p-0 m-0 ms-1">{{ $data->email }}</h6>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-lg-4">
                                                    <h6 class="main_color fw-bold p-0 m-0">Phone</h6>
                                                </div>
                                                <div class="col-lg-1">:</div>
                                                <div class="col-lg-7">
                                                    <h6 class="p-0 m-0 ms-1">{{ $data->phone }}</h6>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-lg-4">
                                                    <h6 class="main_color fw-bold p-0 m-0">Company Name </h6>
                                                </div>
                                                <div class="col-lg-1">:</div>
                                                <div class="col-lg-7">
                                                    <h6 class="p-0 m-0 ms-1">{{ $data->company_name }}</h6>
                                                </div>
                                            </div>
                                            {{-- <div class="row mb-1">
                                                <div class="col-lg-4">
                                                    <h6 class="main_color fw-bold p-0 m-0">Support Tier</h6>
                                                </div>
                                                <div class="col-lg-1">:</div>
                                                <div class="col-lg-7">
                                                    <span
                                                        class="badge bg-success">{{ ucfirst($data->support_tier) }}</span>
                                                    <h6 class="p-0 m-0 ms-1"></h6>
                                                </div>
                                            </div> --}}


                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            @if (!empty($data->user_type) && $data->user_type === 'partner')
                                                <div class="row mb-1">
                                                    <div class="col-4">
                                                        <h6 class="ms-3 main_color fw-bold p-0 m-0">Tin Number</h6>
                                                    </div>
                                                    <div class="col-1">:</div>
                                                    <div class="col-7">
                                                        <h6 class="p-0 m-0 ms-1">{{ $data->tin_number }}</h6>
                                                    </div>
                                                </div>
                                            @endif
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
                                                    <h6 class="ms-3 main_color fw-bold p-0 m-0">City</h6>
                                                </div>
                                                <div class="col-1">:</div>
                                                <div class="col-7">
                                                    <h6 class="p-0 m-0 ms-1">{{ $data->city }}</h6>
                                                </div>
                                            </div>
                                            @if (!empty($data->user_type) && $data->user_type === 'client')
                                                <div class="row mb-1">
                                                    <div class="col-4">
                                                        <h6 class="ms-3 main_color fw-bold p-0 m-0">Country</h6>
                                                    </div>
                                                    <div class="col-1">:</div>
                                                    <div class="col-7">
                                                        <h6 class="p-0 m-0 ms-1">{{ $data->country }}</h6>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="row mb-1">
                                                <div class="col-4">
                                                    <h6 class="ms-3 main_color fw-bold p-0 m-0">Account Status</h6>
                                                </div>
                                                <div class="col-1">:</div>
                                                <div class="col-7">
                                                    <span
                                                        class="badge bg-success pt-0">{{ ucfirst($data->status) }}</span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="card rounded-0 px-0 shadow-sm mt-0 border-0">
                                <div class="card-header m-0 rounded-0 p-1 main_bg">
                                    <div class="d-flex justify-content-between px-3">
                                        <div>
                                            <h4 class="text-end text-white ps-lg-4 ps-sm-0 pt-1">Password & Security
                                            </h4>
                                        </div>
                                        {{-- <div class="d-flex align-items-center">
                                            <a class="" href="javascript:void(0);" title="Edit Your Profie"
                                                data-bs-toggle="modal" data-bs-target="#profileModal">
                                                <i class="fa fa-xl fa-pencil-square mt-1 text-white"></i>
                                            </a>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <form id="myform" method="post" action="{{ route('client.update.password') }}">
                                        @csrf
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @elseif(session('error'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        <div class="row gx-1 text-start align-items-center p-3">
                                            <div class="col-md-3">
                                                <div class="mb-1">
                                                    <label for="">Old Password</label>
                                                    <input type="password" name="old_password"
                                                        class="form-control mb-2 @error('old_password') is-invalid @enderror"
                                                        id="current_password" placeholder="Old Password" />

                                                    @error('old_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-1">
                                                    <label for="">New Password</label>
                                                    <input type="password" name="new_password"
                                                        class="form-control mb-2 @error('new_password') is-invalid @enderror"
                                                        id="new_password" placeholder="New Password" />

                                                    @error('new_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-1">
                                                    <label for="">Confirm New Password</label>
                                                    <input type="password" name="new_password_confirmation"
                                                        class="form-control mb-2" id="new_password_confirmation"
                                                        placeholder="Confirm New Password" />
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn-color w-auto p-2 mt-2"
                                                        id="submitbtn">Submit<i
                                                            class="ph-paper-plane-tilt ms-2"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="card rounded-0 px-0 shadow-sm mt-0 border-0">
                                <div class="card-header m-0 rounded-0 p-1 main_bg">
                                    <div class="d-flex justify-content-between px-3">
                                        <div>
                                            <h4 class="text-end text-white ps-lg-4 ps-sm-0 pt-1">Your Team Members</h4>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a class="" href="javascript:void(0);" title="Add Your Team Members"
                                                data-bs-toggle="modal" data-bs-target="#teamAddModal">
                                                <i class="fa fa-xl fa-plus-square mt-1 text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="col-lg-12 p-0">
                                        <div class="table-responsive p-2">
                                            <table class="table supportDT table-striped table-hover text-center">
                                                <thead style="background-color:#24729759 !important">
                                                    <tr>
                                                        <th width="30%">Name </th>
                                                        <th width="20%">Company </th>
                                                        <th width="10%">Designation</th>
                                                        <th width="20%">Email</th>
                                                        <th width="10%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($teams as $team)
                                                        <tr class="cliackable-row">
                                                            <td><span class="border-bottom-link">{{ $team->name }}
                                                                </span></td>
                                                            <td><span
                                                                    class="border-bottom-link">{{ $team->company_name }}</span>
                                                            </td>
                                                            <td><span class="border-bottom-link">
                                                                    {{ $team->designation }}</span>
                                                            </td>
                                                            <td><span
                                                                    class="border-bottom-link">{{ $team->email }}</span>
                                                            </td>
                                                            <td>
                                                                <a class="" href="javascript:void(0);"
                                                                    title="Edit Your Profie" data-bs-toggle="modal"
                                                                    data-bs-target="#teamEditModal{{ $team->id }}">
                                                                    <i class="fa fa-xl fa-pen-square mt-1"></i>
                                                                </a>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div id="profileModal" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content rounded-0">
                                    <form id="myform" method="post" action="{{ route('client.profile.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header p-2" style="background-color: #ae0a46;">
                                            <h5 class="modal-title text-center mb-0 text-white">Edit Profile</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-1 text-start">
                                                        <label class="form-label fw-bold" style="font-size: 14px"
                                                            for="basicpill-firstname-input">Full Name</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="basicpill-firstname-input" name="name"
                                                            value="{{ $data->name }}" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-1 text-start">
                                                        <label class="form-label fw-bold" style="font-size: 14px"
                                                            for="basicpill-email-input">User Name</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="basicpill-email-input" name="username"
                                                            value="{{ $data->name }}" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="mb-1 text-start">
                                                        <label class="form-label fw-bold" style="font-size: 14px"
                                                            for="basicpill-phoneno-input">Phone</label>
                                                        <input type="tel" class="form-control form-control-sm"
                                                            id="basicpill-phoneno-input" name="phone"
                                                            placeholder="Eg: (+880)1754348949"
                                                            value="{{ $data->phone }}"
                                                            title="Please enter a valid phone number in the format: (+XXX)XXXXXXXXX"
                                                            pattern="^\(\+\d{1,3}\)\d{1,}$">

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-1 text-start">
                                                        <label class="form-label fw-bold" style="font-size: 14px"
                                                            for="basicpill-email-input">Email</label>
                                                        <input type="email" class="form-control form-control-sm"
                                                            id="basicpill-email-input" name="email"
                                                            placeholder="Eg: john@gmail.com"
                                                            value="{{ $data->email }}" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="mb-1 text-start">
                                                        <label class="form-label fw-bold" style="font-size: 14px"
                                                            for="basicpill-firstname-input">Company Name</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="company_name" id="basicpill-firstname-input"
                                                            placeholder="Eg: NGen IT"
                                                            value="{{ $data->company_name }}" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-1 text-start">
                                                        <label class="form-label fw-bold" style="font-size: 14px"
                                                            for="basicpill-firstname-input">Country</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            placeholder="Eg: Bangladesh" id="basicpill-firstname-input"
                                                            name="country" value="{{ $data->country }}" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-1 text-start">
                                                        <label class="form-label fw-bold" style="font-size: 14px"
                                                            for="basicpill-firstname-input">City</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            placeholder="Eg: Dhaka" id="basicpill-firstname-input"
                                                            name="city" value="{{ $data->city }}" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="mb-1 text-start">
                                                        <label class="form-label fw-bold" style="font-size: 14px"
                                                            for="basicpill-firstname-input">Postal</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            placeholder="Eg: 1215" id="basicpill-firstname-input"
                                                            name="postal" value="{{ $data->postal }}" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-10 col-sm-12 text-start">
                                                            <label class="form-label fw-bold" style="font-size: 14px"
                                                                for="basicpill-firstname-input">Profile
                                                                Picture</label>
                                                            <input id="image" type="file"
                                                                class="form-control form-control-sm"
                                                                id="basicpill-firstname-input" name="photo" />
                                                        </div>
                                                        <div class="col-lg-2 col-sm-12">
                                                            <img id="showImage" class="border rounded-circle mt-3"
                                                                src="{{ !empty($data->photo) ? url('upload/Profile/user/' . $data->photo) : url('upload/no_image.jpg') }}"
                                                                alt="NGEN-Client" width="50px" height="50px" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-1 text-start">
                                                        <label class="form-label fw-bold" style="font-size: 14px"
                                                            for="basicpill-about-input">About Me</label>
                                                        <textarea id="basicpill-about-input" class="form-control form-control-sm" rows="2" name="about"
                                                            placeholder="About Yourself">
                                                            {{ $data->about }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-1 text-start">
                                                        <label class="form-label fw-bold" style="font-size: 14px"
                                                            for="basicpill-address-input">Address</label>
                                                        <textarea id="basicpill-address-input" class="form-control form-control-sm" rows="2" name="address"
                                                            placeholder="Eg: Dhaka, Bangladesh">{{ $data->address }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0 p-1">
                                            <button type="submit" class="btn-color effect01">Submit</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div id="teamAddModal" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <!-- Modal content-->
                                <div class="modal-content rounded-0">
                                    <form id="myform" method="post" action="{{ route('client-team.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header p-2 pt-0 border-bottom shadow-sm px-3">
                                            <h5 class="modal-title text-center">Add Team</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" class="form-control form-control-sm"
                                                    name="client_id" value="{{ Auth::guard('client')->user()->id }}" />
                                                {{-- <div class="col-lg-4">
                                                    <div class="mb-1 text-start">
                                                        <label class="form-label fw-bold" style="font-size: 14px"
                                                            for="basicpill-firstname-input">Name</label>

                                                    </div>
                                                </div> --}}
                                                <div class="col-lg-6">
                                                    <div class="mb-1 text-start">
                                                        <label class="form-label fw-bold" style="font-size: 14px"
                                                            for="basicpill-firstname-input">Name</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="basicpill-firstname-input" name="name" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-1 text-start">
                                                        <label class="form-label fw-bold" style="font-size: 14px"
                                                            for="basicpill-email-input">Email</label>
                                                        <input type="email" class="form-control form-control-sm"
                                                            id="basicpill-email-input" name="email" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="mb-1 text-start">
                                                        <label class="form-label fw-bold" style="font-size: 14px"
                                                            for="basicpill-phoneno-input">Designation</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="basicpill-phoneno-input" name="designation" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-1 text-start">
                                                        <label class="form-label fw-bold" style="font-size: 14px"
                                                            for="basicpill-email-input">Company Name</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="basicpill-email-input" name="company_name" />
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
                    </div>
                </div>
            </div>
            <!-- Modal -->
        </div>
        <!-- page-wrapper" -->
    </section>
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
