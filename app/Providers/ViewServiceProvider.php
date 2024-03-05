<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Categories;
use App\Models\Retailers;
use App\Models\SnippetCode;
use App\Models\MetaTags;
use App\Models\States;
use Config;

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
            $data['allstates'] = States::where('country_id', '1')->orderBy('name', 'asc')->get();

            $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $data['metaTags'] = MetaTags::where('url', $actual_link)->first();

            if ((function_exists('session_status') 
              && session_status() !== PHP_SESSION_ACTIVE) || !session_id()) {
              session_start();
            }
            $data['region'] = empty($_SESSION['region']) ? 'dubai' : $_SESSION['region'];
            //dd($data);
            $view->with($data);
        });
    }
}
