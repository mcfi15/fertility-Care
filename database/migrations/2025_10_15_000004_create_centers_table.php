<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Centers directory — Centers / Practitioners (type "center") and NaPro
 * consultant doctors (type "doctor"), organized by country. Rendered on the
 * Directory and NaPro-doctors pages.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('centers', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20)->default('center');   // center | doctor
            $table->string('name', 180);
            $table->string('country', 120);
            $table->string('state', 120)->nullable();
            $table->string('city', 120)->nullable();
            $table->string('address')->nullable();
            $table->string('phone', 60)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('hours')->nullable();
            $table->string('specialty', 180)->nullable();    // doctors: focus area / centres: services
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['type', 'is_active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('centers');
    }
};
