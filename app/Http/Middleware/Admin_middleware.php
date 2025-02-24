<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class Admin_middleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->get('authenticated_admin')) {
            // Foydalanuvchi admin emas, login sahifasiga yo'naltiramiz
            return redirect()->route('login');
        }

        return $next($request);
    }
}

