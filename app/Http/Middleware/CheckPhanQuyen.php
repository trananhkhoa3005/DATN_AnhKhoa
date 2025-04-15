<?php

namespace App\Http\Middleware;

use Closure, Session, Redirect;
use Illuminate\Http\Request;

class CheckPhanQuyen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Kiểm tra xem session 'phanquyen' có tồn tại không
        if (Session::has('phanquyen')) {
            $phanquyen = Session::get('phanquyen');

            // Kiểm tra quyền của người dùng
            if ($phanquyen == 0) {
                // Nếu là admin, cho phép truy cập
                return $next($request);
            } else {
                // Nếu không phải admin, chuyển hướng về trang không được phép
                return redirect()->route('home.index')->with('user', 'Đăng nhập trang bán hàng');
            }
        } else {
            // Nếu không có session 'phanquyen', chuyển hướng về trang đăng nhập
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập');
        }
    }
}
