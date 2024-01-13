<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckInactiveUser
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
        $user = $request->user();

        if ($user && !$this->userIsActive($user)) {
            Auth::logout();

            return redirect('/login')->with('message', 'Your session has expired. Please log in again.');
        }

        return $next($request);
    }

    /**
     * Check if the user is active based on their last activity timestamp.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return bool
     */
    protected function userIsActive($user)
    {
        $lastActivity = $user->last_activity; // Replace this with your actual column name that stores the last activity timestamp

        if ($lastActivity) {
            $inactiveTime = config('session.lifetime') * 60; // Get the session lifetime in seconds
            $currentTime = Carbon::now()->timestamp;

            return ($currentTime - $lastActivity) <= $inactiveTime;
        }

        return false;
    }
}
