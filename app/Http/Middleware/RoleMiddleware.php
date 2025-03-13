<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login'); // Redirect to login if not authenticated
        }

        // \Log::info('Current User Role: ' . Auth::user()->id_role);


        if (!in_array(Auth::user()->id_role, $roles)) {
            abort(403, 'Unauthorized'); // Deny access if role is not allowed
        }

        return $next($request);
    }
}
