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
        Schema::create('solution_details', function (Blueprint $table) {
            $table->id();
            $table->string('solution_template')->nullable();
            $table->unsignedBigInteger('row_one_id')->nullable();
            $table->unsignedBigInteger('row_four_id')->nullable();
            $table->unsignedBigInteger('solution_card_one_id')->nullable();
            $table->unsignedBigInteger('solution_card_two_id')->nullable();
            $table->unsignedBigInteger('solution_card_three_id')->nullable();
            $table->unsignedBigInteger('solution_card_four_id')->nullable();
            $table->unsignedBigInteger('solution_card_five_id')->nullable();
            $table->unsignedBigInteger('solution_card_six_id')->nullable();
            $table->unsignedBigInteger('solution_card_seven_id')->nullable();
            $table->unsignedBigInteger('solution_card_eight_id')->nullable();

            $table->string('industry_id')->nullable()->comment('multi_id');
            $table->string('name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('header')->nullable();
            $table->string('banner_image')->nullable()->comment('1800*625');
            $table->string('thumbnail_image')->nullable();
            $table->string('icon')->nullable();
            $table->string('row_two_title')->nullable();
            $table->text('row_two_header')->nullable();
            $table->string('row_three_title')->nullable();
            $table->text('row_three_header')->nullable();
            $table->string('row_five_title')->nullable();
            $table->text('row_five_header')->nullable();
            $table->text('video_link')->nullable();
            $table->string('added_by')->nullable();
            $table->string('status')->nullable();

            $table->foreign('row_one_id')->references('id')->on('rows')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('solution_card_one_id')->references('id')->on('solution_cards')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('solution_card_two_id')->references('id')->on('solution_cards')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('solution_card_three_id')->references('id')->on('solution_cards')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('solution_card_four_id')->references('id')->on('solution_cards')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('solution_card_five_id')->references('id')->on('solution_cards')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('solution_card_six_id')->references('id')->on('solution_cards')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('solution_card_seven_id')->references('id')->on('solution_cards')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('solution_card_eight_id')->references('id')->on('solution_cards')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('solution_details');
    }
};
