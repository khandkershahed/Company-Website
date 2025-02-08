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
        Schema::create('document_pdfs', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable()->comment('multi_id');
            $table->unsignedBigInteger('product_id')->nullable()->comment('multi_id');
            $table->unsignedBigInteger('industry_id')->nullable()->comment('multi_id');
            $table->unsignedBigInteger('solution_id')->nullable()->comment('multi_id');
            $table->string('name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('page_number', 20)->nullable();
            $table->text('description')->nullable();
            $table->longText('page_image')->nullable()->comment('image');
            $table->json('page_description')->nullable();
            $table->string('page_link')->nullable();
            $table->string('button_name')->nullable();
            $table->string('button_link')->nullable();
            $table->string('document')->nullable()->comment('file:pdf');
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
        Schema::dropIfExists('document_pdfs');
    }
};
