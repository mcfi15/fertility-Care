<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        $websiteSetting = Setting::first();
        View::share('appSetting', $websiteSetting);
        $admin = User::where('id', '1')->first();
        View::share('admin', $admin);
        $categories = Category::with('products')->orderBy('id', 'DESC')->get();
        View::share('appCategories', $categories);
        
    }
}
