<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Categories;
use App\Models\Retailers;
use App\Models\SnippetCode;
use App\Models\MetaTags;
use App\Models\Footer;
use App\Models\CashbackRequests;
use App\Models\RewardType;
use DB;
use Config;
use Auth;

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
            $data['allstates'] = DB::table('states')->where('country_id',  config('app.country'))->when(config('app.country') == '1', function($q){ $q->orderBy('name', 'asc'); })->get();
            $data['stripColors'] = array('#f11e4b' , '#151313', '#2dcc70', '#1dace3');
            $data['headSnippet'] = SnippetCode::where('position', 'Head')->where('country_id',  config('app.country'))->get();
            $data['bodySnippet'] = SnippetCode::where('position', 'Body')->where('country_id',  config('app.country'))->get();
            $data['navbarCategories'] = Categories::select('id', 'image', 'name_ar', 'name', 'type', 'parent_id')->when(config('app.retail') == false, function($q){ $q->where('id', '!=', '52')->limit(6); })->where('parent_id', 0)->OrderBy('order','ASC')->get();
            $data['navbarBlogs'] = Categories::select('id', 'image', 'name_ar', 'name', 'type', 'parent_id')->when(config('app.retail') == false, function($q){ $q->where('id', '!=', '52')->limit(6); })->where('parent_id', 0)->OrderBy('order','ASC')->get();

            $data['footCat'] = Footer::where('section_id', '3')->get();
            $data['footBrand'] = Footer::where('section_id', '2')->get();
            $data['footAbout'] = Footer::where('section_id', '1')->orderBy('order_number')->get();

            $data['copyright'] = Footer::where('section_id', '4')->first();

            $actual_link = '';
            if(isset($_SERVER['HTTP_HOST']) && !empty($_SERVER['HTTP_HOST'])){
                $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if($_SERVER['HTTP_HOST'] == 'localhost'){

                    $actual_link_m = substr_replace($actual_link, 'amp/', 21, 0);

                }else{
                    $actual_link_m = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]/amp$_SERVER[REQUEST_URI]";
                }
            }
            $data['actual_link'] = $actual_link;
            $data['actual_link_m'] = $actual_link_m;
            $al = explode('?', $actual_link);
            $data['actual_link'] = $al[0];
            $data['metaTags'] = MetaTags::where('url', $actual_link)->first();

            if ((function_exists('session_status') 
              && session_status() !== PHP_SESSION_ACTIVE) || !session_id()) {
              session_start();
            }
            $data['region'] = empty($_SESSION['region']) ? 'dubai' : $_SESSION['region'];
            
            if(Auth::check()){
                $reward = RewardType::where('type', 'Purchase')->first();
                $data['pending_balance'] = CashbackRequests::where('user_id', Auth::id())->where('status', 1)->count('id');
                $data['pending_balance'] = $data['pending_balance']*$reward->reward;
            }


            $data['en_link'] = substr_replace($data['actual_link'],"/en",strpos($data['actual_link'], "/".app()->getLocale()),3);
            $data['ar_link'] = substr_replace($data['actual_link'],"/ar",strpos($data['actual_link'], "/".app()->getLocale()),3);

            $view->with($data);
        });
    }
}
