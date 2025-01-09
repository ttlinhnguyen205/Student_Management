<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra nếu người dùng đã đăng nhập và có quyền admin
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            return $next($request);
        }

        // Chuyển hướng người dùng không phải admin về trang chủ hoặc trang lỗi
        return redirect()->route('home');  // Thay đổi 'home' nếu cần
    }
}
