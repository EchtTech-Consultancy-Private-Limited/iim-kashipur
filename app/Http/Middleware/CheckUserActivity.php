<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;


class CheckUserActivity
{
    public function handle($request, Closure $next)
    {
        $user =\Auth::guard('admin')->check();
        $userID =\Auth::guard('admin')->user();
        //dd($user);

        if ($user) {
            $lastActivity = Session::get('last_activity');

            if ($lastActivity && now()->diffInMinutes($lastActivity) > config('session.timeout')) {

            
                DB::table('admins')
                ->where('id', $userID->id)
                ->update(['login_check' => 0]);


                Auth::logout();
                Session::flush();

                return redirect('/Accounts')->with('status', 'You have been logged out due to inactivity.');
            }

            Session::put('last_activity', now());
        }

        return $next($request);
    }
}
