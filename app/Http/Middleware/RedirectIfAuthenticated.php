<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     * 
     * Security: When accessing login/register pages, if a user is already logged in,
     * log them out first. This prevents a new user on a shared device from
     * accessing another user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Security improvement: Log out the existing user when someone 
                // explicitly navigates to login/register page
                // This ensures a new user doesn't accidentally access another account
                Auth::guard($guard)->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                // Redirect to login page with a message
                return redirect()->route('login')->with('info', 'Sesi sebelumnya telah diakhiri. Silakan login kembali.');
            }
        }

        return $next($request);
    }
}

