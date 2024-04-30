<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Jenssegers\Agent\Facades\Agent;

class amp_validator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ((function_exists('session_status') 
          && session_status() !== PHP_SESSION_ACTIVE) || !session_id()) {
          session_start();
        }
        if(config('app.amp') == true){
            $actual_link = '';
            if(isset($_SERVER['HTTP_HOST']) && !empty($_SERVER['HTTP_HOST'])){
                $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            }

            $isMobile = Agent::isMobile();
            $prefix = $request->route()->getPrefix();
            //dd([$isMobile, strpos($prefix, 'amp')]);
            if ($isMobile && strpos($prefix, 'amp') !== 0) {
                if($_SERVER['HTTP_HOST'] == 'localhost'){

                    $actual_link = substr_replace($actual_link, 'amp/', 21, 0);

                }else{
                    $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]/amp$_SERVER[REQUEST_URI]";
                }
                $_SESSION['amp'] = 'on';
                //return redirect()->to($actual_link);

            }elseif($isMobile == false && strpos($prefix, 'amp') !== false){
                
                $_SESSION['amp'] = 'off';
                $newPath =  str_replace('amp/','',$actual_link);
                //return redirect()->to($newPath);
            }
            if ((strpos($prefix, 'amp') == 0 && strpos($prefix, 'amp') !== false)){

                $_SESSION['amp'] = 'on';
            }else{
                $_SESSION['amp'] = 'off';
            }
            //dd($_SESSION['amp']);
            //dd(strpos($prefix, 'amp'));
        }

        return $next($request);
    }
}
