<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMasterRole
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user has the role "master"
        if (auth()->check() && auth()->user()->role === 'Master') {
            return $next($request);
        }

        // Redirect or perform another action if the user doesn't have the required role
        return redirect('/')->with('error', 'Unauthorized access');
    }
}
