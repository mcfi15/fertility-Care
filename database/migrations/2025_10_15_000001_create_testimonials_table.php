<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Testimonials — the single source of truth for every testimonial shown on the
 * public site (Home + Testimonials page). Nothing here may be hard-coded in the
 * Blade templates; all rendering reads from this table.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->string('role', 120)->nullable();        // e.g. "32 years old", "Couple"
            $table->string('category', 80)->nullable();     // e.g. "Diagnosis", "Learning"
            $table->string('location', 120)->nullable();    // optional country / city
            $table->text('quote');
            $table->string('image')->nullable();            // optional portrait (public disk)
            $table->unsignedTinyInteger('rating')->default(5);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['is_active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
