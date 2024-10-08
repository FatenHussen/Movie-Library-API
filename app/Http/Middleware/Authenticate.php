<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
    }
    protected function unauthenticated($request, array $guards)
{
    throw new \Illuminate\Auth\AuthenticationException(
        'Unauthenticated.', $guards, $this->redirectTo($request)
    );
}

    
}
