<?php

namespace App\Models;

use App\Services\SettingService;
use Illuminate\Database\Eloquent\Model;

/**
 * One row per setting. `group` is the namespace, `key` the field name
 * inside it — together they form the lookup used by setting(): "identity.site_name".
 */
class SiteSetting extends Model
{
    protected $table = 'site_settings';

    protected $fillable = [
        'group',
        'key',
        'value',
    ];

    /**
     * Keep the read cache in sync the instant anything is written, so branding
     * changes are live site-wide without a route cache or server restart.
     */
    public static function booted(): void
    {
        static::saved(static function (): void {
            SettingService::flush();
        });

        static::deleted(static function (): void {
            SettingService::flush();
        });
    }
}
