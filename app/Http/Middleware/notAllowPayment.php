<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class notAllowPayment
{
//    hàm này để không cho user thanh toán lần 2
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->billing_ends > date('Y-m-d'))
        {
            return redirect()->route('dashboard')->with('error', 'Bạn đang có gói thành viên tồn tại');
        }
        return $next($request);
    }
}
