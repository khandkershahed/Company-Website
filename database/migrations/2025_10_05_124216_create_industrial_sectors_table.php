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
        Schema::create('industrial_sectors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('industrial_sectors')->onDelete('set null');
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('status')->default('active')->comment('inactive,active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketing_sectors');
    }
};
