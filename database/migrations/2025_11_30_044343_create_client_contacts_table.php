<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('client_contacts', function (Blueprint $table) {
            $table->id();
            // Linked to your existing industrial_sectors table
            $table->foreignId('sector_id')->nullable()->constrained('industrial_sectors')->nullOnDelete();
            $table->foreignId('sub_sector_id')->nullable()->constrained('industrial_sectors')->nullOnDelete();
            
            $table->string('company_name')->index(); // Indexed for faster search/grouping
            $table->text('address')->nullable();
            $table->string('area')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('official_phone')->nullable();
            $table->string('personal_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->default('Active'); // Active, Inactive
            $table->string('tier')->nullable();
            $table->text('comments')->nullable();
            $table->timestamps();
        });

        // Pivot Table for Permissions
        Schema::create('client_contact_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_contact_id')->constrained('client_contacts')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->unique(['client_contact_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_contact_user');
        Schema::dropIfExists('client_contacts');
    }
};