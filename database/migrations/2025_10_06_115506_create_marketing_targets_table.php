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
        Schema::create('marketing_targets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();  // Faisal
            $table->foreignId('sector_id')->nullable()->constrained('marketing_sectors')->cascadeOnUpdate()->cascadeOnUpdate();  // Faisal
            $table->year('year')->nullable(); // e.g., 2000, 2001, 2002
            $table->string('sector')->nullable(); 
            $table->string('month')->nullable(); // e.g., 'January', 'February'
            $table->string('contact_type')->nullable(); // e.g., Physical, Telephone, Online Meet, Email
            $table->integer('amount')->nullable();
            $table->double('value')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketing_targets');
    }
};
