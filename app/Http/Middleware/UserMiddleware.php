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
        if($user && $user->role === 'user') {
            return redirect()->route('your_route_here'); // Replace 'your_route_here' with the actual route you want to redirect to
        }
        // * Guest who doesn't have an account can still using without an account
        return $next($request);
    }
}
