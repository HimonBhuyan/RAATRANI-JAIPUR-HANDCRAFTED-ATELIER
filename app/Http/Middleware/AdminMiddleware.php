<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in with admin credentials to access the management portal.');
        }

        if (! Auth::user()->is_admin) {
            abort(403, 'Unauthorized access: Admin privileges required.');
        }

        return $next($request);
    }
}
