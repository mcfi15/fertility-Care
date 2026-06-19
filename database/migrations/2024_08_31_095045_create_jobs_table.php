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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('small_description')->nullable();
            $table->string('description')->nullable();
            $table->string('closing_date')->nullable();
            $table->string('position')->nullable();
            $table->string('location')->nullable();
            $table->string('type')->nullable();
            $table->string('slug');
            $table->string('eligibility')->nullable();
            $table->tinyInteger('status')->default('0')->comment('1=expired, 0=active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
