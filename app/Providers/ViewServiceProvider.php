<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Categories;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Using Closure based composers...
        view()->composer('*', function ($view) {
            $stripColors = array('#f11e4b' , '#151313', '#2dcc70', '#1dace3');
            $navcat = Categories::select('id', 'image','name', 'type', 'parent_id')->where('parent_id', 0)->get();
            $view->with(['navbarCategories' => $navcat, 'stripColors' => $stripColors]);
        });
    }
}
