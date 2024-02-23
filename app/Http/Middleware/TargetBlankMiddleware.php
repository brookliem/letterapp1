<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TargetBlankMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Check if the session variable 'targetBlank' is set to true
        if ($request->session()->get('targetBlank')) {
            // Clear the session variable
            $request->session()->forget('targetBlank');
            // Continue with the request
            return $next($request);
        }

        // If 'targetBlank' is not set or is not true, redirect to '/print'
        return redirect('/print');
    }
}
