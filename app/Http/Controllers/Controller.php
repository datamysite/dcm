<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getView($viewName){
        
        if(env('APP_AMP') == true){
            if (request()->segment(1) == 'amp') {
                if (view()->exists('amp-'.$viewName)) {
                    $viewName = 'amp-'.$viewName;
                    //dd($viewName);
                } 
            }
        }
        return $viewName;
    }
}
