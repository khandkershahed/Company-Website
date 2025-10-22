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
        Schema::create('rfq_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rfq_id')->nullable()->constrained('rfqs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('pq_number')->nullable();
            $table->string('pq_reference')->nullable()->comment('select(new | update | renew)');
            $table->string('po_number')->nullable();
            $table->date('po_date')->nullable();
            $table->string('po_reference')->nullable();
            $table->string('purchase_by')->nullable();
            $table->string('principal_name')->nullable();
            $table->string('principal_phone')->nullable();
            $table->string('principal_address')->nullable();
            $table->string('principal_email')->nullable();
            $table->string('billing_name')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('shipping_name')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('shipping_email')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('shipping_terms')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('validity')->nullable();
            $table->string('payment')->nullable();
            $table->string('delivery')->nullable();
            $table->string('license')->nullable();
            $table->string('penalty')->nullable();
            $table->string('payable_account_number')->nullable();
            $table->string('payable_account_name')->nullable();
            $table->string('payable_account_bank')->nullable();
            $table->string('payable_account_swift')->nullable();
            $table->string('payable_account_route')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_amount_reference')->nullable();
            $table->string('payment_process_fee')->nullable();
            $table->string('payment_pop_reference')->nullable();
            $table->date('payment_date')->nullable();
            $table->double('subtotal')->nullable();
            $table->double('shipping')->nullable();
            $table->double('tax')->nullable();
            $table->double('others')->nullable();
            $table->double('total')->nullable();
            $table->text('client_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfq_purchases');
    }
};
