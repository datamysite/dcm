<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Jenssegers\Agent\Facades\Agent;


class setLocale
{
    public function handle(Request $request, Closure $next)
    {
        if(env('APP_AMP') == true && $request->segment(1) == 'amp'){
            app()->setLocale($request->segment(2));
            URL::defaults(['locale' => $request->segment(2)]);
        }else{
            app()->setLocale($request->segment(1));
            URL::defaults(['locale' => $request->segment(1)]);
        }
        return $next($request);
    }
}
