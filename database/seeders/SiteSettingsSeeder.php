<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use App\Services\SettingService;
use Illuminate\Database\Seeder;

/**
 * Persists every current site writeup into site_settings.
 *
 * The defaults live in config/site.php (identity, branding, blocks) and
 * config/site_pages.php (per-page copy). This seeder writes them to the
 * database so the admin panel can edit each one, while the config remains the
 * safety net used by setting() when a value has never been saved.
 *
 * Idempotent: existing rows are never overwritten, so re-running is safe and
 * never clobbers an admin edit.
 */
class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [];

        foreach (['identity', 'branding', 'blocks'] as $group) {
            foreach (config('site.' . $group, []) as $key => $field) {
                $default = $field['default'] ?? null;

                if ($default === null || $default === '') {
                    continue;
                }

                $rows[] = ['group' => $group, 'key' => $key, 'value' => $default];
            }
        }

        foreach (config('site_pages', []) as $slug => $page) {
            foreach ($page['fields'] ?? [] as $key => $field) {
                $default = $field['default'] ?? null;

                if ($default === null || $default === '') {
                    continue;
                }

                $rows[] = ['group' => 'page.' . $slug, 'key' => $key, 'value' => $default];
            }
        }

        $existing = array_flip(
            SiteSetting::query()
                ->get(['group', 'key'])
                ->map(static fn ($row) => $row->group . '.' . $row->key)
                ->all()
        );

        $now = now();
        $insert = [];

        foreach ($rows as $row) {
            if (isset($existing[$row['group'] . '.' . $row['key']])) {
                continue;
            }

            $insert[] = $row + ['created_at' => $now, 'updated_at' => $now];
        }

        foreach (array_chunk($insert, 200) as $chunk) {
            SiteSetting::query()->insert($chunk);
        }

        SettingService::flush();

        $this->command?->info(sprintf(
            'SiteSettingsSeeder: %d new settings (of %d defined).',
            count($insert),
            count($rows)
        ));
    }
}
