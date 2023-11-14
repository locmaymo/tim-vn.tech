<?php

namespace App\Http\Controllers;

use App\Http\Middleware\isPremiumUser;
use App\Http\Requests\JobEditFormRequest;
use App\Http\Requests\JobPostFormRequest;
use App\Models\Listing;
use App\Post\JobPost;


class PostJobController extends Controller
{
    protected $job;
    public function __construct(JobPost $job)
    {
        $this->job = $job;
        $this->middleware('auth');
        $this->middleware(isPremiumUser::class)->only('create', 'store');
    }

    public function create()
    {

        return view('job.create');
    }

    public function index()
    {
        $jobs = Listing::where('user_id', auth()->user()->id)->get();
        return view('job.index', compact('jobs'));
    }
    public function store(JobPostFormRequest $request){
        $this->job->store($request);
        return back()->with('message', 'Đã Tạo Bài Đăng Thành Công!');
    }

    public function edit(Listing $listing)
    {
        return view('job.edit',compact('listing'));
    }

    public function update($id, JobEditFormRequest $request)
    {
        $this->job->updatePost($id, $request);

        return back()->with('message', 'Đã Lưu Thành Công!');
    }

    public function destroy($id)
    {
        Listing::find($id)->delete();
        return back()->with('success', 'Đã Xóa Thành Công!');
    }
//    public function show($id)

}
