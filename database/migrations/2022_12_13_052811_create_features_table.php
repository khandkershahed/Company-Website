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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->nullable()->comment('multi_id');
            $table->string('brand_id')->nullable()->comment('multi_id');
            $table->string('industry_id')->nullable()->comment('multi_id');
            $table->string('solution_id')->nullable()->comment('multi_id');
            // $table->enum('featured',['0','1'])->default('0')->nullable();

            $table->string('badge')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('header')->nullable();
            $table->string('logo')->nullable()->comment('90*90');
            $table->string('image')->nullable()->comment('530*348');
            $table->string('banner_btn_name')->nullable();
            $table->string('banner_btn_link')->nullable();

            $table->unsignedBigInteger('row_one_id');
            $table->foreign('row_one_id')->references('id')->on('rows')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('row_two_id');
            $table->foreign('row_two_id')->references('id')->on('rows')->onUpdate('cascade')->onDelete('cascade');

            $table->string('row_three_title')->nullable();
            $table->text('row_three_header')->nullable();

            $table->string('row_four_title')->nullable();
            $table->text('row_four_header')->nullable();
            $table->string('row_four_image')->nullable()->comment('1500*1000');

            $table->text('row_five_header')->nullable();
            $table->string('row_five_title')->nullable();

            $table->text('footer')->nullable();
            $table->string('added_by')->nullable();
            $table->string('status')->nullable();

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
        Schema::dropIfExists('features');
    }
};
