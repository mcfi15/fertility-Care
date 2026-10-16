<?php

namespace App\Services;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;

/**
 * Cached read/write layer over site_settings.
 *
 * All reads go through a single forever-cache bucket; any write clears it, so
 * admin changes are visible immediately across every page.
 *
 *   SettingService::get('identity.site_name', 'FertilityCare');
 *   SettingService::set('branding.logo', 'branding/logo-123.png');
 *   SettingService::url('branding.favicon');   // asset('storage/...')
 *
 * Defaults come from config/site.php (identity, branding, blocks) and
 * config/site_pages.php (page.{slug}.{field}), so an empty table still renders
 * a complete site and the admin form can show what is live today.
 */
class SettingService
{
    public const CACHE_KEY = 'site_settings.values';

    /**
     * Split a "group.key" name into [group, key].
     *
     * The group is the whole dotted namespace (e.g. "identity" or
     * "page.about-us") and the key is the final field name — so we split on the
     * LAST dot. This keeps set()/putMany()/forgetMany() aligned with the
     * `group` column written by the seeder (group = "page.index", key =
     * "body_001") instead of producing a first-dot "page" + "index.body_001"
     * duplicate.
     */
    public static function split(string $fullKey): array
    {
        $pos = strrpos($fullKey, '.');
        if ($pos === false) {
            return ['general', $fullKey];
        }

        return [substr($fullKey, 0, $pos), substr($fullKey, $pos + 1)];
    }

    /**
     * Cached map of "group.key" => stored value.
     *
     * The cache is only written once the table has actually been read, so an
     * un-migrated database (fresh install / mid-migrate) silently falls back to
     * the config defaults instead of breaking the request or the artisan call.
     */
    public function all(): array
    {
        $cached = Cache::get(self::CACHE_KEY);

        if (is_array($cached)) {
            return $cached;
        }

        try {
            $map = [];

            foreach (SiteSetting::query()->get(['group', 'key', 'value']) as $row) {
                $map[$row->group . '.' . $row->key] = $row->value;
            }
        } catch (\Throwable $e) {
            return [];
        }

        Cache::forever(self::CACHE_KEY, $map);

        return $map;
    }

    /**
     * Effective value: saved value, then the caller's fallback, then config.
     */
    public function get(string $key, mixed $default = null): mixed
    {
        $map = $this->all();

        if (array_key_exists($key, $map) && $map[$key] !== null && $map[$key] !== '') {
            return $map[$key];
        }

        return $default ?? $this->configDefault($key);
    }

    /**
     * The saved value only — never the config default. Used for media paths so
     * a missing upload falls back to the bundled placeholder, not to text.
     */
    public function raw(string $key): ?string
    {
        $map = $this->all();

        return $map[$key] ?? null;
    }

    /**
     * Public URL of a stored media file (storage/app/public/branding/...).
     */
    public function url(string $key, ?string $default = null): ?string
    {
        $path = $this->raw($key);

        if ($path === null || $path === '') {
            return $default;
        }

        return asset('storage/' . ltrim($path, '/'));
    }

    public function has(string $key): bool
    {
        $map = $this->all();

        return isset($map[$key]) && $map[$key] !== null && $map[$key] !== '';
    }

    /**
     * Persist a value under a "group.key" name (upsert) and refresh the cache.
     */
    public function set(string $key, mixed $value): void
    {
        [$group, $field] = static::split($key);

        SiteSetting::query()->updateOrCreate(
            ['group' => $group, 'key' => $field],
            ['value' => $value]
        );
    }

    /**
     * Persist many values in one go (single cache flush).
     *
     * @param  array<string, mixed>  $values  keyed by "group.key"
     */
    public function putMany(array $values): void
    {
        foreach ($values as $key => $value) {
            [$group, $field] = static::split($key);

            SiteSetting::query()->updateOrCreate(
                ['group' => $group, 'key' => $field],
                ['value' => $value]
            );
        }

        static::flush();
    }

    /**
     * @param  array<string, string>  $groups  e.g. ['branding', 'page.about-us']
     */
    public function forgetMany(array $groups): void
    {
        SiteSetting::query()->whereIn('group', $groups)->delete();

        static::flush();
    }

    /**
     * Drop the cached settings bucket.
     */
    public static function flush(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    /**
     * Config fallback for a key: identity / branding / blocks live in site.php,
     * per-page copy in site_pages.php.
     */
    public function configDefault(string $key): mixed
    {
        [$group, $field] = static::split($key);

        if ($group === 'identity' || $group === 'branding' || $group === 'blocks') {
            return config("site.$group.$field.default");
        }

        if (str_starts_with($group, 'page.')) {
            $slug = substr($group, 5);

            return config("site_pages.$slug.fields.$field.default");
        }

        return null;
    }

    /**
     * Field metadata (label/type/…) used by the admin forms.
     *
     * @return array<string, mixed>|null
     */
    public function configField(string $key): ?array
    {
        [$group, $field] = static::split($key);

        $node = null;

        if ($group === 'identity' || $group === 'branding' || $group === 'blocks') {
            $node = config("site.$group.$field");
        } elseif (str_starts_with($group, 'page.')) {
            $slug = substr($group, 5);
            $node = config("site_pages.$slug.fields.$field");
        }

        return is_array($node) ? $node : null;
    }
}
