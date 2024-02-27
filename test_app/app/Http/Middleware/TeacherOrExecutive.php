<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeacherOrExecutive
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && ($request->user()->role === 'executive' || $request->user()->role === 'teacher')) {
            return $next($request);
        }

        // If the user is not an executive, return a response with JavaScript code to show a popup
        $popupMessage = "You do not have permission to access this page.";
        return response()->view('popup', compact('popupMessage'));
    }
}
