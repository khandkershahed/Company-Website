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
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('tender_code')->nullable(); //Auto generated code (TD-dmy-1,TD-dmy-2 ..). eg. TD-6102025-1
            // Basic Info
            $table->string('title')->nullable(); // 'Live' Tender name or Title
            $table->string('tender_type')->nullable(); //Select box options are : EOI,RFQ,Consultant,eGP,Enlistment,RFP
            $table->foreignId('responsible_person_id')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();  // Faisal
            $table->date('last_date_of_submission')->nullable();
            $table->string('submission_day')->nullable(); //Select box options are : & Days name
            $table->string('action')->nullable(); //Select box options are : Talk Today, Talk in this Week, Talk Urgently, Talk with Partner, Email Marketing, Start Relation, Important Client, Meet This Week, Meet Next Week, Attend Pre Bid Meet, Meet Tomorrow, Purchase Schedule, Get More Details, GEet ToR / SoW, NO

            // Participation
            $table->enum('participate', ['Yes', 'No', 'May Be', 'Need Discussion'])->nullable();
            $table->enum('submitted', ['Yes', 'No'])->nullable();
            $table->string('status')->nullable();
            $table->enum('tender_status', ['Live', 'Fail','Re Tender','Time Over','Technical Eval','Lost', 'Not Lowest', 'Probability','Won', 'Submitted', 'Participating'])->nullable();
            $table->enum('purchase', ['Yes', 'No', 'May Be'])->nullable();

            // Additional Tender Info
            $table->string('tenderer')->nullable();
            $table->text('tender_reference')->nullable();
            $table->string('mode_of_submission')->nullable(); // Select box options are : 'Hardcopy', 'Email', 'Online'
            $table->string('hardcopy_reference_id')->nullable(); // e.g., 'eGP ID', 'Hardcopy Ref'
            $table->string('online_reference')->nullable(); // e.g., 'eGP ID', 'Hardcopy Ref'
            $table->string('egp_id')->nullable();
            $table->string('pre_bid_meeting')->nullable();

            // Financial
            $table->decimal('schedule_value_tk', 18, 2)->nullable();
            $table->decimal('security', 18, 2)->nullable();

            // Time info
            $table->boolean('time_over')->nullable();

            // Client Details
            $table->string('client_name')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('contact_email')->nullable();
            $table->text('contact_address')->nullable();
            $table->text('client_website')->nullable();

            // Comments
            $table->text('comments_by_manager')->nullable();
            $table->text('comments_by_md')->nullable();
            $table->text('general_comments')->nullable();

            // Metadata
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};
