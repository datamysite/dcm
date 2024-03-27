<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Categories;
use App\Models\Retailers;
use App\Models\SnippetCode;
use App\Models\MetaTags;
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
            $data['headSnippet'] = SnippetCode::where('position', 'Head')->get();
            $data['bodySnippet'] = SnippetCode::where('position', 'Body')->get();
            $data['navbarCategories'] = Categories::select('id', 'image', 'name_ar', 'name', 'type', 'parent_id')->where('parent_id', 0)->get();

            $actual_link = '';
            if(isset($_SERVER['HTTP_HOST']) && !empty($_SERVER['HTTP_HOST'])){
                $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            }
            $data['actual_link'] = $actual_link;
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
