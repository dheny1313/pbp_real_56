<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class level_user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$level_baru): Response
    {
        if (Auth::check()) {
            $userLevel = Auth::user()->level;

            if (in_array($userLevel, $level_baru)) {
                return $next($request);
            }
        }
        return redirect("/dashboard")->with("error", 'anda tidak memilki akses ke halaman ini ');
    }
}
