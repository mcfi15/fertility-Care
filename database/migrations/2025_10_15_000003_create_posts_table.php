<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Blog posts — listing page, recent-posts widgets and single-post detail all
 * read from this table. Replaces the former config/site_pages.php articles.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('slug', 200)->unique();
            $table->string('category', 80)->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('body');                        // rich text (HTML) allowed
            $table->string('featured_image')->nullable();    // public disk path OR bundled asset
            $table->string('author', 120)->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();

            $table->index(['is_published', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
