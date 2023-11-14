<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isPremiumUser
{
//    hàm này để kiểm tra xem user có phải là premium user hay không
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->user_trial > date('Y-m-d') || $request->user()->billing_ends > date('Y-m-d'))
        {
            return $next($request);
        }
        return redirect()->route('subscribe')->with('message', 'Bạn cần đăng ký gói thành viên để sử dụng chức năng này');
    }
}
