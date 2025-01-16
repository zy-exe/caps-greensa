<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GuestMustLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('guest')->check()) {
            return $next($request);
        }

        return redirect('/login')->withErrors('Login dulu bos!');
    }
}
