<?php

/**
 * XML sitemap — rendered by GET /sitemap.xml (see routes/web.php).
 *
 * Sources: every public page declared in config/site_pages.php plus every
 * published article in the posts table. The host always comes from the
 * canonical URL configured in Admin ▸ Site Settings.
 *
 * @var array<int, array{loc: string, lastmod: string, priority: string, changefreq: string}> $rows
 */
?>
{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($rows as $row)
  <url>
    <loc>{{ $row['loc'] }}</loc>
    <lastmod>{{ $row['lastmod'] }}</lastmod>
    <changefreq>{{ $row['changefreq'] }}</changefreq>
    <priority>{{ $row['priority'] }}</priority>
  </url>
@endforeach
</urlset>
