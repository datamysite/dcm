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
            $navcat = Categories::select('id', 'image','name', 'type', 'parent_id')->where('parent_id', 0)->get();
            $view->with('navbarCategories', $navcat);
        });
    }
}
