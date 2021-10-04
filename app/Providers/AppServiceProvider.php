<?php

namespace App\Providers;

use App\Models\Admin\Category;
use App\Models\Admin\Order;
use App\Models\Admin\SiteSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
        $navCategories = Category::orderByDesc('created_at')->get();
        $setting = SiteSetting::find(1);
        define('SITE_NAME', $setting->name);
        View::share(['setting'=>$setting, 'navCategories'=>$navCategories]);
        $orders = Order::orderByDesc('created_at')->where('is_confirmed', false)->get();
        View::share('orders', $orders);
    }
}
