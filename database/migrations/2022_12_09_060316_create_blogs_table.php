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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->nullable()->comment('multi_id');
            $table->string('brand_id')->nullable()->comment('multi_id');
            $table->string('industry_id')->nullable()->comment('multi_id');
            $table->string('solution_id')->nullable()->comment('multi_id');
            $table->enum('featured',['0','1'])->default('0')->nullable();
            $table->enum('type',['blog','story','tech_content'])->default('blog')->nullable();
            $table->string('badge')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('header')->nullable();
            $table->string('created_by')->nullable();
            $table->string('added_by')->nullable();
            $table->string('tags')->nullable();
            $table->string('image')->nullable();
            $table->longText('short_des')->comment('summernote')->nullable();
            $table->longText('long_des')->comment('summernote')->nullable();
            $table->text('footer')->nullable()->comment('summernote')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
