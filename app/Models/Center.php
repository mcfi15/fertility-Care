<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * A Center / Practitioner ("center") or a NaPro consultant doctor ("doctor").
 *
 * @property int         $id
 * @property string      $type
 * @property string      $name
 * @property string      $country
 * @property string|null $state
 * @property string|null $city
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $hours
 * @property string|null $specialty
 * @property bool        $is_active
 * @property int         $sort_order
 */
class Center extends Model
{
    use HasFactory;

    public const TYPE_CENTER = 'center';
    public const TYPE_DOCTOR = 'doctor';

    protected $fillable = [
        'type', 'name', 'country', 'state', 'city', 'address',
        'phone', 'email', 'hours', 'specialty', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'sort_order' => 'integer',
    ];

    /** @return array<string, string> */
    public static function types(): array
    {
        return [
            self::TYPE_CENTER => 'Center / Practitioner',
            self::TYPE_DOCTOR => 'NaPro consultant doctor',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('country')->orderBy('sort_order')->orderBy('name');
    }

    /** Anchor-friendly country slug used by the directory quick-nav. */
    public function countrySlug(): string
    {
        return \Illuminate\Support\Str::slug($this->country);
    }
}
