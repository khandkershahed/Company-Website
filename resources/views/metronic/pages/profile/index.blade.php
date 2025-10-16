<x-admin-app-layout :title="'My Profile'">
    <div class="px-0 container-fluid">
        
        <div class="mb-5 shadow-sm card mb-xl-10">
            <div class="pb-0 card-body pt-9">
                <div class="flex-wrap d-flex flex-sm-nowrap">
                    <div class="mb-4 me-7">
                        <div class="symbol symbol-200px symbol-fixed position-relative">
                            <img src="{{ !empty($user->photo) && file_exists(public_path('upload/Profile/admin/' . $user->photo)) ? asset('upload/Profile/admin/' . $user->photo) : asset('https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name)) }}"
                                alt="image">
                            <div
                                class="bottom-0 mb-6 border-4 position-absolute translate-middle start-100 bg-success rounded-circle border-body h-20px w-20px">
                            </div>
                        </div>
                    </div>

                    <div class="flex-grow-1">
                        <div class="flex-wrap mb-2 d-flex justify-content-between align-items-start">
                            <div class="d-flex flex-column">
                                <div class="mb-2 d-flex align-items-center">
                                    <a href="#"
                                        class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $user->name }}</a>
                                    <a href="#"><i class="ki-duotone ki-verify fs-1 text-primary"><span
                                                class="path1"></span><span class="path2"></span></i></a>
                                </div>

                                <div class="mb-4 fw-semibold fs-6 pe-2">
                                    <a href="#"
                                        class="mb-2 text-gray-500 d-flex align-items-center text-hover-primary me-5">
                                        <i class="fas fa-user fs-4 me-1" aria-hidden="true"></i>
                                        {{ $user->designation }}
                                    </a>
                                    <div>
                                        <a href="#"
                                            class="mb-2 text-gray-500 d-flex align-items-center text-hover-primary me-5">
                                            <i class="fas fa-location-dot fs-4 me-1" aria-hidden="true"></i>
                                            {{ $user->address }}
                                        </a>
                                    </div>
                                    <div>
                                        <a href="mailto:{{ $user->email }}"
                                            class="mb-2 text-gray-500 d-flex align-items-center text-hover-primary">
                                            <i class="fas fa-envelope fs-4 pe-2" aria-hidden="true"></i>
                                            {{ $user->email }}
                                        </a>
                                    </div>
                                    {{-- <div
                                        class="px-4 py-3 mt-5 mb-3 border border-gray-300 border-dashed rounded min-w-125px me-6">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span
                                                    class="path1"></span><span class="path2"></span></i>
                                            <div class="fs-2 fw-bold counted" data-kt-countup="true"
                                                data-kt-countup-value="4500" data-kt-countup-prefix="$"
                                                data-kt-initialized="1">
                                                $4,500
                                            </div>
                                        </div>

                                        <div class="text-gray-500 fw-semibold fs-6">
                                            Earnings
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                            <div class="d-flex w-75">
                                <div class="border-transparent card w-100" data-bs-theme="light"
                                    style="background-color: #1C325E;">

                                    <div class="card-body d-flex ps-xl-15 h-125px">

                                        <div class="m-0">


                                        </div>



                                        <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/illustrations/sigma-1/17-dark.png"
                                            class="bottom-0 position-absolute me-3 end-0 h-200px" alt="">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="border-transparent nav nav-stretch nav-line-tabs nav-line-tabs-2x fs-5 fw-bold">
                    <li class="mt-2 nav-item">
                        <a class="py-5 nav-link text-active-primary ms-0 me-10 active" href="/hr-admin/single-profile">
                            Overview
                        </a>
                    </li>

                    <li class="mt-2 nav-item">
                        <a class="py-5 nav-link text-active-primary ms-0 me-10" href="all-documents.html">
                            Documents
                        </a>
                    </li>

                    <li class="mt-2 nav-item">
                        <a class="py-5 nav-link text-active-primary ms-0 me-10" href="javascript:void(0)">
                            Security
                        </a>
                    </li>
                    <li class="mt-2 nav-item">
                        <a class="py-5 nav-link text-active-primary ms-0 me-10" href="/hr-admin/single-attendance">
                            Attendace
                        </a>
                    </li>
                    <li class="mt-2 nav-item">
                        <a class="py-5 nav-link text-active-primary ms-0 me-10" href="/hr-admin/single-leave">
                            Leaves
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="mb-5 shadow-sm card mb-xl-10" id="kt_profile_details_view">
            <div class="cursor-pointer card-header">
                <div class="m-0 card-title">
                    <h3 class="m-0 fw-bold">Profile Details</h3>
                </div>

                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#profileedit"
                    class="btn btn-sm btn-primary align-self-center">Edit Profile</a>

                <div class="modal fade" id="profileedit" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="profileeditLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="profileeditLabel">
                                    Profile Details
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form id="myform" method="post" action="{{ route('employee.update', $user->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="container pt-2">
                                        <div class="row">
                                            <div class="col-lg-6 mb-7">
                                                <div class="mb-5">
                                                    <label class="form-label" for="basicpill-firstname-input">Full
                                                        Name</label>
                                                    <input type="text" maxlength="80"
                                                        class="form-control form-control-sm"
                                                        placeholder="Enter Employees Name" name="name"
                                                        value="{{ $user->name }}" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-7">
                                                <div class="mb-5">
                                                    <label class="form-label"
                                                        for="basicpill-email-input">Email</label>
                                                    <input type="email" class="form-control form-control-sm"
                                                        placeholder="Enter Email ID" name="email"
                                                        value="{{ $user->email }}" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-7">
                                                <div class="mb-5">
                                                    <label class="form-label"
                                                        for="basicpill-email-input">Designation</label>
                                                    <input maxlength="50" type="text"
                                                        class="form-control form-control-sm"
                                                        placeholder="Enter Employees Designation" name="designation"
                                                        value="{{ $user->designation }}" />
                                                </div>
                                            </div>

                                            <div class="col-lg-4 mb-7">
                                                <div class="mb-5">
                                                    <label class="form-label"
                                                        for="basicpill-phoneno-input">Phone</label>
                                                    <input maxlength="15" type="text"
                                                        class="form-control form-control-sm allow_decimal"
                                                        placeholder="Enter Phone Number" name="phone"
                                                        value="{{ $user->phone }}" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-7">
                                                <div class="mb-5">
                                                    <label class="form-label" for="basicpill-email-input">Job
                                                        Category</label>
                                                    <select name="category_id"
                                                        class="form-select form-select-sm" data-control="select2"
                                                        data-container-css-class="select-sm" data-allow-clear="true"
                                                        data-minimum-results-for-search="Infinity"
                                                        data-placeholder="Choose Employee Category">
                                                        <option></option>
                                                        @foreach ($employeeCategories as $employeeCategory)
                                                            <option value="{{ $employeeCategory->id }}"
                                                                @selected($user->category_id == $employeeCategory->id)>
                                                                {{ $employeeCategory->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-7">
                                                <div class="mb-5">
                                                    <label class="form-label star"
                                                        for="basicpill-phoneno-input">Employee Code
                                                        (Biometric ID)
                                                    </label>
                                                    <input type="text"
                                                        class="form-control form-control-sm allow_decimal"
                                                        placeholder="Employee Code (Biometric ID)" name="employee_id"
                                                        maxlength="15" value="{{ $user->employee_id }}" required />
                                                </div>
                                                <div class="invalid-feedback"> Please Enter Employee Code.</div>
                                            </div>
                                            <div class="col-lg-4 mb-7">
                                                <div class="mb-5">
                                                    <label class="form-label"
                                                        for="basicpill-firstname-input">Country</label>
                                                    <input type="text" maxlength="50"
                                                        class="form-control form-control-sm" placeholder="Enter Country"
                                                        name="country" value="{{ $user->country }}" />
                                                </div>
                                            </div>

                                            <div class="col-lg-4 mb-7">
                                                <div class="mb-5">
                                                    <label class="form-label star"
                                                        for="basicpill-firstname-input">Department</label>

                                                    <select name="department[]" class="form-select form-select-sm"
                                                        data-allow-clear="true" data-control="select2"
                                                        multiple="multiple" data-include-select-all-option="true"
                                                        data-placeholder="Choose Sector" data-enable-filtering="true"
                                                        data-enable-case-insensitive-filtering="true" required>
                                                        @php
                                                            $employeeIds = isset($user->department)
                                                                ? json_decode($user->department, true)
                                                                : [];
                                                        @endphp
                                                        <option value="admin" @selected(is_array($employeeIds) && in_array('admin', $employeeIds))>Admin
                                                        </option>
                                                        <option value="business" @selected(is_array($employeeIds) && in_array('business', $employeeIds))>Business
                                                        </option>
                                                        <option value="accounts" @selected(is_array($employeeIds) && in_array('accounts', $employeeIds))>Accounts
                                                        </option>
                                                        <option value="hr" @selected(is_array($employeeIds) && in_array('hr', $employeeIds))>HR</option>
                                                        <option value="site" @selected(is_array($employeeIds) && in_array('site', $employeeIds))>Site &
                                                            Contents
                                                        </option>
                                                        <option value="logistics" @selected(is_array($employeeIds) && in_array('logistics', $employeeIds))>
                                                            Logistics
                                                        </option>
                                                        <option value="support" @selected(is_array($employeeIds) && in_array('support', $employeeIds))>Support
                                                        </option>
                                                    </select>
                                                    <div class="invalid-feedback"> Please Enter Department.</div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-4 mb-7">
                                                <div class="mb-5">
                                                    <label class="form-label"
                                                        for="basicpill-firstname-input">Role</label>
                                                    <select name="role" class="form-control form-select-sm select"
                                                        data-container-css-class="select-sm"
                                                        data-minimum-results-for-search="Infinity"
                                                        data-placeholder="Choose Sector" required>
                                                        <option></option>
                                                        <option value="admin" @selected($user->role == 'admin')>Admin
                                                        </option>
                                                        <option value="manager" @selected($user->role == 'manager')>Manager
                                                        </option>
                                                        <option value="others" @selected($user->role == 'others')>Others
                                                        </option>
                                                        <option value="developer" @selected($user->role == 'developer')>Support
                                                            Developer</option>
                                                    </select>
                                                    <div class="invalid-feedback"> Please Enter Role.</div>
                                                </div>
                                            </div> --}}

                                            <div class="col-lg-4 mb-7">
                                                <div class="mb-4">
                                                    <label class="form-label required"
                                                        for="basicpill-firstname-input">Supervisor</label>
                                                    <select name="supervisor_id" class="form-select form-select-sm"
                                                        data-allow-clear="true" data-control="select2"
                                                        data-placeholder="Select a Supervisor" data-allow-clear="true"
                                                        required>
                                                        <option></option>
                                                        @foreach ($employees as $supervisor)
                                                            <option value="{{ $supervisor->id }}"
                                                                @selected(old('supervisor_id', $user->supervisor_id) == $supervisor->id)>
                                                                {{ $supervisor->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback"> Please Enter Supervisor.</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 mb-7">
                                                <div class="mb-5">
                                                    <label class="form-label" for="address">Address</label>
                                                    <textarea class="form-control form-control-sm" name="address" id="address" rows="2">{{ old('address', $user->address) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-7">
                                                <div class="mb-5">
                                                    <label class="form-label" for="photo">Profile
                                                        Picture</label>
                                                    <x-metronic.file-input id="photo" name="photo"
                                                        :source="asset('upload/Profile/admin/' . $user->photo)" :value="old('photo')"></x-metronic.file-input>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-7">
                                                <div class="mb-4">
                                                    <label class="form-label" for="sign">Sign</label>
                                                    <x-metronic.file-input id="sign" name="sign"
                                                        :source="asset('upload/Profile/admin/' . $user->sign)" :value="old('sign')"></x-metronic.file-input>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-4 mb-7">
                                                <div class="mb-5">
                                                    <label class="form-label"
                                                        for="basicpill-firstname-input">Password</label>
                                                    <input type="password" class="form-control form-control-sm"
                                                        id="password" name="password">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-7">
                                                <div class="mb-5">
                                                    <label class="form-label" for="basicpill-firstname-input">Confirm
                                                        Password</label>
                                                    <input type="password" class="form-control form-control-sm"
                                                        id="confirm_password" name="confirm_password">
                                                    <div id="message"></div>
                                                </div>
                                            </div> --}}
                                        </div>

                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary from-prevent-multiple-submits"
                                    style="padding: 10px;">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-9">
                <div class="row mb-7">

                    <div class="mb-4 col-lg-4 col-md-4">
                        <div class="mb-7">
                            <label class="fw-semibold text-muted form-label d-block">Full Name</label>
                            <span class="text-gray-800 fw-bold fs-6 d-block">{{ $user->name }}</span>
                        </div>


                        <div class="mb-7">
                            <label class="fw-semibold text-muted form-label d-block">Departments</label>
                            @if (!empty($user->department))
                                @foreach (json_decode($user->department, true) as $dept)
                                    <span
                                        class="badge badge-light-primary me-1 mb-1 text-capitalize">{{ $dept }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </div>

                    </div>


                    <div class="mb-4 col-lg-2 col-md-4">
                        <div class="mb-7">
                            <label class="fw-semibold text-muted form-label d-block">Contact Phone</label>
                            <div class="d-flex align-items-center">
                                <span class="text-gray-800 fw-bold fs-6 me-2">{{ $user->phone ?? 'N/A' }}</span>
                                @if ($user->email_verified_at)
                                    <span class="badge badge-success">Verified</span>
                                @else
                                    <span class="badge badge-secondary">Unverified</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-7">
                            <label class="fw-semibold text-muted form-label d-block">User Type</label>
                            <span class="text-gray-800 fw-semibold fs-6 d-block">{{ ucfirst($user->role) }}</span>
                        </div>

                    </div>


                    <div class="mb-4 col-lg-2 col-md-4">
                        <div class="mb-7">
                            <label class="fw-semibold text-muted form-label d-block">Country</label>
                            <span class="text-gray-800 fw-bold fs-6 d-block">{{ $user->country ?? 'N/A' }}</span>
                        </div>

                        <div class="mb-7">
                            <label class="fw-semibold text-muted form-label d-block">Communication</label>
                            <span class="text-gray-800 fw-bold fs-6 d-block">Email, Phone</span>
                        </div>
                    </div>


                    <div class="mb-4 col-lg-2 col-md-4">
                        <div class="mb-7">
                            <label class="fw-semibold text-muted form-label d-block">Address</label>
                            <span class="text-gray-800 fw-semibold fs-6 d-block">{{ $user->address ?? 'N/A' }}</span>
                        </div>

                        <div class="mb-7">
                            <label class="fw-semibold text-muted form-label d-block">Status</label>
                            <span class="text-gray-800 fw-semibold fs-6 d-block">{{ ucfirst($user->status) }}</span>
                        </div>
                    </div>


                    <div class="mb-4 col-lg-2 col-md-4">
                        <label class="fw-semibold text-muted form-label d-block">Joining Date</label>
                        <div class="mb-7">
                            <span
                                class="text-gray-800 fw-semibold fs-6 d-block">{{ $user->created_at->format('Y') }}</span>
                        </div>


                    </div>
                </div>

            </div>
        </div>


    </div>
    @push('scripts')
    @endpush
</x-admin-app-layout>

