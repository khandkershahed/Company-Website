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
        Schema::create('tender_access_passes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sector_id')->nullable()->constrained('industrial_sectors')->cascadeOnUpdate()->cascadeOnUpdate();  // Faisal
            $table->string('organization')->nullable();
            $table->string('login_url')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->text('verification_details')->nullable();
            $table->string('recovery_email')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('tender_access_passes');
    }
};
