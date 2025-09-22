<?php

namespace App\Http\Controllers\Admin;

use Image;
use Helper;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Country;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\EmployeeAdd as MailEmployeeAdd;
use App\Models\Admin\EmployeeCategory;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['id'] = Auth::user()->id;
        $data = [
            'countries' => Country::orderBy('country_name', 'ASC')->get(),
            'employees' => User::with('employeeStatus')->get(),
            'employeeCategories' => EmployeeCategory::with('employee')->get(['id', 'name']),
        ];
        // return view('admin.pages.employee.all', $data);
        return view('metronic.pages.employee.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $mainFilePhoto                 = $request->file('photo');
        $mainFileSign                  = $request->file('sign');
        $mainFileCeoSign               = $request->file('ceo_sign');
        $mainFileOperationDirectorSign = $request->file('operation_director_sign');
        $mainFileManagingDirectorSign  = $request->file('managing_director_sign');

        $filePathPhoto = storage_path('app/public/employee/photo/');
        $filePathSign = storage_path('app/public/employee/sign/');
        $filePathCeoSign = storage_path('app/public/employee/ceoSign/');
        $filePathOperationDirectorSign = storage_path('app/public/employee/operationDirectorSign/');
        $filePathManagingDirectorSign = storage_path('app/public/employee/managingDirectorSign/');

        if (!empty($mainFilePhoto)) {
            $globalFunPhoto  = Helper::customUpload($mainFilePhoto, $filePathPhoto);
        } else {
            $globalFunPhoto = ['status' => 0];
        }
        if (!empty($mainFileSign)) {
            $globalFunSign  = Helper::customUpload($mainFileSign, $filePathSign);
        } else {
            $globalFunSign = ['status' => 0];
        }
        if (!empty($mainFileCeoSign)) {
            $globalFunCeoSign  = Helper::customUpload($mainFileCeoSign, $filePathCeoSign);
        } else {
            $globalFunCeoSign = ['status' => 0];
        }
        if (!empty($mainFileOperationDirectorSign)) {
            $globalFunOperationDirectorSign  = Helper::customUpload($mainFileOperationDirectorSign, $filePathOperationDirectorSign);
        } else {
            $globalFunOperationDirectorSign = ['status' => 0];
        }
        if (!empty($mainFileManagingDirectorSign)) {
            $globalFunManagingDirectorSign  = Helper::customUpload($mainFileManagingDirectorSign, $filePathManagingDirectorSign);
        } else {
            $globalFunManagingDirectorSign = ['status' => 0];
        }

        User::create([
            'department_id'                                 => $request->department_id,
            'supervisor_id'                                 => $request->supervisor_id,
            'name'                                          => $request->name,
            'username'                                      => $request->username,
            'email'                                         => $request->email,
            'photo'                                         => $globalFunPhoto['status'] == 1 ? $globalFunPhoto['file_name'] : null,
            'phone'                                         => $request->phone,
            'designation'                                   => $request->designation,
            'address'                                       => $request->address,
            'city'                                          => $request->city,
            'postal'                                        => $request->postal,
            'last_seen'                                     => $request->last_seen,
            'role'                                          => $request->role,
            'department'                                    => json_encode($request->department),
            'status'                                        => 'active',
            'password'                                      => Hash::make($request->password),
            'category_id'                                   => $request->category_id,
            'employee_id'                                   => $request->employee_id,
            'mobile'                                        => $request->mobile,
            'total_years_of_job_experience'                 => $request->total_years_of_job_experience,
            'total_years_of_related_experience'             => $request->total_years_of_related_experience,
            'total_years_of_related_education'              => $request->total_years_of_related_education,
            'lowest_job_duration_in_past'                   => $request->lowest_job_duration_in_past,
            'highest_job_duration_in_past'                  => $request->highest_job_duration_in_past,
            'concern_with_social_work'                      => $request->concern_with_social_work,
            'what_turns_you_on_off'                         => $request->what_turns_you_on_off,
            'preference_in_professional_life'               => $request->preference_in_professional_life,
            'action_in_negative_situation'                  => $request->action_in_negative_situation,
            'recent_job_info_one_company_name'              => $request->recent_job_info_one_company_name,
            'recent_job_info_one_address'                   => $request->recent_job_info_one_address,
            'recent_job_info_one_designation'               => $request->recent_job_info_one_designation,
            'recent_job_info_one_contact_no'                => $request->recent_job_info_one_contact_no,
            'recent_job_info_one_duration'                  => $request->recent_job_info_one_duration,
            'recent_job_info_two_company_name'              => $request->recent_job_info_two_company_name,
            'recent_job_info_two_address'                   => $request->recent_job_info_two_address,
            'recent_job_info_two_designation'               => $request->recent_job_info_two_designation,
            'recent_job_info_two_contact_no'                => $request->recent_job_info_two_contact_no,
            'recent_job_info_two_duration'                  => $request->recent_job_info_two_duration,
            'professional_reference_name'                   => $request->professional_reference_name,
            'professional_reference_address'                => $request->professional_reference_address,
            'professional_reference_contact_no_one'         => $request->professional_reference_contact_no_one,
            'professional_reference_contact_no_two'         => $request->professional_reference_contact_no_two,
            'professional_reference_contact_relation'       => $request->professional_reference_contact_relation,
            'relative_reference_name'                       => $request->relative_reference_name,
            'relative_reference_address'                    => $request->relative_reference_address,
            'relative_reference_contact_no_one'             => $request->relative_reference_contact_no_one,
            'relative_reference_contact_no_two'             => $request->relative_reference_contact_no_two,
            'relative_reference_contact_relation'           => $request->relative_reference_contact_relation,
            'highest_degree'                                => $request->highest_degree,
            'passing_year'                                  => $request->passing_year,
            'university'                                    => $request->university,
            'major_subjects'                                => $request->major_subjects,
            'other_training_information_technical_training' => $request->other_training_information_technical_training,
            'technical_training_duration_date'              => $request->technical_training_duration_date,
            'other_training_information_certificate_course' => $request->other_training_information_certificate_course,
            'certificate_course_duration_date'              => $request->certificate_course_duration_date,
            'academic_achievements'                         => $request->academic_achievements,
            'professional_achievements'                     => $request->professional_achievements,
            'social_achievements'                           => $request->social_achievements,
            'personal_achievements'                         => $request->personal_achievements,
            'permanent_address'                             => $request->permanent_address,
            'permanent_address_city'                        => $request->permanent_address_city,
            'permanent_address_state'                       => $request->permanent_address_state,
            'permanent_address_zip_code'                    => $request->permanent_address_zip_code,
            'current_address'                               => $request->current_address,
            'current_address_city'                          => $request->current_address_city,
            'current_address_state'                         => $request->current_address_state,
            'current_address_zip_code'                      => $request->current_address_zip_code,
            'alternate_email'                               => $request->alternate_email,
            'home_phone'                                    => $request->home_phone,
            'emergency_number'                              => $request->emergency_number,
            'nid_bri_ppn'                                   => $request->nid_bri_ppn,
            'birth_date'                                    => $request->birth_date,
            'marital_status'                                => $request->marital_status,
            'spouse_name'                                   => $request->spouse_name,
            'spouse_employer'                               => $request->spouse_employer,
            'spouse_work_phone'                             => $request->spouse_work_phone,
            'emergency_contact_information_name'            => $request->emergency_contact_information_name,
            'emergency_contact_information_address'         => $request->emergency_contact_information_address,
            'emergency_contact_information_city'            => $request->emergency_contact_information_city,
            'emergency_contact_information_zip_code'        => $request->emergency_contact_information_zip_code,
            'emergency_contact_information_phone'           => $request->emergency_contact_information_phone,
            'emergency_contact_information_relationsip'     => $request->emergency_contact_information_relationsip,
            'father_name'                                   => $request->father_name,
            'mother_name'                                   => $request->mother_name,
            'father_service'                                => $request->father_service,
            'mother_service'                                => $request->mother_service,
            'brothers_total'                                => $request->brothers_total,
            'sisters_total'                                 => $request->sisters_total,
            'siblings_contact_info_one'                     => $request->siblings_contact_info_one,
            'siblings_contact_info_two'                     => $request->siblings_contact_info_two,
            'sign'                                          => $globalFunSign['status'] == 1 ? $globalFunSign['file_name'] : null,
            'ceo_sign'                                      => $globalFunCeoSign['status'] == 1 ? $globalFunCeoSign['file_name'] : null,
            'operation_director_sign'                       => $globalFunOperationDirectorSign['status'] == 1 ? $globalFunOperationDirectorSign['file_name'] : null,
            'managing_director_sign'                        => $globalFunManagingDirectorSign['status'] == 1 ? $globalFunManagingDirectorSign['file_name'] : null,
            'sign_date'                                     => $request->sign_date,
            'evaluation_date'                               => $request->evaluation_date,
            'casual_leave_due_as_on'                        => $request->casual_leave_due_as_on,
            'casual_leave_availed'                          => $request->casual_leave_availed,
            'casual_balance_due'                            => $request->casual_balance_due,
            'earned_leave_due_as_on'                        => $request->earned_leave_due_as_on,
            'earned_leave_availed'                          => $request->earned_leave_availed,
            'earned_balance_due'                            => $request->earned_balance_due,
            'medical_leave_due_as_on'                       => $request->medical_leave_due_as_on,
            'medical_leave_availed'                         => $request->medical_leave_availed,
            'medical_balance_due'                           => $request->medical_balance_due,
            'police_verification'                           => $request->police_verification,
            'acknowledgement'                               => $request->acknowledgement,

        ]);
        Toastr::success('Data has been saved successfully!');
        return redirect()->back()->with('success', 'Data has been saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $admins = User::findOrFail($id);

        $mainFilePhoto                 = $request->file('photo');
        $mainFileSign                  = $request->file('sign');
        $mainFileCeoSign               = $request->file('ceo_sign');
        $mainFileOperationDirectorSign = $request->file('operation_director_sign');
        $mainFileManagingDirectorSign  = $request->file('managing_director_sign');

        $filePathPhoto = storage_path('app/public/employee/photo/');
        $filePathSign = storage_path('app/public/employee/sign/');
        $filePathCeoSign = storage_path('app/public/employee/ceoSign/');
        $filePathOperationDirectorSign = storage_path('app/public/employee/operationDirectorSign/');
        $filePathManagingDirectorSign = storage_path('app/public/employee/managingDirectorSign/');

        if (!empty($mainFilePhoto)) {
            $globalFunPhoto  = Helper::customUpload($mainFilePhoto, $filePathPhoto);
            $paths = [
                storage_path("app/public/employee/photo/{$admins->photo}"),
            ];
            foreach ($paths as $path) {
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        } else {
            $globalFunPhoto = ['status' => 0];
        }
        if (!empty($mainFileSign)) {
            $globalFunSign  = Helper::customUpload($mainFileSign, $filePathSign);
            $paths = [
                storage_path("app/public/employee/sign/{$admins->sign}"),
            ];
            foreach ($paths as $path) {
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        } else {
            $globalFunSign = ['status' => 0];
        }
        if (!empty($mainFileCeoSign)) {
            $globalFunCeoSign  = Helper::customUpload($mainFileCeoSign, $filePathCeoSign);
            $paths = [
                storage_path("app/public/employee/ceoSign/{$admins->ceo_sign}"),
            ];
            foreach ($paths as $path) {
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        } else {
            $globalFunCeoSign = ['status' => 0];
        }
        if (!empty($mainFileOperationDirectorSign)) {
            $globalFunOperationDirectorSign  = Helper::customUpload($mainFileOperationDirectorSign, $filePathOperationDirectorSign);
            $paths = [
                storage_path("app/public/employee/operationDirectorSign/{$admins->operation_director_sign}"),
            ];
            foreach ($paths as $path) {
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        } else {
            $globalFunOperationDirectorSign = ['status' => 0];
        }
        if (!empty($mainFileManagingDirectorSign)) {
            $globalFunManagingDirectorSign  = Helper::customUpload($mainFileManagingDirectorSign, $filePathManagingDirectorSign);
            $paths = [
                storage_path("app/public/employee/managingDirectorSign/{$admins->managing_director_sign}"),
            ];
            foreach ($paths as $path) {
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        } else {
            $globalFunManagingDirectorSign = ['status' => 0];
        }

        $admins->update([
            'department_id'                                 => $request->department_id,
            'supervisor_id'                                 => $request->supervisor_id,
            'name'                                          => $request->name,
            'username'                                      => $request->username,
            'email'                                         => $request->email,
            'photo'                                         => $globalFunPhoto['status'] == 1 ? $globalFunPhoto['file_name'] : $admins->photo,
            'phone'                                         => $request->phone,
            'designation'                                   => $request->designation,
            'address'                                       => $request->address,
            'city'                                          => $request->city,
            'postal'                                        => $request->postal,
            'last_seen'                                     => $request->last_seen,
            'role'                                          => $request->role,
            'department'                                    => json_encode($request->department),
            'status'                                        => 'active',
            'password'                                      => (!empty($request->password) ? Hash::make($request->password) : $admins->password),
            'category_id'                                   => $request->category_id,
            'employee_id'                                   => $request->employee_id,
            'mobile'                                        => $request->mobile,
            'total_years_of_job_experience'                 => $request->total_years_of_job_experience,
            'total_years_of_related_experience'             => $request->total_years_of_related_experience,
            'total_years_of_related_education'              => $request->total_years_of_related_education,
            'lowest_job_duration_in_past'                   => $request->lowest_job_duration_in_past,
            'highest_job_duration_in_past'                  => $request->highest_job_duration_in_past,
            'concern_with_social_work'                      => $request->concern_with_social_work,
            'what_turns_you_on_off'                         => $request->what_turns_you_on_off,
            'preference_in_professional_life'               => $request->preference_in_professional_life,
            'action_in_negative_situation'                  => $request->action_in_negative_situation,
            'recent_job_info_one_company_name'              => $request->recent_job_info_one_company_name,
            'recent_job_info_one_address'                   => $request->recent_job_info_one_address,
            'recent_job_info_one_designation'               => $request->recent_job_info_one_designation,
            'recent_job_info_one_contact_no'                => $request->recent_job_info_one_contact_no,
            'recent_job_info_one_duration'                  => $request->recent_job_info_one_duration,
            'recent_job_info_two_company_name'              => $request->recent_job_info_two_company_name,
            'recent_job_info_two_address'                   => $request->recent_job_info_two_address,
            'recent_job_info_two_designation'               => $request->recent_job_info_two_designation,
            'recent_job_info_two_contact_no'                => $request->recent_job_info_two_contact_no,
            'recent_job_info_two_duration'                  => $request->recent_job_info_two_duration,
            'professional_reference_name'                   => $request->professional_reference_name,
            'professional_reference_address'                => $request->professional_reference_address,
            'professional_reference_contact_no_one'         => $request->professional_reference_contact_no_one,
            'professional_reference_contact_no_two'         => $request->professional_reference_contact_no_two,
            'professional_reference_contact_relation'       => $request->professional_reference_contact_relation,
            'relative_reference_name'                       => $request->relative_reference_name,
            'relative_reference_address'                    => $request->relative_reference_address,
            'relative_reference_contact_no_one'             => $request->relative_reference_contact_no_one,
            'relative_reference_contact_no_two'             => $request->relative_reference_contact_no_two,
            'relative_reference_contact_relation'           => $request->relative_reference_contact_relation,
            'highest_degree'                                => $request->highest_degree,
            'passing_year'                                  => $request->passing_year,
            'university'                                    => $request->university,
            'major_subjects'                                => $request->major_subjects,
            'other_training_information_technical_training' => $request->other_training_information_technical_training,
            'technical_training_duration_date'              => $request->technical_training_duration_date,
            'other_training_information_certificate_course' => $request->other_training_information_certificate_course,
            'certificate_course_duration_date'              => $request->certificate_course_duration_date,
            'academic_achievements'                         => $request->academic_achievements,
            'professional_achievements'                     => $request->professional_achievements,
            'social_achievements'                           => $request->social_achievements,
            'personal_achievements'                         => $request->personal_achievements,
            'permanent_address'                             => $request->permanent_address,
            'permanent_address_city'                        => $request->permanent_address_city,
            'permanent_address_state'                       => $request->permanent_address_state,
            'permanent_address_zip_code'                    => $request->permanent_address_zip_code,
            'current_address'                               => $request->current_address,
            'current_address_city'                          => $request->current_address_city,
            'current_address_state'                         => $request->current_address_state,
            'current_address_zip_code'                      => $request->current_address_zip_code,
            'alternate_email'                               => $request->alternate_email,
            'home_phone'                                    => $request->home_phone,
            'emergency_number'                              => $request->emergency_number,
            'nid_bri_ppn'                                   => $request->nid_bri_ppn,
            'birth_date'                                    => $request->birth_date,
            'marital_status'                                => $request->marital_status,
            'spouse_name'                                   => $request->spouse_name,
            'spouse_employer'                               => $request->spouse_employer,
            'spouse_work_phone'                             => $request->spouse_work_phone,
            'emergency_contact_information_name'            => $request->emergency_contact_information_name,
            'emergency_contact_information_address'         => $request->emergency_contact_information_address,
            'emergency_contact_information_city'            => $request->emergency_contact_information_city,
            'emergency_contact_information_zip_code'        => $request->emergency_contact_information_zip_code,
            'emergency_contact_information_phone'           => $request->emergency_contact_information_phone,
            'emergency_contact_information_relationsip'     => $request->emergency_contact_information_relationsip,
            'father_name'                                   => $request->father_name,
            'mother_name'                                   => $request->mother_name,
            'father_service'                                => $request->father_service,
            'mother_service'                                => $request->mother_service,
            'brothers_total'                                => $request->brothers_total,
            'sisters_total'                                 => $request->sisters_total,
            'siblings_contact_info_one'                     => $request->siblings_contact_info_one,
            'siblings_contact_info_two'                     => $request->siblings_contact_info_two,
            'sign'                                          => $globalFunSign['status'] == 1 ? $globalFunSign['file_name'] : $admins->sign,
            'ceo_sign'                                      => $globalFunCeoSign['status'] == 1 ? $globalFunCeoSign['file_name'] : $admins->ceo_sign,
            'operation_director_sign'                       => $globalFunOperationDirectorSign['status'] == 1 ? $globalFunOperationDirectorSign['file_name'] : $admins->operation_director_sign,
            'managing_director_sign'                        => $globalFunManagingDirectorSign['status'] == 1 ? $globalFunManagingDirectorSign['file_name'] : $admins->managing_director_sign,
            'sign_date'                                     => $request->sign_date,
            'evaluation_date'                               => $request->evaluation_date,
            'casual_leave_due_as_on'                        => $request->casual_leave_due_as_on,
            'casual_leave_availed'                          => $request->casual_leave_availed,
            'casual_balance_due'                            => $request->casual_balance_due,
            'earned_leave_due_as_on'                        => $request->earned_leave_due_as_on,
            'earned_leave_availed'                          => $request->earned_leave_availed,
            'earned_balance_due'                            => $request->earned_balance_due,
            'medical_leave_due_as_on'                       => $request->medical_leave_due_as_on,
            'medical_leave_availed'                         => $request->medical_leave_availed,
            'medical_balance_due'                           => $request->medical_balance_due,
            'police_verification'                           => $request->police_verification,
            'acknowledgement'                               => $request->acknowledgement,

        ]);
        Toastr::success('Data has been updated successfully!');
        return redirect()->back()->with('success', 'Data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $user = User::findOrFail($id);
    //     $destination = 'upload/Profile/Admin/' . $user->photo;
    //     if (File::exists($destination)) {
    //         File::delete($destination);
    //     }
    //     if (!is_null($user)) {
    //         $user->delete();
    //     }
    //     $user->delete();
    // }
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Nullify the employee_id in related leave applications
        $user->leaveApplications()->update(['employee_id' => null]);

        // Delete the user's photo if it exists
        $destination = 'upload/Profile/Admin/' . $user->photo;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        // Delete the user
        $user->delete();
    }
}
