<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserTypeMiddleware
{
    public function handle(Request $request, Closure $next, ...$types)
    {
        $user = $request->user();

        if ($user && in_array($user->usertype, $types)) {
            return $next($request);
        }

        abort(403, 'Unauthorized access.');
    }
}

