<?php

namespace App\Http\Controllers;

use App\Http\Middleware\isPremiumUser;
use App\Http\Requests\JobEditFormRequest;
use App\Http\Requests\JobPostFormRequest;
use App\Models\Listing;
use App\Post\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostJobController extends Controller
{
    protected $job;
//    public function __construct(JobPost $job)
//    {
//        $this->job = $job;
//        $this->middleware('auth');
//        $this->middleware(isPremiumUser::class)->only('create', 'store');
//    }

    public function create()
    {

        return view('job.create');
    }

    public function index()
    {
        $jobs = Listing::where('user_id', auth()->user()->id)->get();
        return view('job.index', compact('jobs'));
    }
//    public function store(JobPostFormRequest $request){
//        $this->job->store($request);
//        return back()->with('message', 'Đã Tạo Bài Đăng Thành Công!');
//    }

    public function store(Request $request)
    {
       $this->validate($request, [
            'title' => 'required',
            'predes' => 'required',
            'description' => 'required',
            'roles' => 'required',
            'job_type' => 'required',
            'address' => 'required',
            'salary' => 'required',
            'date' => 'required',
            'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imgPath = $request->file('feature_image')->store('images', 'public');
        $post = new Listing;
        $post->feature_image = $imgPath;
        $post->user_id = auth()->user()->id;
        $post->title = $request->title;
        $post->predes = $request->predes;
        $post->description = $request->description;
        $post->roles = $request->roles;
        $post->job_type = $request->job_type;
        $post->address = $request->address;
        $post->salary = $request->salary;
        $post->application_close_date = \Carbon\Carbon::createFromFormat('m/d/Y', $request['date'])->format('Y-m-d');
        $post->slug = Str::slug($request->titile). '.'. Str::uuid();
        $post->save();



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


}
