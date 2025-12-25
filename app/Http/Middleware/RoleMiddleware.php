<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        $userRole = $request->user()->role;
        
        if (!$userRole) {
            abort(403, 'Anda tidak memiliki role yang ditetapkan.');
        }

        // Super admin always has access
        if ($userRole->slug === 'super-admin') {
            return $next($request);
        }

        // Check if user has one of the required roles
        if (!in_array($userRole->slug, $roles)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
