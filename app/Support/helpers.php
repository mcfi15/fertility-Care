<?php

use App\Services\SettingService;

if (! function_exists('setting')) {
    /**
     * Read a site setting.
     *
     *   setting('identity.site_name');                    // config default if unset
     *   setting('page.about-us.title', 'Fallback');       // explicit fallback
     *
     * Reads are served from a cached map and refreshed automatically when the
     * admin saves anything.
     */
    function setting(string $key, mixed $default = null): mixed
    {
        return app(SettingService::class)->get($key, $default);
    }
}

if (! function_exists('setting_url')) {
    /**
     * Public URL of a stored media file (logo, favicon, hero image).
     * Returns $default when nothing has been uploaded yet.
     */
    function setting_url(string $key, ?string $default = null): ?string
    {
        return app(SettingService::class)->url($key, $default);
    }
}

if (! function_exists('media_url')) {
    /**
     * Resolve a stored media path to a public URL.
     *
     * Works for both bundled assets (already absolute, e.g.
     * "/fertilitycare-replica/assets/x.webp" or "https://…") and files uploaded
     * to the `public` disk (e.g. "posts/abc.webp" -> "/storage/posts/abc.webp").
     */
    function media_url(?string $path, ?string $default = null): ?string
    {
        if ($path === null || $path === '') {
            return $default;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, '/')) {
            return $path;
        }

        return asset('storage/' . ltrim($path, '/'));
    }
}

if (! function_exists('canonical_media_url')) {
    /**
     * Absolute URL for a media value (stored path or URL) on the canonical
     * domain (identity.site_url).
     *
     * Search engines and social crawlers fetch these URLs from outside the
     * site, so they must never point at the local development host or carry
     * the sub-directory the app happens to be served from. Genuinely external
     * URLs (a CDN, a partner logo) are returned untouched.
     */
    function canonical_media_url(?string $value): string
    {
        $url = media_url($value);

        if (! $url) {
            return '';
        }

        $host = parse_url($url, PHP_URL_HOST);

        if ($host !== null && $host !== '' && $host !== request()->getHost()) {
            return $url;
        }

        $path = (string) parse_url($url, PHP_URL_PATH);
        $base = rtrim(request()->getBaseUrl(), '/');

        if ($base !== '' && str_starts_with($path, $base)) {
            $path = substr($path, strlen($base));
        }

        $canonicalBase = rtrim((string) setting('identity.site_url', url('/')), '/');

        return $canonicalBase . '/' . ltrim($path, '/');
    }
}

if (! function_exists('setting_page_key')) {
    /**
     * The site_settings namespace for the page currently being rendered,
     * e.g. "page.about-us" — derived from the matched route so shared partials
     * (page-hero, cta-band) stay unaware of which page included them.
     *
     * Returns null for routes that aren't part of the public site.
     */
    function setting_page_key(): ?string
    {
        $route = request()->route()?->getName();

        if ($route === null) {
            return null;
        }

        foreach (config('site_pages', []) as $slug => $page) {
            if (($page['route'] ?? null) === $route) {
                return 'page.' . $slug;
            }
        }

        return null;
    }
}
