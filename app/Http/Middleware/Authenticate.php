<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            /** @var Redirector $redirector */
            $redirector = app(Redirector::class);
            return $redirector->route('login')->withErrors(['error' => 'Authentication is required']);
        }

        return null;
    }
}
