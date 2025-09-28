
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
        Schema::create('rfq_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rfq_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('product_name')->nullable();
            $table->bigInteger('qty')->nullable();
            $table->double('unit_price')->nullable();
            $table->double('discount')->nullable();
            $table->double('discount_price')->nullable();
            $table->double('total_price')->nullable();
            $table->double('sub_total')->nullable();
            $table->double('tax')->nullable();
            $table->double('tax_price')->nullable();
            $table->double('vat')->nullable();
            $table->double('vat_price')->nullable();
            $table->double('grand_total')->nullable();
            $table->foreign('rfq_id')->references('id')->on('rfqs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('sku_no')->nullable();
            $table->string('model_no')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('additional_product_name')->nullable();
            $table->bigInteger('additional_qty')->nullable();
            $table->string('image')->nullable();
            $table->text('product_des')->nullable();
            $table->text('additional_info')->nullable();

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
        Schema::dropIfExists('rfq_products');
    }
};
