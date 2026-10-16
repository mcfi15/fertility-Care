<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * A frequently asked question. Questions are grouped by `category` on the FAQ
 * page and reused in inline FAQ sections across the site.
 *
 * @property int         $id
 * @property string|null $category
 * @property string      $question
 * @property string      $answer
 * @property bool        $is_active
 * @property int         $sort_order
 */
class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'category', 'question', 'answer', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}
