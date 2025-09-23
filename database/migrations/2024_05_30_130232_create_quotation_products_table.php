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
        Schema::create('quotation_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rfq_id')->nullable()->constrained('rfqs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained('products')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('product_name',250)->nullable();
            $table->string('qty',250)->nullable();
            $table->string('principal_cost',250)->nullable();
            $table->string('principal_unit_total_amount',250)->nullable();
            $table->string('unit_office_cost',250)->nullable();
            $table->string('unit_profit',250)->nullable();
            $table->string('unit_others_cost',250)->nullable();
            $table->string('unit_remittance',250)->nullable();
            $table->string('unit_packing',250)->nullable();
            $table->string('unit_customs',250)->nullable();
            $table->string('unit_tax_vat',250)->nullable();
            $table->string('unit_subtotal',250)->nullable();
            $table->string('unit_final_price',250)->nullable();
            $table->string('unit_final_total_price',250)->nullable();
            $table->string('sub_total_principal_amount',250)->nullable();
            $table->string('sub_total_office_cost',250)->nullable();
            $table->string('sub_total_profit',250)->nullable();
            $table->string('sub_total_others_cost',250)->nullable();
            $table->string('sub_total_remittance',250)->nullable();
            $table->string('sub_total_packing',250)->nullable();
            $table->string('sub_total_customs',250)->nullable();
            $table->string('sub_total_tax',250)->nullable();
            $table->string('sub_total_subtotal',250)->nullable();
            $table->string('sub_total_final_total_price',250)->nullable();
            $table->string('special_discount_percentage',250)->nullable();
            $table->string('special_discount_principal_amount',250)->nullable();
            $table->string('special_discount_office_cost',250)->nullable();
            $table->string('special_discount_profit',250)->nullable();
            $table->string('special_discount_others_cost',250)->nullable();
            $table->string('special_discount_remittance',250)->nullable();
            $table->string('special_discount_packing',250)->nullable();
            $table->string('special_discount_customs',250)->nullable();
            $table->string('special_discount_tax',250)->nullable();
            $table->string('special_discount_subtotal',250)->nullable();
            $table->string('special_discount_final_total_price',250)->nullable();
            $table->string('vat_percentage',250)->nullable();
            $table->string('vat_principal_amount',250)->nullable();
            $table->string('vat_office_cost',250)->nullable();
            $table->string('vat_profit',250)->nullable();
            $table->string('vat_others_cost',250)->nullable();
            $table->string('vat_remittance',250)->nullable();
            $table->string('vat_packing',250)->nullable();
            $table->string('vat_customs',250)->nullable(); 
            $table->string('vat_tax',250)->nullable();
            $table->string('vat_subtotal',250)->nullable();
            $table->string('vat_final_total_price',250)->nullable();
            $table->string('total_principal_amount',250)->nullable();
            $table->string('total_office_cost',250)->nullable();
            $table->string('total_profit',250)->nullable();
            $table->string('total_others_cost',250)->nullable();
            $table->string('total_remittance',250)->nullable();
            $table->string('total_packing',250)->nullable();
            $table->string('total_customs',250)->nullable();
            $table->string('total_tax',250)->nullable();
            $table->string('total_subtotal',250)->nullable();
            $table->string('total_final_total_price',250)->nullable();
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
        Schema::dropIfExists('quotation_products');
    }
};
