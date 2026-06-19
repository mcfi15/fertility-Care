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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->mediumText('small_description');
            $table->longText('description');
            $table->integer('price');
            $table->tinyInteger('status')->default('0')->comment('1=hidden, 0=visible');
            $table->string('image');
            $table->string('slug');
            $table->string('product_code');

            $table->string('meta_title');
            $table->mediumText('meta_description');
            $table->mediumText('meta_keywords');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
