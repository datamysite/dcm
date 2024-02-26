<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Categories;
use App\Models\Retailers;
use App\Models\SnippetCode;

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
            $data['stripColors'] = array('#f11e4b' , '#151313', '#2dcc70', '#1dace3');
            $data['navbarCategories'] = Categories::select('id', 'image','name', 'type', 'parent_id')->where('parent_id', 0)->get();
            $data['footCat'] = Categories::select('id', 'image','name', 'type', 'parent_id')->where('parent_id', 0)->where('type', '3')->get();
            $data['footBrand'] = Retailers::select('id', 'name', 'slug')->where('status', '1')->limit(6)->get();
            $data['headSnippet'] = SnippetCode::where('position', 'Head')->get();
            $data['bodySnippet'] = SnippetCode::where('position', 'Body')->get();

            $view->with($data);
        });
    }
}
