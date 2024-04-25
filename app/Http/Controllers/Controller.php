<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Jenssegers\Agent\Facades\Agent;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getView($viewName){
        $view = $viewName;
        $isMobile = Agent::isMobile();
        if(config('app.amp')){
            if(config('app.ampn')){
                if ($isMobile) {
                    if (view()->exists('amp-'.$view)) {
                        $view = 'ampn-'.$view;
                        //
                    }
                }
            }else{
                if ($isMobile) {
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
