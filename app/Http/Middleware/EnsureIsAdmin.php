<?php
namespace App\Http\Middleware;

use Closure;

class EnsureIsAdmin
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
