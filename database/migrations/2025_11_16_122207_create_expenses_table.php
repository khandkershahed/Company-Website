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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expense_category')->nullable()->constrained('expense_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('expense_type')->nullable()->constrained('expense_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('date')->nullable();
            $table->string('month')->nullable();
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->string('particulars')->nullable();
            $table->string('voucher')->nullable()->comment('file');
            $table->double('amount')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
