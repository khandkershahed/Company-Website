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
        Schema::create('rfq_quotations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rfq_id')->nullable()->constrained('rfqs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('rfq_code')->nullable();
            $table->string('quotation_title')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('currency')->nullable();
            $table->string('vat_text')->nullable();
            $table->string('company_name')->nullable();
            $table->string('name')->nullable();
            $table->string('receiver_email')->nullable();
            $table->text('receiver_cc_email')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('ngen_company_name')->nullable();
            $table->string('ngen_company_registration_number')->nullable();
            $table->string('quotation_date')->nullable();
            $table->string('pq_code')->nullable();
            $table->string('pqr_code')->nullable();
            $table->string('sub_total_final_total_price')->nullable();
            $table->string('special_discount_final_total_price')->nullable();
            $table->string('vat_final_total_price')->nullable();
            $table->string('total_final_total_price')->nullable();
            $table->string('thank_you_text')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('sender_designation')->nullable();
            $table->string('ngen_email')->nullable();
            $table->string('ngen_whatsapp_number')->nullable();
            $table->string('ngen_number_two')->nullable();
            $table->string('attachment')->nullable();
            $table->string('office_cost_percentage')->nullable();
            $table->string('profit_percentage')->nullable();
            $table->string('others_cost_percentage')->nullable();
            $table->string('remittence_percentage')->nullable();
            $table->string('packing_percentage')->nullable();
            $table->string('custom_percentage')->nullable();
            $table->string('tax_vat_percentage')->nullable();
            $table->string('vat_display')->nullable();
            $table->string('special_discount_display')->nullable();
            $table->string('quotation_pdf')->nullable();
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
        Schema::dropIfExists('rfq_quotations');
    }
};
