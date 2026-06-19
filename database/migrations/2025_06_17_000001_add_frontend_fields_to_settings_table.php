<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('about_title')->nullable()->after('latitude');
            $table->text('about_image')->nullable()->after('about_title');
            $table->string('about_button_text')->nullable()->after('about_image');
            $table->string('about_button_link')->nullable()->after('about_button_text');

            $table->string('feature1_title')->nullable()->after('about_button_link');
            $table->text('feature1_description')->nullable()->after('feature1_title');
            $table->string('feature1_icon')->nullable()->after('feature1_description');

            $table->string('feature2_title')->nullable()->after('feature1_icon');
            $table->text('feature2_description')->nullable()->after('feature2_title');
            $table->string('feature2_icon')->nullable()->after('feature2_description');

            $table->string('feature3_title')->nullable()->after('feature2_icon');
            $table->text('feature3_description')->nullable()->after('feature3_title');
            $table->string('feature3_icon')->nullable()->after('feature3_description');

            $table->string('faq_heading')->nullable()->after('feature3_icon');
            $table->longText('faq_items')->nullable()->after('faq_heading');

            $table->string('opening_hours')->nullable()->after('faq_items');

            $table->text('google_analytics')->nullable()->after('opening_hours');
            $table->text('header_scripts')->nullable()->after('google_analytics');
            $table->text('footer_scripts')->nullable()->after('header_scripts');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'about_title', 'about_image', 'about_button_text', 'about_button_link',
                'feature1_title', 'feature1_description', 'feature1_icon',
                'feature2_title', 'feature2_description', 'feature2_icon',
                'feature3_title', 'feature3_description', 'feature3_icon',
                'faq_heading', 'faq_items', 'opening_hours',
                'google_analytics', 'header_scripts', 'footer_scripts',
            ]);
        });
    }
};