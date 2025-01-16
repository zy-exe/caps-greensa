<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMustLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        return redirect('/admin-login')->withErrors('Login dulu bos!');
    }
}
