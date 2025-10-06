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
        Schema::create('marketing_dmars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();  // Faisal
            $table->year('year')->nullable();             // e.g. 5 Feb 25
            $table->date('date')->nullable();             // e.g. 5 Feb 25
            $table->string('month', 10)->nullable();      // e.g. Feb
            $table->string('activity', 50)->nullable();   // e.g. Selectbox option : meeting, presentation,visit , followup, workshop
            $table->string('company', 100)->nullable();   // e.g. Grameenphone Ltd.
            $table->string('service', 50)->nullable();    // e.g. Telecom
            $table->string('products', 100)->nullable();  // e.g. Software License
            $table->double('tentative')->nullable();  // e.g. $12,000 (store as string or decimal)
            $table->text('comments')->nullable();  // e.g. Positive Response
            $table->string('action_on_fail', 100)->nullable(); // e.g.Selectbox option:  Followup, Resubmit, Technical Clarification, Provide Demo, Prepare Proposal
            $table->string('current_status', 50)->nullable();  // e.g.Selectbox option: Ongoing, Pending, In Progress, Prospect
            $table->string('client_type', 50)->nullable();     // e.g. Selectbox option: existing, new
            $table->string('sector')->nullable();          // e.g. Private
            $table->string('sub_sector')->nullable();      // e.g. Corporate
            $table->text('area')->nullable();            // e.g. Banani, Dhaka
            $table->string('contact_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('contact_email')->nullable();
            $table->text('contact_address')->nullable();
            $table->text('contact_website')->nullable();
            $table->text('contact_social')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketing_dmars');
    }
};
