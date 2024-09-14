<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Jika pengguna bukan admin, redirect ke halaman tertentu
        if (Auth::user()->role == "admin") {
            return $next($request);
        }else{
            return redirect('/lates')->with("failed","Anda bukan admin!");
        }
        
    }
}
