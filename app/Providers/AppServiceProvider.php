<?php

namespace App\Providers;

use App\Models\User;
use App\Services\SettingService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // One shared, cached settings reader for the whole request.
        $this->app->singleton(SettingService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        /*
         * Site-wide identity + branding, driven by the admin Settings panel.
         * SettingService reads from a cache and falls back to config, so this is
         * safe even before the site_settings table exists.
         *
         * Exposed as $appSetting to keep the Kaiadmin shell and the auth layout
         * working with the property names they already use.
         */
        $settings = app(SettingService::class);

        View::share('appSetting', (object) [
            'website_name' => $settings->get('identity.site_name', config('app.name')),
            'tagline'      => $settings->get('identity.site_tagline'),
            'logo'         => $settings->url('branding.logo'),
            'logo_footer'  => $settings->url('branding.logo_footer'),
            'favicon'      => $settings->url('branding.favicon'),
            'address'      => $settings->get('identity.address'),
            'email'        => $settings->get('identity.contact_email'),
            'email2'       => $settings->get('identity.support_email'),
            'phone'        => $settings->get('identity.contact_phone'),
            'phone2'       => $settings->get('identity.support_phone'),
            'facebook'     => $settings->get('identity.facebook_url'),
            'twitter'      => $settings->get('identity.twitter_url'),
            'instagram'    => $settings->get('identity.instagram_url'),
            'linkedin'     => $settings->get('identity.linkedin_url'),
        ]);

        // Account shown in the admin top bar.
        View::share('admin', $this->adminUser());
    }

    /**
     * The signed-in administrator for the top bar. Guarded so a request made
     * before the users table exists cannot break booting.
     */
    protected function adminUser(): ?User
    {
        try {
            return User::query()->orderBy('id')->first();
        } catch (\Throwable $e) {
            return null;
        }
    }
}
