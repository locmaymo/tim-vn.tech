<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //    hàm này để hiển thị form đăng nhập
    public function login()
    {
        return view('user.login');
    }

    // hàm này để hiển thị form đăng ký cho ứng viên
    public  function createTim()
    {
        return view('user.tim-register');
    }

//    hàm lưu thông tin đăng ký của ứng viên
    public function storeTim(RegistrationFormRequest $request)
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type' => 'employee',
        ]);

        Auth::login($user);

        $user->sendEmailVerificationNotification();

        return redirect()->route('login')->with('success', 'Đăng ký thành công');
    }

//    hàm này để hiển thị form đăng ký cho nhà tuyển dụng
    public function createEmployer()
    {
        return view('user.employer-register');
    }


//    hàm lưu thông tin nhà tuyển dụng
    public function storeEmployer(RegistrationFormRequest $request)
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type' => 'employer',
            'user_trial' => now() -> addWeek()
        ]);

        Auth::login($user);

        $user->sendEmailVerificationNotification();

        return redirect()->route('login')->with('success', 'Đăng ký thành công');
    }

//    hàm xử lý đăng nhập
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        return 'Sai email hoặc mật khẩu';
    }
//    hàm xử lý đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

