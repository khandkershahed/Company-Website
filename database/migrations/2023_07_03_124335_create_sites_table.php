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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('site_name', 100);
            $table->string('company_name', 100)->nullable();
            $table->string('site_slogan', 255)->nullable();
            $table->string('meta_description', 255)->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('og_image')->nullable();
            $table->string('phone_one')->nullable();
            $table->string('phone_two')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->text('address')->nullable();
            $table->string('currency', 10)->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('default_language', 100)->nullable();
            $table->string('contact_email', 200)->nullable();
            $table->string('support_email', 200)->nullable();
            $table->string('info_email', 200)->nullable();
            $table->string('sales_email', 200)->nullable();
            $table->string('facebook_url', 255)->nullable();
            $table->string('twitter_url', 255)->nullable();
            $table->string('instagram_url', 255)->nullable();
            $table->string('linkedin_url', 255)->nullable();
            $table->string('youtube_url', 255)->nullable();
            $table->string('github_url', 255)->nullable();
            $table->string('portfolio_url', 255)->nullable();
            $table->string('fiver_url', 255)->nullable();
            $table->string('upwork_url', 255)->nullable();
            $table->string('service_days', 100)->nullable();
            $table->string('service_time', 100)->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
};
