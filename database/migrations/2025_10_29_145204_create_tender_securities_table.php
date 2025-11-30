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
        Schema::create('tender_securities', function (Blueprint $table) {
            $table->id();
            $table->string('tenderer_name')->nullable();
            $table->text('tender_description')->nullable();
            $table->string('pay_order_number')->nullable();
            $table->decimal('amount', 15, 2)->default(0);
            $table->date('issue_date')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('security_type')->nullable();
            $table->string('reference_no')->nullable();
            $table->text('contact_person_details')->nullable();
            $table->string('status')->default('Pending');
            $table->date('return_date')->nullable();
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
        Schema::dropIfExists('tender_securities');
    }
};
