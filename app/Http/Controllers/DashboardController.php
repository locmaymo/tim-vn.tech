<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {

//        lấy ra số lượng job của user và đếm số lượng user đã ứng tuyển
       $listings = Listing::withCount('users')->where('user_id', auth()->user()->id)->get();

//        lấy ra số lượng job của user và lấy thông tin các user đã ứng tuyển
        $shortlists = Listing::with('users')->where('user_id', auth()->user()->id)->get();

//        đếm số lượng user đã ứng tuyển chưa được shortlist
        $count = 0;
        foreach ($shortlists as $shortlist) {
            foreach ($shortlist->users as $user) {
                if($user->pivot->shortlisted == false)
                    $count++;
            }
        }

        $user = Auth::user();
        $count2 = 0;
        if($user->profile_pic != null)
            $count2++;
        if($user->resume != null)
            $count2++;
        if($user->hasVerifiedEmail())
            $count2++;
        if($user->about != null)
            $count2++;



////        đếm các user đang đợi được shortlist
//     return   $users = User::whereHas('listings', function ($query) {
//            $query->where('user_id', auth()->user()->id)->where('shortlisted', true);
//        })->get();

//        lấy ra tất cả các job của user
         $jobs = Listing::where('user_id', Auth::user()->id)->get();


//         ở màn hình của employee sẽ lấy tất cả jobs gần nhât mà user đã ứng tuyển để phân trang
        $jobs_applied = User::where('id', Auth::user()->id)->with('listings')->first();
        $jobs_applied = $jobs_applied->listings()->get();



        return view('dashboard', compact('listings', 'jobs', 'count', 'count2' , 'jobs_applied' ));
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


    public function mail(Request $request)
    {
        $user = Auth::user();
        if($user->mail == true){
            $user->mail = false;
            $user->save();
            return redirect()->back()->with('message', 'Đã tắt nhận mail, bạn sẽ không còn nhận được mail khi có nhà tuyển dụng chấp nhận bạn');
        }
        $user->mail = true;
        $user->save();
        return redirect()->back()->with('message', 'Đã bật nhận mail, bạn sẽ nhận được mail khi có nhà tuyển dụng chấp nhận bạn');
    }



}
