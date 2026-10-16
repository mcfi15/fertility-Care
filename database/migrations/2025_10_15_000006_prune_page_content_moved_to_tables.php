<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Removes the site_settings rows whose content now lives in its own table
 * (the four CRUD domains). Keeps the single-source-of-truth guarantee: once
 * this has run, Testimonials / FAQs / Blog / Directory copy can only be edited
 * from their dedicated admin sections — never from Page Content.
 *
 * Page heroes and section headings that remain page-level copy are untouched.
 */
return new class extends Migration
{
    public function up(): void
    {
        // Home: the hard-coded testimonial card + the three blog teasers.
        DB::table('site_settings')
            ->where('group', 'page.index')
            ->whereIn('key', [
                'body_031', 'body_032',                                  // testimonial card
                'body_035', 'body_036', 'body_037', 'body_038', 'body_039', 'body_040', // blog cards
            ])
            ->delete();

        // FAQ page: the four category headings (now derived from FAQs.category).
        DB::table('site_settings')
            ->where('group', 'page.faq')
            ->whereIn('key', ['body_001', 'body_002', 'body_003', 'body_004'])
            ->delete();

        // Blog article copy (now the posts table).
        DB::table('site_settings')
            ->whereIn('group', [
                'page.why-study-naprotechnology',
                'page.what-every-woman-and-couple-have-the-right-to-know',
                'page.natural-fertility-methods',
            ])
            ->delete();
    }

    public function down(): void
    {
        // Intentionally empty: the content has been moved into its own tables.
    }
};
