<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthCheck
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('login'); // Redirect to the login route
        }

        return $next($request);
    }
}
