<x-admin-app-layout :title="'All Employees'">
    <div class="content-wrapper">
        <!-- Page header -->
        <!-- <div class="bg-white rounded-2">
            <div class="d-flex justify-content-between align-items-center">
                <div class="page-header-content">
                    <div class="px-2 d-flex">
                        <div class="py-2 breadcrumb">
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"></a>
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                            <a href="{{ route('admin.hr-and-admin.index') }}" class="breadcrumb-item">Hr and Admin</a>
                            <a href="{{ route('employee.index') }}" class="breadcrumb-item">
                                <span class="breadcrumb-item active">Employees</span>
                            </a>
                        </div>
                        <a href="#breadcrumb_elements"
                            class="p-0 border-transparent btn btn-light align-self-center collapsed d-lg-none rounded-pill ms-auto"
                            data-bs-toggle="collapse">
                            <i class="m-1 ph-caret-down collapsible-indicator ph-sm"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <a href="{{ route('employee-category.index') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-nfc-magnifying-glass me-1"></i>
                            <span>Employee Category</span>
                        </div>
                    </a>
                    <a href="{{ route('employee-department.index') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-nfc-magnifying-glass me-1"></i>
                            <span>Department</span>
                        </div>
                    </a>
                    <a href="{{ route('employee-department.index') }}" data-bs-toggle="modal"
                        data-bs-target="#addEmployee" class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-nfc-magnifying-glass me-1"></i>
                            <span>Add</span>
                        </div>
                    </a>
                </div>
            </div>
        </div> -->
        <!-- page header -->
        <!-- Sales Chain Page -->
        <div class="p-1 my-3 content">
            <div class="border-0 row nav-tabs" id="myTab" role="tablist">
                <div class="col-lg-12">
                    <div class="row gx-3">
                        <div class="mb-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="text-white border-0 card rounded-1 active " style="background-color: #0b6476;"
                                id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                                aria-controls="home" aria-selected="true">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="mb-0 text-white">Total Employee</h2>
                                        <div class="p-5 px-5 rounded-circle" style="background-color: #247297;">
                                            <h2 class="mb-0 text-white">{{ $employees->count() }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach ($employeeCategories as $employeeCategory)
                            <div class="mb-3 col-lg-3 col-md-6 col-sm-6">
                                <div class="text-white border-0 card rounded-1" style="background-color: #0b6476;"
                                    id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-{{ $employeeCategory->id }}" type="button" role="tab"
                                    aria-controls="profile" aria-selected="false">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 class="mb-0 text-white">{{ $employeeCategory->name }}</h2>
                                            <div class="py-5 px-7 rounded-circle" style="background-color: #247297;">
                                                <h2 class="mb-0 text-white">{{ $employeeCategory->employee->count() }}
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-lg-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="py-5 card-header align-items-center w-100"
                                        style="background-color: #0b6476;">
                                        <div class="d-flex justify-content-between align-items-center w-100">
                                            <h6 class="mb-0 text-center text-white">All Employee</h6>
                                            <div class="">
                                                <a href="{{ route('employee-category.index') }}"
                                                    class="bg-white border btn navigation_btn btn-sm">
                                                    <div class=" d-flex align-items-center">
                                                        <i class="fa-solid fa-nfc-magnifying-glass me-1"></i>
                                                        <span>Employee Category</span>
                                                    </div>
                                                </a>
                                                <a href="{{ route('employee-department.index') }}"
                                                    class="bg-white border btn navigation_btn btn-sm">
                                                    <div class=" d-flex align-items-center">
                                                        <i class="fa-solid fa-nfc-magnifying-glass me-1"></i>
                                                        <span>Department</span>
                                                    </div>
                                                </a>
                                                <a href="{{ route('employee-department.index') }}"
                                                    data-bs-toggle="modal" data-bs-target="#addEmployee"
                                                    class="bg-white border btn navigation_btn btn-sm">
                                                    <div class=" d-flex align-items-center">
                                                        <i class="fa-solid fa-nfc-magnifying-glass me-1"></i>
                                                        <span>Add</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-0 card-body">
                                        <div class="table-responsive">
                                            <table class="table text-center table-bordered employeeDT table-hover">
                                                <thead
                                                    style="border-bottom: 1px solid #247297; background-color: #eee;">
                                                    <tr class="fw-bold">
                                                        <th width="5%">SL</th>
                                                        <th width="10%">Image</th>
                                                        <th width="20%">Name</th>
                                                        <th width="15%">Job Status</th>
                                                        <th width="20%">Email</th>
                                                        <th width="15%">Designation</th>
                                                        {{-- <th width="23%">Department</th> --}}
                                                        <th width="15%" class="text-center">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($employees)
                                                        @foreach ($employees as $key => $employee)
                                                            <tr style="border-bottom: 1px solid #eee;">
                                                                <!-- Serial Number -->
                                                                <td>{{ ++$key }}</td>
                                                                <!-- Employee Image -->
                                                                <td>
                                                                    <img src="{{ !empty($employee->photo) && file_exists(public_path('storage/' . $employee->photo)) ? asset('storage/' . $employee->photo) : url('upload/no_image.jpg') }}"
                                                                        alt="" width="40px" height="40px"
                                                                        style="border-radius: 50%">
                                                                </td>
                                                                <!-- Employee Name -->
                                                                <td>{{ $employee->name }}</td>
                                                                <td>
                                                                    {{ optional($employee->employeeStatus)->name ?? 'No Job Status Assigned' }}

                                                                </td>
                                                                <!-- Employee Email -->
                                                                <td>{{ $employee->email }}</td>
                                                                <!-- Employee Designation -->
                                                                <td>{{ $employee->designation }}</td>
                                                                <!-- Employee Actions -->
                                                                <td class="text-center">
                                                                    <a href="{{ route('attendance.single.lastMonth', $employee->id) }}"
                                                                        hover-tooltip="Last month Attendance"
                                                                        tooltip-position="top"
                                                                        class="border-bottom-link me-4">
                                                                        <i
                                                                            class="fa-solid fa-arrow-up-right-from-square main_color go-icon"></i>
                                                                    </a>
                                                                    <a href="{{ route('attendance.single.currentMonth', $employee->id) }}"
                                                                        hover-tooltip="Current month Attendance"
                                                                        tooltip-position="top"
                                                                        class="border-bottom-link me-4">
                                                                        <i
                                                                            class="fa-solid fa-arrow-up-right-from-square main_color go-icon"></i>
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="text-primary"
                                                                        data-bs-target="#editEmployee{{ $employee->id }}"
                                                                        data-bs-toggle="modal" type="button">
                                                                        <i
                                                                            class="fa-solid fa-pen-to-square dash-icons"></i>
                                                                    </a>
                                                                    <a href="{{ route('employee.destroy', [$employee->id]) }}"
                                                                        class="mx-2 text-danger delete">
                                                                        <i
                                                                            class="delete fa-solid fa-trash dash-icons"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($employeeCategories as $employeeCategory)
                            <div class="tab-pane" id="profile-{{ $employeeCategory->id }}" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="col-lg-12">
                                    <h6 class="p-1 m-0 text-center"
                                        style="color: #fff; border-bottom: 1px solid #9042fc;background: #9042fc;">
                                        {{ $employeeCategory->name }} Employee
                                    </h6>
                                    <div class="card ronded-0">
                                        <div class="p-0 card-body">
                                            <div class="table-responsive">
                                                <table class="table text-center employeeDT table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%">SL</th>
                                                            <th width="10%">Image</th>
                                                            <th width="20%">Name</th>
                                                            <th width="15%">Job Status</th>
                                                            <th width="20%">Email</th>
                                                            <th width="15%">Designation</th>
                                                            {{-- <th width="23%">Department</th> --}}
                                                            <th width="15%" class="text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (!empty($employeeCategory->employee))
                                                            @foreach ($employeeCategory->employee as $key => $employee)
                                                                <tr>
                                                                    <!-- Serial Number -->
                                                                    <td>{{ ++$key }}</td>
                                                                    <!-- Employee Image -->
                                                                    <td>
                                                                        <img src="{{ !empty($employee->photo) && file_exists(public_path('storage/' . $employee->photo)) ? asset('storage/' . $employee->photo) : url('upload/no_image.jpg') }}"
                                                                            alt="" width="40px"
                                                                            height="40px">
                                                                    </td>
                                                                    <!-- Employee Name -->
                                                                    <td>{{ $employee->name }}</td>
                                                                    <td>
                                                                        @if ($employee->employeeStatus)
                                                                            {{ $employee->employeeStatus->name }}
                                                                        @else
                                                                            No Job Status Assigned
                                                                        @endif
                                                                    </td>
                                                                    <!-- Employee Email -->
                                                                    <td>{{ $employee->email }}</td>
                                                                    <!-- Employee Designation -->
                                                                    <td>{{ $employee->designation }}</td>
                                                                    <!-- Employee Actions -->
                                                                    <td class="text-center">
                                                                        <a href="{{ route('attendance.single.lastMonth', $employee->id) }}"
                                                                            hover-tooltip="Last month Attendance"
                                                                            tooltip-position="top"
                                                                            class="border-bottom-link me-4">
                                                                            <i
                                                                                class="fa-solid fa-arrow-up-right-from-square main_color go-icon"></i>
                                                                        </a>
                                                                        <a href="{{ route('attendance.single.currentMonth', $employee->id) }}"
                                                                            hover-tooltip="Current month Attendance"
                                                                            tooltip-position="top"
                                                                            class="border-bottom-link me-3">
                                                                            <i
                                                                                class="fa-solid fa-arrow-up-right-from-square main_color go-icon"></i>
                                                                        </a>
                                                                        <a href="javascript:void(0);"
                                                                            class="text-primary"
                                                                            data-bs-target="#editEmployee{{ $employee->id }}"
                                                                            data-bs-toggle="modal" type="button">
                                                                            <i
                                                                                class="fa-solid fa-pen-to-square dash-icons"></i>
                                                                        </a>
                                                                        <a href="{{ route('employee.destroy', [$employee->id]) }}"
                                                                            class="mx-2 text-danger delete">
                                                                            <i
                                                                                class="delete fa-solid fa-trash dash-icons"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Sales Chain Page -->
        <div id="addEmployee" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="p-5 px-4 text-white modal-header" style="background-color: #247297">
                        <h2 class="text-white">Register New Employee</h2>
                        <a type="button" data-bs-dismiss="modal" class="px-0 bg-transparent pe-4">
                            <i class="text-white fas fa-xmark"></i>
                        </a>
                    </div>
                    <div class="p-5 modal-body">
                        <form id="myform" method="post" class="needs-validation"
                            action="{{ route('employee.store') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="p-5 row g-3">
                                <!-- Full Name -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="form-label star">Full Name</label>
                                    <input type="text" maxlength="80" class="form-control "
                                        placeholder="Enter Employee Name" name="name" value="{{ old('name') }}"
                                        required>
                                    <div class="invalid-feedback"> Please Enter Full Name.</div>
                                </div>

                                <!-- Designation -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="form-label star">Designation</label>
                                    <input type="text" maxlength="50" class="form-control "
                                        placeholder="Enter Employee Designation" name="designation"
                                        value="{{ old('designation') }}" required>
                                    <div class="invalid-feedback"> Please Enter Designation.</div>
                                </div>

                                <!-- Email -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="form-label star">Email</label>
                                    <input type="email" class="form-control " placeholder="Enter Email ID"
                                        name="email" value="{{ old('email') }}" required>
                                    <div class="invalid-feedback"> Please Enter Email Address.</div>
                                </div>

                                <!-- Phone -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="form-label">Phone</label>
                                    <input type="text" maxlength="15" class="form-control allow_decimal"
                                        placeholder="Enter Phone Number" name="phone" value="{{ old('phone') }}">
                                </div>

                                <!-- Job Category -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="form-label star">Job Category</label>
                                    <select name="category_id" class="form-select" data-control="select2"
                                        data-placeholder="Select an option" data-hide-search="true" required>
                                        <option value="" disabled selected>Choose Employee Category</option>
                                        @foreach ($employeeCategories as $employeeCategory)
                                            <option value="{{ $employeeCategory->id }}">{{ $employeeCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"> Please Enter Job Category.</div>
                                </div>

                                <!-- Employee Code -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="form-label star">Employee Code (Biometric ID)</label>
                                    <input type="text" class="form-control allow_decimal"
                                        placeholder="Employee Code" name="employee_id" maxlength="15"
                                        value="{{ old('employee_id') }}" required>
                                    <div class="invalid-feedback"> Please Enter Employee Code.</div>
                                </div>

                                <!-- City -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="form-label">City</label>
                                    <input type="text" maxlength="50" class="form-control "
                                        placeholder="Enter City" name="city" value="{{ old('city') }}">
                                </div>

                                <!-- Department -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="form-label star">Department</label>
                                    <select name="department[]" class="form-select" data-control="select2"
                                        data-placeholder="Select an option" data-allow-clear="true"
                                        multiple="multiple" required>
                                        <option value="admin">Admin</option>
                                        <option value="business">Business</option>
                                        <option value="accounts">Accounts</option>
                                        <option value="site">Site & Contents</option>
                                        <option value="logistics">Logistics</option>
                                        <option value="support">Support</option>
                                        <option value="hr">HR</option>
                                    </select>
                                    <div class="invalid-feedback"> Please Enter Department.</div>
                                </div>

                                <!-- Role -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="form-label star">Role</label>
                                    <select name="role" class="form-select form-select-sm" required>
                                        <option value="" disabled selected>Choose Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="manager">Manager</option>
                                        <option value="others">Others</option>
                                        <option value="developer">Support Developer</option>
                                    </select>
                                    <div class="invalid-feedback"> Please Enter Role.</div>
                                </div>

                                <!-- Supervisor -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="form-label star">Supervisor</label>
                                    <select name="supervisor_id" class="form-select form-select-sm" required>
                                        <option value="" disabled selected>Choose Supervisor</option>
                                        @foreach ($employees as $supervisor)
                                            <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"> Please Enter Supervisor.</div>
                                </div>

                                <!-- Profile Picture -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="form-label">Profile Picture</label>
                                    <x-metronic.file-input name="photo"
                                        class="form-control"></x-metronic.file-input>
                                </div>

                                <!-- Sign -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="form-label">Sign</label>
                                    <x-metronic.file-input name="sign"
                                        class="form-control"></x-metronic.file-input>
                                </div>

                                <!-- Password -->
                                <div class="col-12 col-md-6 col-lg-6">
                                    <label class="form-label star">Password</label>
                                    <input type="password" class="form-control " id="password" name="password">
                                    <div class="invalid-feedback"> Please Enter Password.</div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-12 col-md-6 col-lg-6">
                                    <label class="form-label star">Confirm Password</label>
                                    <input type="password" class="form-control " id="confirm_password"
                                        name="confirm_password">
                                    <div id="message"></div>
                                    <div class="invalid-feedback"> Please Enter Confirm Password.</div>
                                </div>

                                <!-- Submit -->
                                <div class="mt-5 col-12 text-end">
                                    <button type="submit" class="submit_btn btn btn-primary">Add Employee</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @foreach ($employees as $employee)
            <div id="editEmployee{{ $employee->id }}" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="p-5 px-4 text-white modal-header" style="background-color: #247297">
                            <h2 class="text-white">Edit Employee</h2>
                            <a type="button" data-bs-dismiss="modal" class="px-0 bg-transparent pe-4">
                                <i class="text-white fas fa-xmark"></i>
                            </a>
                        </div>
                        <div class="p-5 modal-body">
                            <form id="myform" method="post"
                                action="{{ route('employee.update', $employee->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="p-5 row g-3">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="basicpill-firstname-input">Full
                                                Name</label>
                                            <input type="text" maxlength="80" class="form-control "
                                                placeholder="Enter Employees Name" name="name"
                                                value="{{ $employee->name }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="basicpill-email-input">Designation</label>
                                            <input maxlength="50" type="text" class="form-control "
                                                placeholder="Enter Employees Designation" name="designation"
                                                value="{{ $employee->designation }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="mb-3">
                                            <label class="form-label" for="basicpill-email-input">Email</label>
                                            <input type="email" class="form-control " placeholder="Enter Email ID"
                                                name="email" value="{{ $employee->email }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="basicpill-phoneno-input">Phone</label>
                                            <input maxlength="15" type="text" class="form-control allow_decimal"
                                                placeholder="Enter Phone Number" name="phone"
                                                value="{{ $employee->phone }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="basicpill-email-input">Job
                                                Category</label>
                                            <select name="category_id" class="form-select" data-control="select2"
                                                data-placeholder="Select an option" data-allow-clear="true">
                                                <option></option>
                                                @foreach ($employeeCategories as $employeeCategory)
                                                    <option value="{{ $employeeCategory->id }}"
                                                        @selected($employee->category_id == $employeeCategory->id)>
                                                        {{ $employeeCategory->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label star" for="basicpill-phoneno-input">Employee
                                                Code (Biometric ID)
                                            </label>
                                            <input type="text" class="form-control allow_decimal"
                                                placeholder="Employee Code (Biometric ID)" name="employee_id"
                                                maxlength="15" value="{{ $employee->employee_id }}" required />
                                        </div>
                                        <div class="invalid-feedback"> Please Enter Employee Code.</div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="basicpill-firstname-input">City</label>
                                            <input type="text" maxlength="50" class="form-control "
                                                placeholder="Enter City" name="city"
                                                value="{{ $employee->city }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label star"
                                                for="basicpill-firstname-input">Department</label>
                                            <select name="department[]" class="form-select form-select-solid"
                                                data-control="select2" data-placeholder="Select an option"
                                                data-allow-clear="true" multiple="multiple" required>
                                                @php
                                                    $employeeIds = isset($employee->department)
                                                        ? json_decode($employee->department, true)
                                                        : [];
                                                @endphp
                                                <option value="admin" @selected(is_array($employeeIds) && in_array('admin', $employeeIds))>Admin</option>
                                                <option value="business" @selected(is_array($employeeIds) && in_array('business', $employeeIds))>Business
                                                </option>
                                                <option value="accounts" @selected(is_array($employeeIds) && in_array('accounts', $employeeIds))>Accounts
                                                </option>
                                                <option value="hr" @selected(is_array($employeeIds) && in_array('hr', $employeeIds))>HR</option>
                                                <option value="site" @selected(is_array($employeeIds) && in_array('site', $employeeIds))>Site & Contents
                                                </option>
                                                <option value="logistics" @selected(is_array($employeeIds) && in_array('logistics', $employeeIds))>Logistics
                                                </option>
                                                <option value="support" @selected(is_array($employeeIds) && in_array('support', $employeeIds))>Support
                                                </option>
                                            </select>
                                            <div class="invalid-feedback"> Please Enter Department.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="basicpill-firstname-input">Role</label>
                                            <select name="role" class="form-select" data-control="select2"
                                                data-placeholder="Select an option" data-allow-clear="true" required>
                                                <option></option>
                                                <option value="admin" @selected($employee->role == 'admin')>Admin</option>
                                                <option value="manager" @selected($employee->role == 'manager')>Manager
                                                </option>
                                                <option value="others" @selected($employee->role == 'others')>Others
                                                </option>
                                                <option value="developer" @selected($employee->role == 'developer')>Support
                                                    Developer</option>
                                            </select>
                                            <div class="invalid-feedback"> Please Enter Role.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label required"
                                                for="basicpill-firstname-input">Supervisor</label>
                                            <select name="supervisor_id" class="form-control select"
                                                data-control="select2" data-placeholder="Select a Supervisor"
                                                data-allow-clear="true" required>
                                                <option></option>
                                                @foreach ($employees as $supervisor)
                                                    <option value="{{ $supervisor->id }}"
                                                        @selected($employee->supervisor_id == $supervisor->id)>
                                                        {{ $supervisor->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback"> Please Enter Supervisor.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-4">
                                        {{-- last_evaluation_date --}}
                                        <label class="form-label" for="last_evaluation_date">Last Evaluation
                                            Date</label>
                                        <input id="last_evaluation_date" type="date" name="last_evaluation_date"
                                            class="form-control" value="{{ $employee->last_evaluation_date }}">
                                    </div>
                                    <div class="col-lg-4 mb-4">
                                        {{-- next_evaluation_date --}}
                                        <label class="form-label" for="next_evaluation_date">Next Evaluation
                                            Date</label>
                                        <input id="next_evaluation_date" type="date" name="next_evaluation_date"
                                            class="form-control" value="{{ $employee->next_evaluation_date }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="photo_edit">Profile
                                                Picture</label>
                                            <x-metronic.file-input id="photo_edit" name="photo"
                                                :source="asset('storage/' . $employee->photo)"></x-metronic.file-input>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="sign_edit">Sign</label>
                                            <x-metronic.file-input id="sign_edit" name="sign" class="form-control"
                                                :source="asset('storage/' . $employee->sign)"></x-metronic.file-input>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="basicpill-firstname-input">Password</label>
                                            <input type="password" class="form-control " id="password"
                                                name="password">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="basicpill-firstname-input">Confirm
                                                Password</label>
                                            <input type="password" class="form-control " id="confirm_password"
                                                name="confirm_password">
                                            <div id="message"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <x-metronic.label for="status" class="fw-bold fs-6 required">Select
                                            Status</x-metronic.label>
                                        <x-metronic.select-option id="status" name="status"
                                            data-hide-search="true" data-placeholder="Choose status">
                                            <option></option>
                                            <option value="active" @selected($employee->status == 'active')>Active</option>
                                            <option value="inactive" @selected($employee->status == 'inactive')>Inactive</option>
                                        </x-metronic.select-option>
                                    </div>
                                    <div class="mt-5 col-12 text-end">
                                        <button type="submit" class="submit_btn btn btn-primary">Update
                                            Employee</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-admin-app-layout>
