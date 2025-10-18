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
        Schema::create('employee_leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('month')->nullable();
            $table->year('year')->nullable();
            $table->integer('total_leave')->default('0')->nullable();  //New
            $table->integer('total_leave_due_as_on')->default('0')->nullable();  //New
            $table->integer('casual_leave_due_as_on')->default('0')->nullable();  //New
            $table->integer('casual_leave_availed')->default('0')->nullable();  //New
            $table->integer('casual_balance_due')->default('0')->nullable();  //New
            $table->integer('earned_leave_due_as_on')->default('0')->nullable();  //New
            $table->integer('earned_leave_availed')->default('0')->nullable();  //New
            $table->integer('earned_balance_due')->default('0')->nullable();  //New
            $table->integer('medical_leave_due_as_on')->default('0')->nullable();  //New
            $table->integer('medical_leave_availed')->default('0')->nullable();  //New
            $table->integer('medical_balance_due')->default('0')->nullable();  //New
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_leaves');
    }
};
