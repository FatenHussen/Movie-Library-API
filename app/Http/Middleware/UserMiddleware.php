<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        // التحقق مما إذا كان المستخدم مسجل الدخول
        if (Auth::check() && Auth::user()->is_admin == false) {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized: Admin access restricted'], 403);
    }
}
