<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationFormRequest;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //    hàm này để hiển thị form đăng nhập
    public function login()
    {
        return view('user.login');
    }

//    hàm này để hiển thị form chọn người đăng ký
    public function register()
    {
        return view('user.register');
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

        return redirect()->route('verification.notice')->with('success', 'Vui lòng xác minh email để đăng nhập');
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

        return redirect()->route('verification.notice')->with('success', 'Vui lòng xác minh email để đăng nhập');
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
            if (auth()->user()->user_type == 'employer')
                return redirect()->intended('dashboard');
            else if (auth()->user()->user_type == 'employee')
                return redirect()->intended('');
        }
        return 'Sai email hoặc mật khẩu';
    }
//    hàm xử lý đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

//    hàm hiển thị thông tin cá nhân
    public function profile()
    {
        return view('user.profile');
    }

//    hàm cập nhật thông tin cá nhân
    public function updateProfile(Request $request)
    {
        if($request->hasFile('profile_pic')){
            $imagePath = $request->file('profile_pic')->store('images', 'public');
            User::find(auth()->user()->id)->update(['profile_pic' => $imagePath]);
        }
        $request->validate([
            'name' => 'required',
            'about' => 'required',
        ]);

        User::find(auth()->user()->id)->update($request->except('profile_pic'));

        return back()->with('message', 'Đã Cập Nhật Thông Tin Thành Công!');
    }

//    hàm cập nhật mật khẩu
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required',
//            'confirm_password' => 'required|confirmed'
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with(['error','Mật khẩu hiện tại không đúng']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('message', 'Đã Cập Nhật Mật Khẩu Thành Công!');
    }
//    hàm đăng CV cho employee
    public function updateCv(Request $request)
    {
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx'
        ]);

        if($request->hasFile('resume')){
            $cvPath = $request->file('resume')->store('resume', 'public');
            User::find(auth()->user()->id)->update(['resume' => $cvPath]);
        }
        return back()->with('message', 'Đã tải lên CV Thành Công!');
    }
//    hàm hiển thị view đăng CV
    public function cv()
    {
//        không cho emplouer đăng cv
        if(auth()->user()->user_type == 'employer')
            return redirect()->route('dashboard')->with('error', 'Bạn là nhà tuyển dụng, không có quyền truy cập vào trang này');
        return view('user.cv');
    }

//    hàm xem cv đã tải lên
    public function viewCv()
    {
        $path = Storage::path('storage/'.auth()->user()->resume);

        return response()->file($path);
    }

//    hàm hiển thị form tạo cv
    public function createCv()
    {
        return view('user.create-cv');
    }


//    lấy các trường trong form tạo cv và xem trước cv
    public function previewPDF( Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('images', 'public');
            return view('pdf', compact('data', 'path'));
        }
        return view('pdf', compact('data'));

    }


}

