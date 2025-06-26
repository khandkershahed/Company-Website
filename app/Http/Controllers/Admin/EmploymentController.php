<?php

namespace App\Http\Controllers\Admin;

use Helper;
use App\Models\User;
use App\Models\Employment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use App\Models\Admin\EmployeeCategory;
use App\Models\Admin\EmployeeDepartment;
use Illuminate\Support\Facades\Validator;

class EmploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = User::orderBy('id', 'desc')->get();
        return view('admin.pages.employment.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'employeeCategorys'   => EmployeeCategory::latest('id', 'DESC')->get(),
            'employeeDepartments' => EmployeeDepartment::latest('id', 'DESC')->get(),
            'user'                => User::latest('id', 'DESC')->get(),
        ];
        return view('admin.pages.employment.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageFiles = [
            'sign', 'ceo_sign', 'operation_director_sign', 'managing_director_sign',
        ];

        $filePath = storage_path('app/public/');
        $filePaths = [];

        foreach ($imageFiles as $file) {
            $uploadedFile = $request->file($file);
            $globalFunFile = !empty($uploadedFile) ? Helper::customUpload($uploadedFile, $filePath) : ['status' => 0];
            $filePaths[$file] = $globalFunFile['status'] == 1 ? $uploadedFile->hashName() : null;
        }
         $evaluation_period = EmployeeCategory::where('id',$request->category_id)->value('evaluation_period');
        User::create([
            'employee_id'                                   => $request->employee_id,
            'category_id'                                   => $request->category_id,
            'department_id'                                 => $request->department_id,
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
            'sign_date'                                     => $request->sign_date,
            'police_verification'                           => $request->police_verification,
            'acknowledgement'                               => $request->acknowledgement,

        ] + $filePaths);

        toastr()->success('Data has been saved successfully!');
        return redirect()->back();
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
        $data = [
            'employeeCategory'   => EmployeeCategory::latest('id', 'DESC')->get(),
            'employeeDepartment' => EmployeeDepartment::latest('id', 'DESC')->get(),
            'user'               => User::find($id),
        ];
        return view('admin.pages.employment.edit', $data);
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
        $user = User::findOrFail($id);

        $filePath = storage_path('app/public/');

        $imageFiles = [
            'sign', 'ceo_sign', 'operation_director_sign', 'managing_director_sign',
        ];

        $imagePaths = [];
        foreach ($imageFiles as $file) {
            $uploadedImage = $request->file($file);
            if (!empty($uploadedImage)) {
                $paths = [
                    storage_path("app/public/{$user->$file}"),
                    storage_path("app/public/{$user->$file}")
                ];
                foreach ($paths as $path) {
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }

                $globalFunImage = Helper::customUpload($uploadedImage, $filePath);
                if ($globalFunImage['status'] == 1) {
                    $imagePaths[$file] = $uploadedImage->hashName();
                }
            }
        }

        $fileUpdates = $imagePaths;

        $user->update(array_merge([
            'employee_id'                                   => $request->employee_id,
            'category_id'                                   => $request->category_id,
            'department_id'                                 => $request->department_id,
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
            'sign_date'                                     => $request->sign_date,
            'police_verification'                           => $request->police_verification,
            'acknowledgement'                               => $request->acknowledgement,
        ], $fileUpdates));

        Toastr::success('Data has been updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employment = User::find($id);

        $paths = [
            'storage/',
            'storage/',
        ];

        $files = [
            $employment->sign,
            $employment->ceo_sign,
            $employment->operation_director_sign,
            $employment->managing_director_sign
        ];

        foreach ($files as $file) {
            foreach ($paths as $path) {
                $filePath = public_path($path . $file);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }
        }

        $employment->delete();
    }
}
