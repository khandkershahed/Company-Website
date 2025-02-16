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
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->string('solution_template')->nullable();


            $table->string('industry_id')->nullable()->comment('multi_id');
            $table->string('name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('header')->nullable();
            $table->string('banner_image')->nullable()->comment('1800*625'); //image
            $table->string('thumbnail_image')->nullable(); //image
            $table->string('icon')->nullable(); //image

            $table->string('row_two_title')->nullable();
            $table->text('row_two_header')->nullable();
            $table->string('row_two_column_one_image')->nullable(); //image
            $table->string('row_two_column_one_title')->nullable();
            $table->text('row_two_column_one_description')->nullable();
            $table->text('row_two_column_one_link')->nullable();
            $table->string('row_two_column_two_image')->nullable(); //image
            $table->string('row_two_column_two_title')->nullable();
            $table->text('row_two_column_two_description')->nullable();
            $table->text('row_two_column_two_link')->nullable();
            $table->string('row_two_column_three_image')->nullable(); //image
            $table->string('row_two_column_three_title')->nullable();
            $table->text('row_two_column_three_description')->nullable();
            $table->text('row_two_column_three_link')->nullable();
            $table->string('row_two_column_four_image')->nullable(); //image
            $table->string('row_two_column_four_title')->nullable();
            $table->text('row_two_column_four_description')->nullable();
            $table->text('row_two_column_four_link')->nullable();

            $table->string('row_three_title')->nullable();
            $table->text('row_three_header')->nullable();

            $table->string('row_four_badge')->nullable();
            $table->string('row_four_title')->nullable();
            $table->text('row_four_header')->nullable();
            $table->text('row_four_quote')->nullable();
            $table->string('row_four_col_one_title')->nullable();
            $table->text('row_four_col_one_description')->nullable();
            $table->text('row_four_col_one_link')->nullable();
            $table->string('row_four_col_two_title')->nullable();
            $table->text('row_four_col_two_description')->nullable();
            $table->text('row_four_col_two_link')->nullable();
            $table->string('row_four_button_name')->nullable();
            $table->text('row_four_link')->nullable();
            $table->string('row_four_big_image', 180)->nullable();
            $table->string('row_four_small_image', 180)->nullable();

            $table->string('row_five_title')->nullable();
            $table->text('row_five_header')->nullable();

            $table->string('row_six_title');
            $table->string('row_six_badge')->nullable();
            $table->string('row_six_image')->nullable(); //image
            $table->string('row_six_btn_name')->nullable();
            $table->string('row_six_link')->nullable();
            $table->mediumText('row_six_description')->nullable();

            $table->string('row_seven_title');
            $table->string('row_seven_badge')->nullable();
            $table->string('row_seven_image')->nullable(); //image
            $table->string('row_seven_btn_name')->nullable();
            $table->string('row_seven_link')->nullable();
            $table->mediumText('row_seven_description')->nullable();

            $table->text('video_link')->nullable();
            $table->string('added_by')->nullable();
            $table->string('status')->nullable();
            $table->string('count_one',100)->nullable();
            $table->string('count_one',100)->nullable();
            $table->string('count_one',100)->nullable();
            $table->string('count_two',100)->nullable();
            $table->string('count_two',100)->nullable();
            $table->string('count_two',100)->nullable();
            $table->string('count_three',100)->nullable();
            $table->string('count_three',100)->nullable();
            $table->string('count_three',100)->nullable();
            $table->string('count_four',100)->nullable();
            $table->string('count_four',100)->nullable();
            $table->string('count_four',100)->nullable();
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
        Schema::dropIfExists('solutions');
    }
};
