<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
//    hàm này để hiển thị trang dashboard
    public function index()
    {
            return view('dashboard');
    }

    public function verify()
    {
        return view('user.verify');
    }

    public function resend(Request $request)
    {
        $user = Auth::user();

        if($user->hasVerifiedEmail()){
            return redirect() -> route('home') -> with('success', 'Email của bạn đã được xác minh');
        }

        $user -> sendEmailVerificationNotification();

        return back() ->with('success', 'Email xác minh đã được gửi');
    }
}
