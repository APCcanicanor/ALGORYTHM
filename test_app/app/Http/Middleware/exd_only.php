<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeacherOrExecutive
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && ($request->user()->role === 'executive')) {
            return $next($request);
        }

        // If the user is not an executive or teacher, redirect to the dashboard
        return redirect('/dashboard')->with('error', 'You do not have permission to access this page.');
    }
}
