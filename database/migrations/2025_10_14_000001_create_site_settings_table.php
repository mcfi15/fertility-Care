<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Dynamic Admin Site Settings & Content Engine — storage.
 *
 * A flexible key/value model rather than a wide fixed-column table, so new
 * branding variables or new page copy can be added from config without
 * shipping a migration every time.
 *
 * Key shape:   {group}.{key}  ->  "identity.site_name", "page.about-us.title"
 * Lookup:      setting('page.about-us.title', $fallback)
 *
 * `group` is the namespace ("identity", "branding", "blocks", "page.about-us")
 * and `key` the field name inside it, so (group, key) is unique.
 */
return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('site_settings')) {
            return;
        }

        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('group', 60)->default('general')->index();
            $table->string('key', 80);
            $table->longText('value')->nullable();
            $table->timestamps();

            // One row per field.
            $table->unique(['group', 'key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
