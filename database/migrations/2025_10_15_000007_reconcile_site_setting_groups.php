<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Repairs the site_settings table after the historical first-dot split bug.
 *
 * Early writes went through SettingService::set(), which used to split on the
 * FIRST dot and therefore stored page values under group = "page", key =
 * "index.body_001". The seeder/prune migrations use the whole dotted namespace
 * (group = "page.index", key = "body_001"), so the same logical setting could
 * exist twice with different values.
 *
 * This migration:
 *   1. Folds every legacy group = "page" row into its canonical
 *      group = "page.<slug>" row, preferring the legacy value (it is the most
 *      recent / live copy).
 *   2. Drops legacy rows whose content now lives in its own table
 *      (Testimonials / FAQs / Blog).
 *   3. Normalises the brand wording across every stored value.
 */
return new class extends Migration
{
    /**
     * Page fields that were moved into dedicated tables and must NOT be
     * restored into site_settings.
     *
     * @var array<string, array<int, string>>
     */
    protected array $moved = [
        'page.index' => [
            'body_031', 'body_032',                                  // inline testimonial card
            'body_035', 'body_036', 'body_037', 'body_038', 'body_039', 'body_040', // blog teasers
        ],
        'page.faq' => ['body_001', 'body_002', 'body_003', 'body_004'],
    ];

    public function up(): void
    {
        $legacyRows = DB::table('site_settings')->where('group', 'page')->get();

        foreach ($legacyRows as $row) {
            $pos = strrpos($row->key, '.');

            if ($pos === false) {
                continue;
            }

            $slug  = substr($row->key, 0, $pos);
            $field = substr($row->key, $pos + 1);

            // The canonical group for a page field, e.g. "page.index".
            $group = 'page.' . $slug;

            // Content that has moved to its own table: remove, never restore.
            if (isset($this->moved[$group]) && in_array($field, $this->moved[$group], true)) {
                DB::table('site_settings')->where('id', $row->id)->delete();
                continue;
            }

            // Promote the legacy value to the canonical row (newest copy wins).
            DB::table('site_settings')->updateOrInsert(
                ['group' => $group, 'key' => $field],
                [
                    'value'      => $row->value,
                    'created_at' => $row->created_at ?: now(),
                    'updated_at' => now(),
                ]
            );

            DB::table('site_settings')->where('id', $row->id)->delete();
        }

        $this->normaliseBranding();
    }

    /**
     * Replace the previous "Latin America" wording that survived in stored
     * values with the current "Nigeria" branding.
     */
    protected function normaliseBranding(): void
    {
        $map = [
            'FertilityCare™ Centers Latin America' => 'FertilityCare Centers of Nigeria',
            'FertilityCare Centers Latin America'  => 'FertilityCare Centers of Nigeria',
            'Latin American'                       => 'Nigerian',
            'Latin America'                        => 'Nigeria',
        ];

        foreach (DB::table('site_settings')->get(['id', 'value']) as $row) {
            if ($row->value === null || $row->value === '') {
                continue;
            }

            $value = str_replace(array_keys($map), array_values($map), $row->value);

            if ($value !== $row->value) {
                DB::table('site_settings')->where('id', $row->id)->update(['value' => $value]);
            }
        }
    }

    public function down(): void
    {
        // Irreversible data repair.
    }
};
