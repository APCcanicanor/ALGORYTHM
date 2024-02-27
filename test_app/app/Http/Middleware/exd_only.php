<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class exd_only
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && ($request->user()->role === 'executive')) {
            return $next($request);
        }

        return redirect('/dashboard'); // Redirect to dashboard or any other page
    }
}
