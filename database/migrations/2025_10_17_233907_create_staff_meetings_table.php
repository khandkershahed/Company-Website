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
        Schema::create('staff_meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();  // Faisal
            $table->foreignId('lead_by')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();  // Faisal
            $table->string('title')->nullable(); // e.g., "Trade License"
            $table->date('date')->nullable(); // Will store both date and time
            $table->dateTime('start_time')->nullable(); // Will store both date and time
            $table->dateTime('end_time')->nullable();
            $table->json('participants')->nullable(); // e.g., "Minhajul Islam"
            $table->enum('type', ['office', 'out_of_office'])->default('office')->nullable(); // 'In Office' or 'Out Of Office'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_meetings');
    }
};
