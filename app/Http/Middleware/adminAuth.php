<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class adminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(config('app.admin')){
            if(Auth::guard('admin')->check()){
                return $next($request);
            }else{
                return redirect(route('admin.login'));
            }
        }else{
            return redirect()->intended('https://dealsandcouponsmena.ae/admin/panel');
        }
    }
}
