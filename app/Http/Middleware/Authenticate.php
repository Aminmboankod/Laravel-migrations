<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    /**
     * Set the locale for the app.
     */
    public function setLocaleApp(Request $request): void
    {
        if (auth()->check()) {
            app()->setLocale(auth()->user()->language);
        }
    }
}
