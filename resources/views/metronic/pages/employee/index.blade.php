<x-admin-app-layout :title="'All Employees'">
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="d-flex justify-content-between align-items-center">
                {{-- Page Destination/ BreadCrumb --}}
                <div class="page-header-content">
                    <div class="d-flex px-2">
                        <div class="breadcrumb py-2">
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                            <a href="{{ route('admin.hr-and-admin.index') }}" class="breadcrumb-item">Hr and Admin</a>
                            <a href="{{ route('employee.index') }}" class="breadcrumb-item">
                                <span class="breadcrumb-item active">Employees</span>
                            </a>
                        </div>
                        <a href="#breadcrumb_elements"
                            class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                            data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                        </a>
                    </div>
                </div>

                {{-- Inner Page Tab --}}
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
                <!-- Basic tabs -->
            </div>
        </div>
        <!-- page header -->
        <!-- Sales Chain Page -->
        <div class="content p-1 my-3">
            <div class="row nav-tabs border-0" id="myTab" role="tablist">
                <div class="col-lg-10 offset-lg-1 mx-auto">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card rounded-1 border-0 active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                aria-selected="true"
                                style="background: url(https://i.ibb.co/9vY37V3/Asset-4-5x-8.png);background-size: cover; background-position: center; background-repeat: no-repeat;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="m-0 p-0 text-white">Total Employee</p>
                                        <i class="fa-solid fa-user-tie badge-icons"></i>
                                        <h5 class="p-0 m-0 text-white">{{ $employees->count() }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($employeeCategories as $employeeCategory)
                            <div class="col-lg-3">
                                <div class="card rounded-1 border-0"
                                    style="background: url(https://i.ibb.co/jG5kKSf/Asset-5-5x-8.png); background-size: cover; background-position: center; background-repeat: no-repeat;">
                                    <div class="card-body" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile-{{ $employeeCategory->id }}" type="button"
                                        role="tab" aria-controls="profile" aria-selected="false">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="m-0 p-0 text-white">{{ $employeeCategory->name }}</p>
                                            <i class="fa-solid fa-clipboard-check badge-icons"></i>
                                            <h5 class="p-0 m-0 text-white">{{ $employeeCategory->employee->count() }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-10 offset-lg-1 mx-auto">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-lg-12">
                                <h6 class="m-0 p-1 text-center"
                                    style="color: #fff; border-bottom: 1px solid #9042fc;background: #9042fc;">Total
                                    Employee</h6>
                                <div class="card ronded-0">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table employeeDT table-bordered table-hover text-center">
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
                                                    @if ($employees)
                                                        @foreach ($employees as $key => $employee)
                                                            <tr>
                                                                <!-- Serial Number -->
                                                                <td>{{ ++$key }}</td>
                                                                <!-- Employee Image -->
                                                                <td>
                                                                    <img src="{{ !file_exists($employee->photo) ? url('upload/no_image.jpg') : url('upload/admin/' . $employee->photo) }}"
                                                                        alt="" width="40px" height="40px"
                                                                        style="border-radius: 50%">
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
                                                                    <a href="javascript:void(0);" class="text-primary"
                                                                        data-bs-target="#editEmployee{{ $employee->id }}"
                                                                        data-bs-toggle="modal" type="button">
                                                                        <i
                                                                            class="fa-solid fa-pen-to-square dash-icons"></i>
                                                                    </a>
                                                                    <a href="{{ route('employee.destroy', [$employee->id]) }}"
                                                                        class="text-danger delete mx-2">
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
                                    <h6 class="m-0 p-1 text-center"
                                        style="color: #fff; border-bottom: 1px solid #9042fc;background: #9042fc;">
                                        {{ $employeeCategory->name }} Employee</h6>
                                    <div class="card ronded-0">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table employeeDT table-bordered table-hover text-center">
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
                                                                        <img src="{{ !file_exists($employee->photo) ? url('upload/no_image.jpg') : url('upload/admin/' . $employee->photo) }}"
                                                                            alt="" width="40px"
                                                                            height="40px" style="border-radius: 50%">
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
                                                                        <a href="javascript:void(0);"
                                                                            class="text-primary"
                                                                            data-bs-target="#editEmployee{{ $employee->id }}"
                                                                            data-bs-toggle="modal" type="button">
                                                                            <i
                                                                                class="fa-solid fa-pen-to-square dash-icons"></i>
                                                                        </a>
                                                                        <a href="{{ route('employee.destroy', [$employee->id]) }}"
                                                                            class="text-danger delete mx-2">
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
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header text-white px-4 p-2" style="background-color: #247297">
                        <h5 class="modal-title">Add Employee</h5>
                        <a type="button" data-bs-dismiss="modal"> <i class="ph ph-x text-white"
                                style="font-weight: 800;"></i>
                        </a>
                    </div>
                    <div class="modal-body pt-0">
                        <form id="myform" method="post" class="needs-validation"
                            action="{{ route('employee.store') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="container pt-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-1">
                                            <label class="form-label star" for="basicpill-firstname-input ">Full
                                                Name</label>
                                            <input type="text" maxlength="80" class="form-control form-control-sm"
                                                placeholder="Enter Employee Name" name="name"
                                                value="{{ old('name') }}" required />
                                            <div class="invalid-feedback"> Please Enter Full Name.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-1">
                                            <label class="form-label star"
                                                for="basicpill-email-input">Designation</label>
                                            <input maxlength="50" type="text" class="form-control form-control-sm"
                                                placeholder="Enter Employee Designation" name="designation"
                                                value="{{ old('designation') }}" required />
                                            <div class="invalid-feedback"> Please Enter Designation.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="mb-1">
                                            <label class="form-label star" for="basicpill-email-input">Email</label>
                                            <input type="email" class="form-control form-control-sm"
                                                placeholder="Enter Email ID" name="email"
                                                value="{{ old('email') }}" required />
                                            <div class="invalid-feedback"> Please Enter Email Address.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicpill-phoneno-input">Phone</label>
                                            <input maxlength="15" type="text"
                                                class="form-control form-control-sm allow_decimal"
                                                placeholder="Enter Phone Number" name="phone"
                                                value="{{ old('phone') }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-1">
                                            <label class="form-label star" for="basicpill-email-input">Job
                                                Category</label>
                                            <select name="category_id" class="form-control form-select-sm select"
                                                data-container-css-class="select-sm" data-allow-clear="true"
                                                data-minimum-results-for-search="Infinity"
                                                data-placeholder="Choose Employee Category" required>
                                                <option></option>
                                                @foreach ($employeeCategories as $employeeCategory)
                                                    <option value="{{ $employeeCategory->id }}">
                                                        {{ $employeeCategory->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback"> Please Enter Job Category.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-1">
                                            <label class="form-label star" for="basicpill-phoneno-input">Employee Code
                                                (Biometric ID)</label>
                                            <input type="text" class="form-control form-control-sm allow_decimal"
                                                placeholder="Employee Code (Biometric ID)" name="employee_id"
                                                maxlength="15" value="{{ old('employee_id') }}" required />
                                            <div class="invalid-feedback"> Please Enter Employee Code.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicpill-firstname-input">City</label>
                                            <input type="text" maxlength="50" class="form-control form-control-sm"
                                                placeholder="Enter City" name="city"
                                                value="{{ old('city') }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-1">
                                            <label class="form-label start"
                                                for="basicpill-firstname-input">Department</label>
                                            <select name="department[]" class="form-control-sm multiselect btn btn-sm"
                                                id="select6" multiple="multiple"
                                                data-include-select-all-option="true" data-placeholder="Choose Sector"
                                                data-enable-filtering="true" data-allow-clear="true"
                                                data-enable-case-insensitive-filtering="true" required>
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
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-1">
                                            <label class="form-label star"
                                                for="basicpill-firstname-input">Role</label>
                                            <select name="role" class="form-control form-select-sm select"
                                                data-container-css-class="select-sm" data-allow-clear="true"
                                                data-minimum-results-for-search="Infinity"
                                                data-placeholder="Choose Sector" required>
                                                <option></option>
                                                <option value="admin">Admin</option>
                                                <option value="manager">Manager</option>
                                                <option value="others">Others</option>
                                                <option value="developer">Support Developer</option>
                                            </select>
                                            <div class="invalid-feedback"> Please Enter Role.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-1">
                                            <label class="form-label star"
                                                for="basicpill-firstname-input">Supervisor</label>
                                            <select name="supervisor_id" class="form-control form-select-sm select"
                                                data-container-css-class="select-sm" data-allow-clear="true"
                                                data-minimum-results-for-search="Infinity"
                                                data-placeholder="Choose Supervisor" required>
                                                <option></option>
                                                @foreach ($employees as $supervisor)
                                                    <option value="{{ $supervisor->id }}">
                                                        {{ $supervisor->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback"> Please Enter Supervisor.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicpill-firstname-input">Profile
                                                Picture</label>
                                            <input id="image1" type="file" class="form-control form-control-sm"
                                                id="basicpill-firstname-input" name="photo" />
                                            {{-- <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="Admin" style="width:40px; height: 40px;"/> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicpill-firstname-input">Sign</label>
                                            <div class="row"></div>
                                            <input id="image" type="file" class="form-control form-control-sm"
                                                id="basicpill-firstname-input" name="sign" />
                                            {{-- <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="Admin" style="width:40px; height: 40px;"/> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-1">
                                            <label class="form-label star"
                                                for="basicpill-firstname-input">Password</label>
                                            <input type="password" class="form-control form-control-sm"
                                                id="password" name="password">
                                        </div>
                                        <div class="invalid-feedback"> Please Enter Password.</div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-1">
                                            <label class="form-label star" for="basicpill-firstname-input">Confirm
                                                Password</label>
                                            <input type="password" class="form-control form-control-sm"
                                                id="confirm_password" name="confirm_password">
                                            <div id="message"></div>
                                        </div>
                                        <div class="invalid-feedback"> Please Enter Confirm Password.</div>
                                    </div>

                                </div>

                            </div>

                            <div class="modal-footer border-0 pt-1 pb-2 pe-0">
                                <button type="submit" class="submit_btn from-prevent-multiple-submits"
                                    style="padding: 10px;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($employees as $employee)
            <div id="editEmployee{{ $employee->id }}" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header text-white px-4" style="background-color: #247297">
                            <h5 class="modal-title">Edit Employee</h5>
                            <a type="button" data-bs-dismiss="modal"> <i class="ph ph-x text-white"
                                    style="font-weight: 800;"></i>
                            </a>
                        </div>
                        <div class="modal-body pt-0">
                            <form id="myform" method="post"
                                action="{{ route('employee.update', $employee->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="container pt-2">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicpill-firstname-input">Full
                                                    Name</label>
                                                <input type="text" maxlength="80"
                                                    class="form-control form-control-sm"
                                                    placeholder="Enter Employees Name" name="name"
                                                    value="{{ $employee->name }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-1">
                                                <label class="form-label"
                                                    for="basicpill-email-input">Designation</label>
                                                <input maxlength="50" type="text"
                                                    class="form-control form-control-sm"
                                                    placeholder="Enter Employees Designation" name="designation"
                                                    value="{{ $employee->designation }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicpill-email-input">Email</label>
                                                <input type="email" class="form-control form-control-sm"
                                                    placeholder="Enter Email ID" name="email"
                                                    value="{{ $employee->email }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicpill-phoneno-input">Phone</label>
                                                <input maxlength="15" type="text"
                                                    class="form-control form-control-sm allow_decimal"
                                                    placeholder="Enter Phone Number" name="phone"
                                                    value="{{ $employee->phone }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="basicpill-email-input">Job
                                                    Category</label>
                                                <select name="category_id" class="form-control form-select-sm select"
                                                    data-container-css-class="select-sm" data-allow-clear="true"
                                                    data-minimum-results-for-search="Infinity"
                                                    data-placeholder="Choose Employee Category">
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
                                            <div class="mb-1">
                                                <label class="form-label star" for="basicpill-phoneno-input">Employee
                                                    Code
                                                    (Biometric ID)
                                                </label>
                                                <input type="text"
                                                    class="form-control form-control-sm allow_decimal"
                                                    placeholder="Employee Code (Biometric ID)" name="employee_id"
                                                    maxlength="15" value="{{ $employee->employee_id }}" required />
                                            </div>
                                            <div class="invalid-feedback"> Please Enter Employee Code.</div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicpill-firstname-input">City</label>
                                                <input type="text" maxlength="50"
                                                    class="form-control form-control-sm" placeholder="Enter City"
                                                    name="city" value="{{ $employee->city }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-1">
                                                <label class="form-label star"
                                                    for="basicpill-firstname-input">Department</label>

                                                <select name="department[]"
                                                    class="form-control-sm multiselect btn btn-sm" id="select6"
                                                    multiple="multiple" data-include-select-all-option="true"
                                                    data-placeholder="Choose Sector" data-enable-filtering="true"
                                                    data-enable-case-insensitive-filtering="true" required>
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
                                            <div class="mb-1">
                                                <label class="form-label" for="basicpill-firstname-input">Role</label>
                                                <select name="role" class="form-control form-select-sm select"
                                                    data-container-css-class="select-sm"
                                                    data-minimum-results-for-search="Infinity"
                                                    data-placeholder="Choose Sector" required>
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
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label class="form-label required"
                                                    for="basicpill-firstname-input">Supervisor</label>
                                                <select name="supervisor_id"
                                                    class="form-control form-control-sm select" data-control="select2"
                                                    data-placeholder="Select a Supervisor" data-allow-clear="true"
                                                    required>
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
                                        <div class="col-lg-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicpill-firstname-input">Profile
                                                    Picture</label>
                                                <div class="row">
                                                    <div class="col-10">
                                                        <input id="image" type="file"
                                                            class="form-control form-control-sm"
                                                            id="basicpill-firstname-input" name="photo" />
                                                    </div>
                                                    <div class="col-2">
                                                        <img id="showImage"
                                                            src="{{ !file_exists($employee->photo) ? url('upload/no_image.jpg') : url('storage/' . $employee->photo) }}"
                                                            alt="Admin" style="width:40px; height: 40px;" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="basicpill-firstname-input">Sign</label>
                                                <div class="row">
                                                    <div class="col-10">
                                                        <input id="image" type="file"
                                                            class="form-control form-control-sm"
                                                            id="basicpill-firstname-input" name="sign" />
                                                    </div>
                                                    <div class="col-2">
                                                        <img id="showImage"
                                                            src="{{ !file_exists($employee->sign) ? url('upload/no_image.jpg') : url('storage/' . $employee->photo) }}"
                                                            alt="Sign" style="width:40px; height: 40px;" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-1">
                                                <label class="form-label"
                                                    for="basicpill-firstname-input">Password</label>
                                                <input type="password" class="form-control form-control-sm"
                                                    id="password" name="password">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicpill-firstname-input">Confirm
                                                    Password</label>
                                                <input type="password" class="form-control form-control-sm"
                                                    id="confirm_password" name="confirm_password">
                                                <div id="message"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer border-0 pt-3 pb-0 pe-0">
                                    <button type="button" class="submit_close_btn "
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="submit_btn from-prevent-multiple-submits"
                                        style="padding: 10px;">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-admin-app-layout>
