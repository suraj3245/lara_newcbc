<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class EnsureStudentIsAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Implement your logic to check if the student is authenticated
        // For example, checking if a student is logged in
        if (!Auth::guard('student')->check()) {
            return response()->json(['message' => 'Unauthorized Access'], 401);
        }

        return $next($request);
    }
}
