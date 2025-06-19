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
        Schema::create('rfqs', function (Blueprint $table) {
            $table->id();
            $table->string('rfq_code', 100)->unique();
            $table->unsignedBigInteger('sales_man_id_L1')->nullable();
            $table->unsignedBigInteger('sales_man_id_T1')->nullable();
            $table->unsignedBigInteger('sales_man_id_T2')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('solution_id')->nullable();
            $table->enum('client_type', ['client', 'partner','anonymous'])->nullable();
            $table->string('name', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('company_name', 200)->nullable();
            $table->string('designation', 200)->nullable();
            $table->text('address')->nullable();
            $table->string('country', 200)->nullable();
            // New fields for RFQ
            $table->string('city', 200)->nullable();
            $table->string('zip_code', 20)->nullable();
            $table->enum('is_reseller', ['0', '1'])->default('0')->nullable();
            $table->string('shipping_name', 200)->nullable();
            $table->string('shipping_email', 200)->nullable();
            $table->string('shipping_phone',20)->nullable();
            $table->string('shipping_company_name', 200)->nullable();
            $table->string('shipping_designation', 200)->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('shipping_country', 200)->nullable();
            $table->string('shipping_city', 200)->nullable();
            $table->string('shipping_zip_code', 20)->nullable();
            $table->string('end_user_name', 200)->nullable();
            $table->string('end_user_email', 200)->nullable();
            $table->string('end_user_phone',20)->nullable();
            $table->string('end_user_company_name', 200)->nullable();
            $table->string('end_user_designation', 200)->nullable();
            $table->text('end_user_address')->nullable();
            $table->string('end_user_country', 200)->nullable();
            $table->string('end_user_city', 200)->nullable();
            $table->string('end_user_zip_code', 20)->nullable();
            $table->string('project_name', 20)->nullable();
            // New fields for RFQ
            $table->date('create_date')->nullable();
            $table->date('close_date')->nullable();
            $table->date('sale_date')->nullable();
            $table->string('pq_code', 100)->nullable();
            $table->string('pqr_code_one', 100)->nullable();
            $table->string('pqr_code_two', 100)->nullable();
            $table->integer('qty')->nullable();
            $table->json('category')->nullable();
            $table->json('brand')->nullable();
            $table->json('industry')->nullable();
            $table->json('solution')->nullable();
            $table->string('image')->nullable();
            $table->text('message')->nullable();
            $table->enum('rfq_type', ['rfq', 'deal' , 'sales' , 'order' ,'delivery'])->default('rfq')->nullable();
            $table->enum('call', ['0', '1'])->default('0')->nullable();
            $table->enum('regular', ['0', '1'])->default('0')->nullable();
            $table->enum('special', ['0', '1'])->default('0')->nullable();
            $table->enum('tax_status', ['0', '1'])->default('0')->nullable();
            $table->enum('deal_type', ['new', 'renew'])->default('new')->nullable();
            $table->string('status', 100)->nullable();
            $table->string('confirmation', 191)->nullable();
            $table->double('tax')->nullable();
            $table->double('vat')->nullable();
            $table->double('total_price')->nullable();
            $table->double('quoted_price')->nullable();
            $table->text('price_text')->nullable();
            $table->string('currency', 100)->nullable();
            $table->string('rfq_department', 100)->nullable();
            $table->string('delivery_location', 200)->nullable();
            $table->double('budget')->nullable();
            $table->string('project_status', 100)->nullable();
            $table->string('approximate_delivery_time',150)->nullable();
            $table->string('client_po', 191)->nullable();
            $table->string('client_payment_pdf', 191)->nullable();

            $table->foreign('sales_man_id_L1')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sales_man_id_T1')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sales_man_id_T2')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('solution_id')->references('id')->on('solution_details')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('rfqs');
    }
};
