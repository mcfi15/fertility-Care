<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * A single testimonial shown on the Home page and the Testimonials page.
 *
 * @property int         $id
 * @property string      $name
 * @property string|null $role
 * @property string|null $category
 * @property string|null $location
 * @property string      $quote
 * @property string|null $image
 * @property int         $rating
 * @property bool        $is_active
 * @property int         $sort_order
 */
class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'role', 'category', 'location', 'quote',
        'image', 'rating', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'rating'     => 'integer',
        'sort_order' => 'integer',
    ];

    /** Only published testimonials, in the admin-defined order. */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    /** Portrait URL, or null when none was uploaded. */
    public function imageUrl(): ?string
    {
        return media_url($this->image);
    }

    /** First letter of the name, for the avatar circle fallback. */
    public function initial(): string
    {
        return mb_strtoupper(mb_substr(trim($this->name), 0, 1));
    }
}
