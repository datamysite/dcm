<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Jenssegers\Agent\Facades\Agent;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getView($viewName, $amp = false){
        $view = $viewName;
        $isMobile = Agent::isMobile();
        if(config('app.amp')){
            if(config('app.ampn')){
                if ($_SESSION['amp'] == 'on') {
                    if (view()->exists('ampn-'.$view)) {
                        $view = 'ampn-'.$view;
                        //
                    }
                }
            }else{
                if($_SESSION['amp'] == 'on'){
                    if (view()->exists('amp-'.$view)) {
                        $view = 'amp-'.$view;
                        //
                    }
                }
            }
        }
        return $view;
    }
}
