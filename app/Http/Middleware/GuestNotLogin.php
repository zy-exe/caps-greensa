<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GuestNotLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('guest')->check()) {
            return redirect('/')->withErrors('Sampean wes login!');
        }

        return $next($request);
    }
}
