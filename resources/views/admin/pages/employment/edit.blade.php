@extends('admin.master')
@section('content')
    <style>
        .nav-tabs .nav-link.active {
            color: white !important;
        }

        .nav-tabs .nav-link:hover {
            color: white !important;
        }
    </style>
    <div class="content-wrapper">
        <section class="shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                {{-- Page Destination/ BreadCrumb --}}
                <div class="page-header-content d-lg-flex ">
                    <div class="d-flex px-2">
                        <div class="breadcrumb py-2">
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                            <a href="{{ route('admin.site-setting.index') }}" class="breadcrumb-item">Employeement</a>
                            <a href="{{ route('admin.site-setting.index') }}" class="breadcrumb-item">Add</a>
                        </div>
                        <a href="#breadcrumb_elements"
                            class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                            data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <div class="content container">
            <div class="row">
                <div class="col-lg-12">
                    <!--Employeement Form with validation -->
                    <div class="card">
                        <div class="card-header rounded-0 bg-secondary p-0 m-0 d-flex justify-content-between">
                            <a href="{{ route('employeement.index') }}" type="button"
                                class="text-white btn btn-sm btn-info custom_btn btn-labeled btn-labeled-start float-start">
                                <span class="btn-labeled-icon bg-black bg-opacity-20">
                                    <i class="icon-arrow-left13"></i>
                                </span>
                                Back
                            </a>
                            <h6 class="text-white p-0 mb-0 text-start me-2">Employement Add</h6>
                        </div>


                        <form action="{{ route('employeement.store') }}" method="post"
                            class=" pt-2 wizard-form steps-validation">
                            @csrf
                            <h6>Personal Information</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row offset-lg-2">
                                            <div class="col-lg-4 pt-1">
                                                <div class="mb-1">
                                                    <label class="p-0 text-start text-black">Job Category Name</label>
                                                    <select name="category_id" class="form-select w-100 select-wizard"
                                                        data-placeholder="Select Category Name...">
                                                        <option></option> <!-- Blank option for placeholder -->
                                                        @foreach ($employeeCategorys as $employeeCategory)
                                                            <option @selected($user->category_id == $employeeCategory->id)
                                                                value="{{ $employeeCategory->id }}">
                                                                {{ $employeeCategory->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 pt-1">
                                                <div class="mb-1">
                                                    <label class="p-0 text-start text-black">Depertment Name</label>
                                                    <select name="department_id" class="form-select w-100 select-wizard"
                                                        data-placeholder="Select Depertment Name...">
                                                        <option></option> <!-- Blank option for placeholder -->
                                                        @foreach ($employeeDepartments as $employeeDepartment)
                                                            <option @selected($user->department_id == $employeeDepartment->id)
                                                                value="{{ $employeeDepartment->id }}">
                                                                {{ $employeeDepartment->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Designation <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-sm" maxlength="100"
                                                name="designation" value="{{ $user->designation }}"
                                                placeholder="Enter Designation" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Status</label>
                                            <select name="status" class="form-select w-100 select-wizard"
                                                data-minimum-results-for-search="Infinity"
                                                data-placeholder="Select status...">
                                                <option></option>
                                                <option @selected($user->status == 'active') value="active">Active</option>
                                                <option @selected($user->status == 'inactive') value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Mobile <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control form-control-sm" maxlength="20"
                                                name="mobile" value="{{ $user->mobile }}" placeholder="Enter Mobile"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Home Phone </label>
                                            <input type="text" name="home_phone" value="{{ $user->home_phone }}"
                                                class="form-control form-control-sm" placeholder="Enter Home Phone ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Emergency Number <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="emergency_number"
                                                value="{{ $user->emergency_number }}" class="form-control form-control-sm"
                                                placeholder="Enter Emergency Number " required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Permanent Address City <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="permanent_address_city"
                                                value="{{ $user->permanent_address_city }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Permanent Address City" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Permanent Address State </label>
                                            <input type="text" name="permanent_address_state"
                                                value="{{ $user->permanent_address_state }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Permanent Address State ">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Permanent Address Zip Code <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="permanent_address_zip_code"
                                                value="{{ $user->permanent_address_zip_code }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Permanent Address Zip Code " required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Permanent Address <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="permanent_address" class="form-control form-control-sm" placeholder="Enter Permanent Address"
                                                id="" cols="30" rows="10" required>{{ $user->permanent_address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Current Address City <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="current_address_city"
                                                value="{{ $user->current_address_city }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Current Address City " required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Current Address State</label>
                                            <input type="text" name="current_address_state"
                                                value="{{ $user->current_address_state }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Current Address State">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Current Address Zip Code <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="current_address_zip_code"
                                                value="{{ $user->current_address_zip_code }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Current Address Zip Code " required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Current Address <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="current_address" class="form-control form-control-sm" placeholder="Enter Current Address "
                                                id="" cols="30" rows="10" required>{{ $user->current_address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Alternate Email </label>
                                            <input type="email" name="alternate_email"
                                                value="{{ $user->alternate_email }}" class="form-control form-control-sm"
                                                placeholder="Enter Alternate Email ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Nid/Bri/Ppn <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="nid_bri_ppn" value="{{ $user->nid_bri_ppn }}"
                                                class="form-control form-control-sm" placeholder="Enter Nid Bri Ppn"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Birth Date <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="birth_date" value="{{ $user->birth_date }}"
                                                class="form-control form-control-sm" placeholder="Enter Birth Date"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Marital Status</label>
                                            <select name="marital_status" class="form-select w-100 select-wizard"
                                                data-minimum-results-for-search="Infinity"
                                                data-placeholder="Select Marital Status...">
                                                <option></option>
                                                <option @selected($user->marital_status == 'single') value="single">Single</option>
                                                <option @selected($user->marital_status == 'married') value="married">Married</option>
                                                <option @selected($user->marital_status == 'divorced') value="divorced">Divorced</option>
                                                <option @selected($user->marital_status == 'widowed') value="widowed">Widowed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Spouse Name </label>
                                            <input type="text" name="spouse_name" value="{{ $user->spouse_name }}"
                                                class="form-control form-control-sm" placeholder="Enter Spouse Name ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Spouse Employer </label>
                                            <input type="text" name="spouse_employer"
                                                value="{{ $user->spouse_employer }}" class="form-control form-control-sm"
                                                placeholder="Enter Spouse Employer ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Spouse Work Phone </label>
                                            <input type="text" name="spouse_work_phone"
                                                value="{{ $user->spouse_work_phone }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Spouse Work Phone ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Lower Job Duration In Past</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="lowest_job_duration_in_past"
                                                value="{{ $user->lowest_job_duration_in_past }}" id=""
                                                placeholder="Enter Lower Job Duration In Past">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Higest Job Duration In Past</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="highest_job_duration_in_past"
                                                value="{{ $user->highest_job_duration_in_past }}" id=""
                                                placeholder="Enter Higest Job Duration In Past">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Concern With Social Work</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="concern_with_social_work"
                                                value="{{ $user->concern_with_social_work }}" id=""
                                                placeholder="Enter Concern With Social Work">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">What Turns You On Off</label>
                                            <textarea name="what_turns_you_on_off" class="form-control form-control-sm" placeholder="Enter What Turns You On Off"
                                                id="" cols="30" rows="10">{{ $user->what_turns_you_on_off }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Preference In Professional
                                                Life</label>
                                            <textarea name="preference_in_professional_life" class="form-control form-control-sm"
                                                placeholder="Enter Preference In Professional Life" id="" cols="30" rows="10">{{ $user->preference_in_professional_life }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Action In Negative Situation</label>
                                            <textarea name="action_in_negative_situation" class="form-control form-control-sm"
                                                placeholder="Enter Action In Negative Situation" id="" cols="30" rows="10">{{ $user->action_in_negative_situation }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Total Years Of Job Experience</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="total_years_of_job_experience"
                                                value="{{ $user->total_years_of_job_experience }}" id=""
                                                maxlength="2" max="2" min="1"
                                                placeholder="Enter Total Years Of Job Experience">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Total Years Of Releted
                                                Experience</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="total_years_of_related_experience"
                                                value="{{ $user->total_years_of_related_experience }}" id=""
                                                placeholder="Enter Total Years Of Releted Experience">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Total Years Of Releted
                                                Education</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="total_years_of_related_education"
                                                value="{{ $user->total_years_of_related_education }}" id=""
                                                placeholder="Enter Total Years Of Releted Education">
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                            <h6>Previous Job & Academic Info</h6>
                            <fieldset>
                                <div class="row border">
                                    <div class="col-lg-4 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Recent Job Info One Company
                                                Name</label>
                                            <input name="recent_job_info_one_company_name"
                                                value="{{ $user->recent_job_info_one_company_name }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Recent Job Info One Company Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Recent Job Info One
                                                Designation</label>
                                            <input name="recent_job_info_one_designation"
                                                value="{{ $user->recent_job_info_one_designation }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Recent Job Info One Designation">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Recent Job Info One Contact
                                                Number</label>
                                            <input name="recent_job_info_one_contact_no"
                                                value="{{ $user->recent_job_info_one_contact_no }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Recent Job Info One Contact Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Recent Job Info One Duration</label>
                                            <input name="recent_job_info_one_duration"
                                                value="{{ $user->recent_job_info_one_duration }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Recent Job Info Duration">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Recent Job Info One Address</label>
                                            <textarea name="recent_job_info_one_address" class="form-control form-control-sm"
                                                placeholder="Enter Recent Job Info One Address" id="" cols="30" rows="10">{{ $user->recent_job_info_one_address }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row border mt-1">
                                    <div class="col-lg-4 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Recent Job Info Two Company
                                                Name</label>
                                            <input name="recent_job_info_two_company_name"
                                                value="{{ $user->recent_job_info_two_company_name }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Recent Job Info Two Company Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Recent Job Info Two
                                                Designation</label>
                                            <input name="recent_job_info_two_designation"
                                                value="{{ $user->recent_job_info_two_designation }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Recent Job Info Two Designation">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Recent Job Info Two Contact
                                                Number</label>
                                            <input name="recent_job_info_two_contact_no"
                                                value="{{ $user->recent_job_info_two_contact_no }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Recent Job Info Two Contact Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Recent Job Info Two Duration</label>
                                            <input name="recent_job_info_two_duration"
                                                value="{{ $user->recent_job_info_two_duration }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Recent Job Info Duration">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Recent Job Info Two Address</label>
                                            <textarea name="recent_job_info_two_address" class="form-control form-control-sm"
                                                placeholder="Enter Recent Job Info Two Address" id="" cols="30" rows="10">{{ $user->recent_job_info_two_address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row border mt-1">
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Highest Degree <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="highest_degree" value="{{ $user->highest_degree }}" id=""
                                                placeholder="Enter Highest Degree" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Passing Year <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="passing_year" value="{{ $user->passing_year }}" id=""
                                                placeholder="Enter Passing Year" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">University <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="university" value="{{ $user->university }}"
                                                class="form-control form-control-sm" placeholder="Enter University "
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Major Subjects <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="major_subjects"
                                                value="{{ $user->major_subjects }}" class="form-control form-control-sm"
                                                placeholder="Enter Major Subjects " required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Other Training Information
                                                Technical</label>
                                            <textarea name="other_training_information_technical_training" class="form-control form-control-sm"
                                                placeholder="Enter Other Training Information Technical" id="" cols="30" rows="10">{{ $user->other_training_information_technical_training }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Technical Training Duration Date
                                            </label>
                                            <input type="text" name="technical_training_duration_date"
                                                value="{{ $user->technical_training_duration_date }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Technical Training Duration Date ">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Other Training Information
                                                Certificate</label>
                                            <textarea name="other_training_information_certificate_course" class="form-control form-control-sm"
                                                placeholder="Enter Other Training Information Certificate" id="" cols="30" rows="10">{{ $user->other_training_information_certificate_course }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Certificate Course Duration Date
                                            </label>
                                            <input type="text" name="certificate_course_duration_date"
                                                value="{{ $user->certificate_course_duration_date }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Certificate Course Duration Date ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Academic Achievements </label>
                                            <textarea name="academic_achievements" class="form-control form-control-sm"
                                                placeholder="Enter Academic Achievements " id="" cols="30" rows="10">{{ $user->academic_achievements }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Professional Achievements </label>
                                            <textarea name="professional_achievements" class="form-control form-control-sm"
                                                placeholder="Enter Professional Achievements " id="" cols="30" rows="10">{{ $user->professional_achievements }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Social Achievements </label>
                                            <textarea name="social_achievements" class="form-control form-control-sm" placeholder="Enter Social Achievements "
                                                id="" cols="30" rows="10">{{ $user->social_achievements }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Personal Achievements </label>
                                            <textarea name="personal_achievements" class="form-control form-control-sm"
                                                placeholder="Enter Personal Achievements " id="" cols="30" rows="10">{{ $user->personal_achievements }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Professional Reference Name</label>
                                            <input type="text" name="professional_reference_name"
                                                value="{{ $user->professional_reference_name }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Professional Reference Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Professional Reference Address</label>
                                            <textarea name="professional_reference_address" class="form-control form-control-sm"
                                                placeholder="Enter Professional Reference Address" id="" cols="30" rows="10">{{ $user->professional_reference_address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Professional Reference Contact Number
                                                One</label>
                                            <input type="text" name="professional_reference_contact_no_one"
                                                value="{{ $user->professional_reference_contact_no_one }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Professional Reference Contact Number One">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Professional Reference Contact Number
                                                Two</label>
                                            <input type="text" name="professional_reference_contact_no_two"
                                                value="{{ $user->professional_reference_contact_no_two }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Professional Reference Contact Number Two">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Professional Reference Contact
                                                Relation</label>
                                            <input type="text" name="professional_reference_contact_relation"
                                                value="{{ $user->professional_reference_contact_relation }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Professional Reference Contact Relation">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Relative Reference Name</label>
                                            <input type="text" name="relative_reference_name"
                                                value="{{ $user->relative_reference_name }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Relative Reference Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Replative Reference
                                                Address</label>
                                            <textarea name="relative_reference_address" class="form-control form-control-sm"
                                                placeholder="Enter Replative Reference Address" id="" cols="30" rows="10">{{ $user->relative_reference_address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Relative Reference Contact
                                                Relation</label>
                                            <input type="text" name="relative_reference_contact_relation"
                                                value="{{ $user->relative_reference_contact_relation }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Relative Reference Contact Relation">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Relative Reference Contact No
                                                One</label>
                                            <input type="text" name="relative_reference_contact_no_one"
                                                value="{{ $user->relative_reference_contact_no_one }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Relative Reference Contact No One">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Relative Reference Contact No
                                                Two</label>
                                            <input type="text" name="relative_reference_contact_no_two"
                                                value="{{ $user->relative_reference_contact_no_two }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Relative Reference Contact No Two">
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                            <h6>Family & Emergency Contact Info</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Name
                                            </label>
                                            <input type="text" name="emergency_contact_information_name"
                                                value="{{ $user->emergency_contact_information_name }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Emergency Contact Information Name ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black"> Address
                                            </label>
                                            <textarea name="emergency_contact_information_address" class="form-control form-control-sm"
                                                placeholder="Enter Emergency Contact Information Address " id="" cols="30" rows="10">{{ $user->emergency_contact_information_address }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">City
                                            </label>
                                            <input type="text" name="emergency_contact_information_city"
                                                value="{{ $user->emergency_contact_information_city }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Emergency Contact Information City ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Zip
                                                Code </label>
                                            <input type="text" name="emergency_contact_information_zip_code"
                                                value="{{ $user->emergency_contact_information_zip_code }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Emergency Contact Information Zip Code ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">
                                                Phone </label>
                                            <input type="text" name="emergency_contact_information_phone"
                                                value="{{ $user->emergency_contact_information_phone }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Emergency Contact Information Phone ">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">
                                                Relationsip </label>
                                            <input type="text" name="emergency_contact_information_relationsip"
                                                value="{{ $user->emergency_contact_information_relationsip }}"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Emergency Contact Information Relationsip ">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Father Name </label>
                                            <input type="text" name="father_name" value="{{ $user->father_name }}"
                                                class="form-control form-control-sm" placeholder="Enter Father Name ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Father's Service </label>
                                            <input type="text" name="father_service"
                                                value="{{ $user->father_service }}" class="form-control form-control-sm"
                                                placeholder="Enter Father Service ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Mother Name </label>
                                            <input type="text" name="mother_name" value="{{ $user->mother_name }}"
                                                class="form-control form-control-sm" placeholder="Enter Mother Name ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Mother's Service </label>
                                            <input type="text" name="mother_service"
                                                value="{{ $user->mother_service }}" class="form-control form-control-sm"
                                                placeholder="Enter Mother Service ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Total Brother's</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="brothers_total" value="{{ $user->brothers_total }}" id=""
                                                placeholder="Enter Brothers Total">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Total Sister's</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="sisters_total" value="{{ $user->sisters_total }}" id=""
                                                placeholder="Enter Total Sister's">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Siblings Contact Info One </label>
                                            <textarea name="siblings_contact_info_one" class="form-control form-control-sm"
                                                placeholder="Enter Siblings Contact Info One " id="" cols="30" rows="10">{{ $user->siblings_contact_info_one }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Siblings Contact Info Two </label>
                                            <textarea name="siblings_contact_info_two" class="form-control form-control-sm"
                                                placeholder="Enter Siblings Contact Info Two " id="" cols="30" rows="10">{{ $user->siblings_contact_info_two }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <h6>Acknowledge/Sign</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p> I declare, all the information above is correct. I also aware, if there is any
                                            misinformation, late authority may take any steps against
                                            this. Moreover, I am bound to share the information that may need for any
                                            security purpose from this company at any time. </p>
                                        <p>Your Sincearly,</p>
                                    </div>
                                </div>
                                <div class="row border">
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Sign </label>
                                            <input type="file" name="sign" class="form-control form-control-sm"
                                                placeholder="Enter Sign ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Ceo Sign </label>
                                            <input type="file" name="ceo_sign" class="form-control form-control-sm"
                                                placeholder="Enter Ceo Sign ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Operation Director Sign </label>
                                            <input type="file" name="operation_director_sign"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Operation Director Sign ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Managing Director Sign </label>
                                            <input type="file" name="managing_director_sign"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Managing Director Sign ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Sign Date</label>
                                            <input type="date" name="sign_date" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Police Verification</label>
                                            <select name="police_verification" class="form-select w-100 select-wizard"
                                                data-minimum-results-for-search="Infinity"
                                                data-placeholder="Select Police Verification Status...">
                                                <option></option>
                                                <option @selected($user->police_verification == 'verified') value="verified">Verified</option>
                                                <option @selected($user->police_verification == 'unverified') value="unverified">Unverified</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pt-1">
                                        <div class="mb-1">
                                            <label class="p-0 text-start text-black">Acknowledgement</label>
                                            <select name="acknowledgement" class="form-select w-100 select-wizard"
                                                data-minimum-results-for-search="Infinity"
                                                data-placeholder="Select Acknowledgement Status...">
                                                <option></option>
                                                <option @selected($user->acknowledgement == 'acknowledged') value="acknowledged">Acknowledged
                                                </option>
                                                <option @selected($user->acknowledgement == 'unacknowledged') value="unacknowledged">Unacknowledged
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" id="custom-submit" type="submit">Submit</button>
                            </fieldset>

                        </form>
                    </div>
                    <!-- Employeement Form with validation -->
                </div>
            </div>
        </div>
    </div>
@endsection
