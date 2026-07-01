<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Block banned customers from accessing user-protected routes
        if ($user && $user->is_banned) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')
                ->withErrors(['email' => 'Your account has been suspended. Please contact support.']);
        }

        // Only allow authenticated users (not admins) through user middleware
        if ($user && $user->role === 'customer') {
            return $next($request);
        }

        // Unauthenticated users — redirect to login
        if (!$user) {
            return redirect()->route('login');
        }

        // Admins trying to access user routes — redirect to admin dashboard
        return redirect()->route('admin.dashboard');
    }
}
