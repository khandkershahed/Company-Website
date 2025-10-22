<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rfq_purchase_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rfq_id')->nullable()->constrained('rfqs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('purchase_id')->nullable()->constrained('rfq_purchases')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('sku_code')->nullable();
            $table->string('product_name')->nullable();
            $table->string('client_name')->nullable();
            $table->bigInteger('qty')->nullable();
            $table->double('unit_price')->nullable();
            $table->double('sub_total')->nullable();
            $table->double('amount')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfq_purchase_products');
    }
};
