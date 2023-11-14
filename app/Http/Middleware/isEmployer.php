<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isEmployer
{
//    hàm này để kiểm tra xem user có phải là employer hay không
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->user_type === 'employer') {
            return $next($request);
        }
        else{
            abort(401);
        }
    }
}
