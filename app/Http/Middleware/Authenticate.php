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
        if (!$request->expectsJson()) {
            // If the user is not authenticated, redirect them to the login page
            return route('login');
        }

        // If the user is authenticated, determine their category and redirect accordingly
        $user = $request->user();
        if ($user && $user->category == 1) {
            return route('admin.dashboard');
        } elseif ($user && $user->category == 2) {
            return route('student.dashboard');
        } elseif ($user && $user->category == 3) {
            return route('teacher.dashboard');
        }

        // If no category is matched, redirect to a default route
        return route('login');
    }
}
