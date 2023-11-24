<?php

namespace App\Http\Controllers;

use App\Mail\ShortlistMail;
use App\Models\Listing;
use App\Models\User;

use Illuminate\Support\Facades\Mail;


class ApplicantController extends Controller
{
    public function index()
    {
        //        lấy ra số lượng job của user và lấy thông tin các user đã ứng tuyển
        $shortlists = Listing::latest()->with('users')->where('user_id', auth()->user()->id)->get();

//        lấy ra số lượng user chưa được shortlist trong các job vừa lấy và lưu vào mảng $counts
        $counts = [];
        foreach ($shortlists as $shortlist) {
            $count = 0;
            foreach ($shortlist->users as $user) {
                if($user->pivot->shortlisted == false)
                    $count++;
            }
            array_push($counts, $count);
        }

        $listings = Listing::latest()->withCount('users')->where('user_id', auth()->user()->id)->get();

//cho count vừa rồi vào mảng $listings
        foreach ($listings as $key => $listing) {
            $listing->count = $counts[$key];
        }

        return view('applicants.index', compact('listings', 'shortlists'));
    }

    public function view(Listing $listing)
    {
        if($listing->user_id != auth()->user()->id){
            abort(403);
        }
       $listing = Listing::with('users')->where('slug', $listing->slug)->first();

//        lấy ra 6 users trong $listing để phân trang
        $users = $listing->users()->paginate(6);

        return view('applicants.view', compact('listing', 'users'));
    }

    public function shortlist($listingId, $userId)
    {
        $company_name = auth()->user()->name;
        $company_email = auth()->user()->email;

        $listing = Listing::find($listingId);
        $user = User::find($userId);
        if($listing){
            $listing->users()->updateExistingPivot($userId, ['shortlisted' => true]);
//            kiểm tra xem ứng viên đó trong db trường mail có true hay không nếu có thì gửi mail
            if($user->mail == true){
                Mail::to($user->email)->queue(new ShortlistMail($user->name, $listing->title, $company_name, $company_email));
            }
            return redirect()->back()->with('message', 'Đã thêm vào danh sách');
        }
        return redirect()->back();
    }

    public function apply($listingId)
    {
        $user = auth()->user();
// synsWithoutDetaching() is a method that syncs the pivot table without removing the existing data. ex: if the user has already applied for the job, it will not remove the existing data and add the new one.
        $user->listings()->syncWithoutDetaching($listingId);
        return back()->with('message', 'Đã ứng tuyển');

    }


}
