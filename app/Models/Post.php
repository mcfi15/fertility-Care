<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * A blog post. Powers the Blog listing, the "recent posts" widgets and the
 * single-post detail view.
 *
 * @property int         $id
 * @property string      $title
 * @property string      $slug
 * @property string|null $category
 * @property string|null $excerpt
 * @property string      $body
 * @property string|null $featured_image
 * @property string|null $author
 * @property \Carbon\Carbon|null $published_at
 * @property bool        $is_published
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'category', 'excerpt', 'body',
        'featured_image', 'author', 'published_at', 'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /** Published posts, newest first. */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->where(static function (Builder $q) {
                $q->whereNull('published_at')->orWhere('published_at', '<=', now());
            });
    }

    public function scopeLatestFirst(Builder $query): Builder
    {
        return $query->orderByDesc('published_at')->orderByDesc('id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /** Cover image URL, or a bundled fallback. */
    public function imageUrl(): ?string
    {
        return media_url($this->featured_image, '/fertilitycare-replica/assets/placeholder.svg');
    }

    /** "Sep 7, 2026" style date, or null when not dated. */
    public function dateLabel(): ?string
    {
        return $this->published_at?->format('M j, Y');
    }

    /** Slug-safe value, generated from the title when left blank. */
    public static function makeSlug(string $title, ?string $slug = null): string
    {
        $base = Str::slug($slug ?: $title);

        return $base !== '' ? $base : Str::random(8);
    }
}
