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
        Schema::create('tender_sites', function (Blueprint $table) {
            $table->id();
            $table->string('organization')->nullable();
            $table->foreignId('category')->nullable()->constrained('industrial_sectors')->cascadeOnUpdate()->cascadeOnUpdate();  // Faisal
            $table->string('site_url')->nullable();
            $table->string('site_contact')->nullable();
            $table->string('email')->nullable();
            $table->boolean('enlisted')->default(false);
            $table->boolean('eprocure')->default(false);
            $table->boolean('participated')->default(false);
            $table->string('contact_no')->nullable();
            $table->integer('progress')->default(0);
            $table->string('status')->default('Pending'); // Active, Pending, Completed
            $table->text('remarks')->nullable();
            $table->text('address');
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
        Schema::dropIfExists('tender_sites');
    }
};
