<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->string('employee_id')->unique()->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('total_years_of_job_experience')->nullable();
            $table->string('total_years_of_related_experience')->nullable();
            $table->string('total_years_of_related_education')->nullable();
            $table->string('lowest_job_duration_in_past', 50)->nullable();
            $table->string('highest_job_duration_in_past', 50)->nullable();
            $table->string('concern_with_social_work', 50)->nullable();
            $table->text('what_turns_you_on_off')->nullable();
            $table->text('preference_in_professional_life')->nullable();
            $table->text('action_in_negative_situation')->nullable();
            $table->string('recent_job_info_one_company_name')->nullable();
            $table->text('recent_job_info_one_address')->nullable();
            $table->string('recent_job_info_one_designation')->nullable();
            $table->string('recent_job_info_one_contact_no')->nullable();
            $table->string('recent_job_info_one_duration')->nullable();
            $table->string('recent_job_info_two_company_name')->nullable();
            $table->text('recent_job_info_two_address')->nullable();
            $table->string('recent_job_info_two_designation')->nullable();
            $table->string('recent_job_info_two_contact_no')->nullable();
            $table->string('recent_job_info_two_duration')->nullable();
            $table->string('professional_reference_name')->nullable();
            $table->text('professional_reference_address')->nullable();
            $table->string('professional_reference_contact_no_one')->nullable();
            $table->string('professional_reference_contact_no_two')->nullable();
            $table->string('professional_reference_contact_relation')->nullable();
            $table->string('relative_reference_name')->nullable();
            $table->text('relative_reference_address')->nullable();
            $table->string('relative_reference_contact_no_one')->nullable();
            $table->string('relative_reference_contact_no_two')->nullable();
            $table->string('relative_reference_contact_relation')->nullable();
            $table->string('highest_degree', 50)->nullable();
            $table->year('passing_year')->nullable();
            $table->string('university', 100)->nullable();
            $table->string('major_subjects', 100)->nullable();
            $table->text('other_training_information_technical_training')->nullable();
            $table->string('technical_training_duration_date')->nullable();
            $table->text('other_training_information_certificate_course')->nullable();
            $table->string('certificate_course_duration_date')->nullable();
            $table->text('academic_achievements')->nullable();
            $table->text('professional_achievements')->nullable();
            $table->text('social_achievements')->nullable();
            $table->text('personal_achievements')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('permanent_address_city')->nullable();
            $table->string('permanent_address_state')->nullable();
            $table->string('permanent_address_zip_code')->nullable();
            $table->text('current_address')->nullable();
            $table->string('current_address_city')->nullable();
            $table->string('current_address_state')->nullable();
            $table->string('current_address_zip_code')->nullable();
            $table->string('alternate_email', 100)->nullable()->unique();
            $table->string('home_phone', 20)->nullable();
            $table->string('emergency_number', 20)->nullable();
            $table->string('nid_bri_ppn', 50)->nullable()->unique();
            $table->date('birth_date')->nullable();
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed'])->nullable();
            $table->string('spouse_name', 100)->nullable();
            $table->string('spouse_employer', 100)->nullable();
            $table->string('spouse_work_phone', 20)->nullable();
            $table->string('emergency_contact_information_name')->nullable();
            $table->text('emergency_contact_information_address')->nullable();
            $table->string('emergency_contact_information_city')->nullable();
            $table->string('emergency_contact_information_zip_code')->nullable();
            $table->string('emergency_contact_information_phone')->nullable();
            $table->string('emergency_contact_information_relationsip')->nullable();
            $table->string('father_name', 100)->nullable();
            $table->string('mother_name', 100)->nullable();
            $table->string('father_service', 100)->nullable();
            $table->string('mother_service', 100)->nullable();
            $table->string('brothers_total')->nullable();
            $table->string('sisters_total')->nullable();
            $table->text('siblings_contact_info_one')->nullable();
            $table->text('siblings_contact_info_two')->nullable();
            $table->text('sign')->comment('file')->nullable();
            $table->text('ceo_sign')->comment('file')->nullable();
            $table->text('operation_director_sign')->comment('file')->nullable();
            $table->text('managing_director_sign')->comment('file')->nullable();
            $table->date('sign_date')->nullable();
            $table->date('evaluation_date')->nullable();  //New
            $table->date('last_evaluation_date')->nullable();  //New
            $table->date('next_evaluation_date')->nullable();  //New
            $table->integer('casual_leave_due_as_on')->default('0')->nullable();  //New
            $table->integer('casual_leave_availed')->default('0')->nullable();  //New
            $table->integer('casual_balance_due')->default('0')->nullable();  //New
            $table->integer('earned_leave_due_as_on')->default('0')->nullable();  //New
            $table->integer('earned_leave_availed')->default('0')->nullable();  //New
            $table->integer('earned_balance_due')->default('0')->nullable();  //New
            $table->integer('medical_leave_due_as_on')->default('0')->nullable();  //New
            $table->integer('medical_leave_availed')->default('0')->nullable();  //New
            $table->integer('medical_balance_due')->default('0')->nullable();  //New
            $table->enum('police_verification', ['verified', 'unverified'])->default('unverified')->nullable();
            $table->enum('acknowledgement', ['acknowledged', 'unacknowledged'])->default('acknowledged')->nullable();

            $table->foreign('category_id')->references('id')->on('employee_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('employee_departments')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->dropForeign(['category_id']);
            // $table->dropForeign(['department_id']);

            if (Schema::hasColumn('users', 'category_id')) {
                $table->dropForeign(['category_id']);
            }

            if (Schema::hasColumn('users', 'department_id')) {
                $table->dropForeign(['department_id']);
            }

            $table->dropColumn([
                'category_id',
                'department_id',
                'employee_id',
                'mobile',
                'total_years_of_job_experience',
                'total_years_of_related_experience',
                'total_years_of_related_education',
                'lowest_job_duration_in_past',
                'highest_job_duration_in_past',
                'concern_with_social_work',
                'what_turns_you_on_off',
                'preference_in_professional_life',
                'action_in_negative_situation',
                'recent_job_info_one_company_name',
                'recent_job_info_one_address',
                'recent_job_info_one_designation',
                'recent_job_info_one_contact_no',
                'recent_job_info_one_duration',
                'recent_job_info_two_company_name',
                'recent_job_info_two_address',
                'recent_job_info_two_designation',
                'recent_job_info_two_contact_no',
                'recent_job_info_two_duration',
                'professional_reference_name',
                'professional_reference_address',
                'professional_reference_contact_no_one',
                'professional_reference_contact_no_two',
                'professional_reference_contact_relation',
                'relative_reference_name',
                'relative_reference_address',
                'relative_reference_contact_no_one',
                'relative_reference_contact_no_two',
                'relative_reference_contact_relation',
                'highest_degree',
                'passing_year',
                'university',
                'major_subjects',
                'other_training_information_technical_training',
                'technical_training_duration_date',
                'other_training_information_certificate_course',
                'certificate_course_duration_date',
                'academic_achievements',
                'professional_achievements',
                'social_achievements',
                'personal_achievements',
                'permanent_address',
                'permanent_address_city',
                'permanent_address_state',
                'permanent_address_zip_code',
                'current_address',
                'current_address_city',
                'current_address_state',
                'current_address_zip_code',
                'alternate_email',
                'home_phone',
                'emergency_number',
                'nid_bri_ppn',
                'birth_date',
                'marital_status',
                'spouse_name',
                'spouse_employer',
                'spouse_work_phone',
                'emergency_contact_information_name',
                'emergency_contact_information_address',
                'emergency_contact_information_city',
                'emergency_contact_information_zip_code',
                'emergency_contact_information_phone',
                'emergency_contact_information_relationsip',
                'father_name',
                'mother_name',
                'father_service',
                'mother_service',
                'brothers_total',
                'sisters_total',
                'siblings_contact_info_one',
                'siblings_contact_info_two',
                'sign',
                'ceo_sign',
                'operation_director_sign',
                'managing_director_sign',
                'sign_date',
                'evaluation_date',
                'casual_leave_due_as_on',
                'casual_leave_availed',
                'casual_balance_due',
                'earned_leave_due_as_on',
                'earned_leave_availed',
                'earned_balance_due',
                'medical_leave_due_as_on',
                'medical_leave_availed',
                'medical_balance_due',
                'police_verification',
                'acknowledgement',
            ]);
        });
    }
};
