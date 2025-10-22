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
        Schema::create('rfq_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rfq_id')->nullable()->constrained('rfqs')->cascadeOnUpdate()->cascadeOnDelete();  // Faisal
            $table->string('invoice_no')->nullable();
            $table->string('work_order')->nullable()->comment('file');
            $table->string('work_order_no')->nullable()->comment('number');
            $table->enum('order_type', ['online', 'deal'])->default('online')->nullable();
            $table->text('notes')->nullable();

            $table->string('payment_type')->nullable();
            $table->string('payment_method')->nullable();

            $table->string('proforma_invoice')->nullable();
            $table->string('invoice')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('payment_slip')->nullable();

            $table->string('currency')->nullable();
            $table->double('amount')->nullable();
            $table->double('tax')->nullable();
            $table->double('gst')->nullable();
            $table->double('delivery_charge')->nullable();
            $table->double('packaging_charge')->nullable();
            $table->date('order_date')->nullable();
            $table->date('confirmed_date')->nullable();
            $table->date('processing_date')->nullable();
            $table->date('picked_date')->nullable();
            $table->date('shipped_date')->nullable();
            $table->date('delivered_date')->nullable();
            $table->date('cancel_date')->nullable();
            $table->date('return_date')->nullable();
            $table->string('return_reason')->nullable();
            $table->string('status')->nullable();
            $table->string('order_status')->nullable();
            $table->enum('processing_status',['processed','not_processed'])->nullable();
            $table->enum('delivery_status',['delivered','not_delivered'])->nullable();
            $table->double('client_price')->nullable();
            $table->enum('client_price_status',['adv_received','not_received','half_received','received'])->nullable();
            $table->string('principles_name')->nullable();
            $table->double('principles_price')->nullable();
            $table->double('principles_payment')->nullable();
            $table->enum('principles_payment_status',['adv_paid','not_paid','half_paid','paid'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfq_orders');
    }
};
