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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra nếu người dùng đã đăng nhập và có usertype là 'user'
        if (Auth::check() && Auth::user()->usertype == 'user') {
            return $next($request);
        }

        // Nếu người dùng không phải là 'user' hoặc chưa đăng nhập, chuyển hướng về trang trước
        return redirect()->back();
    }
}
