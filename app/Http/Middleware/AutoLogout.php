<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AutoLogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = Session::get('last_activity_time');
            $timeout = 15 * 60; // 15 minutes in seconds

            if ($lastActivity && (time() - $lastActivity) > $timeout) {
                Auth::logout();
                Session::forget('last_activity_time');
                return redirect('/login')->with('message', 'Session expired due to inactivity');
            }

            Session::put('last_activity_time', time());
        }

        return $next($request);
    }
}
