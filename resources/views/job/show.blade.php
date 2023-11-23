@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
            <strong>Thành Công!</strong> {{session()->get('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif
    <img src="{{Storage::url($listing->feature_image)}}" style="width: 100%; height: 17vw;"  alt="">

<div class="container">

    <div class=" row">
        <div class="col-12 d-flex justify-content-center justify-content-md-start">
            <img class=" border-1" style="margin-top: -3vw;border-radius: 100px; height: 150px; box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;" src="{{Storage::url($listing->profile->profile_pic)}}">
        </div>

        <div class="col-12 d-flex  justify-content-center justify-content-md-start">
            <p class=" mt-4" style="font-size: 35px; font-family: 'iCiel Gotham Medium', sans-serif;">{{$listing->profile->name}}</p>

{{--            kiểm tra nếu user có yearly plan thì thêm icon tick--}}
            @if($user->plan == "yearly")
                <i class="fa-solid fa-circle-check fa-xl d-flex align-items-center mx-3 mt-2" style="color: #5084dc" ></i>
            @endif
        </div>

    </div>

{{--    content--}}
    <h1 class="fw-bold mt-5" style="font-family: Inter, sans-serif">{{$listing->title}}</h1>
    @if($listing->job_type == "Fulltime")
        <button class="btn btn-primary py-0 " style="height: 27px; border-radius: 4px; margin-right: 4px; font-size: 15px" > <i class="fa-solid fa-calendar fa-xs"></i> {{$listing->job_type}} </button>
    @elseif( $listing->job_type == "Parttime")
        <button class="btn btn-dark py-0 " style="height: 27px; border-radius: 4px; margin-right: 4px; font-size: 15px" > <i class="fa-solid fa-calendar fa-xs"></i> {{$listing->job_type}} </button>
    @elseif( $listing->job_type == "Từ Xa")
        <button class="btn btn-info py-0 " style="height: 27px; border-radius: 4px; margin-right: 4px; font-size: 15px" > <i class="fa-solid fa-calendar fa-xs"></i> {{$listing->job_type}} </button>
    @elseif( $listing->job_type == "Hợp Đồng")
        <button class="btn btn-danger py-0 " style="height: 27px; border-radius: 4px; margin-right: 4px; font-size: 15px" > <i class="fa-solid fa-calendar fa-xs"></i> {{$listing->job_type}} </button>
    @endif
    <button class="btn  py-0 " style="color:white;background-color: #ce9e3a;height: 27px; border-radius: 4px;font-size: 15px;margin-right: 4px;" > <i class="fa-solid fa-location-dot fa-xs"></i> {{$listing->address}} </button>
{{--    hiển thị số ngày còn tại tính từ hiện tại đến application_close_date của $listing--}}

        @if($listing->application_close_date < now())
            <button class="btn  py-0 " style="color:white;background-color: #535454;height: 27px; border-radius: 4px;font-size: 15px" > <i class="fa-solid fa-clock fa-xs"></i> Đã Hết Hạn</button>
        @else
            <button class="btn btn-success py-0 " style="height: 27px; border-radius: 4px;font-size: 15px" > <i class="fa-solid fa-clock fa-xs"></i> còn {{now()->diffInDays($listing->application_close_date)}} ngày</button>
        @endif

    <p>{!!$listing->description!!}</p>
    <h4 style="font-family: Inter, sans-serif">Yêu Cầu:</h4>
    <p>{!! $listing->roles !!}</p>

    <h5 class="fw-bold">Mức Lương:
        @if(is_numeric($listing->salary))
                {{number_format($listing->salary)}} vnđ
        @else
            {{$listing->salary}}
        @endif
    </h5>


    @if(auth()->user())
{{--       kiểu tra nếu  $listing->users đã có bảng pivot  --}}
        @if($listing->users->contains(Auth::id()))
            <button class="btn btn-success mt-4" disabled><i class="fa-solid fa-plus" style="color: #ffffff;"></i> Đã Ứng Tuyển</button>
        @else
            @if($listing->user_id == auth()->user()->id)
                <a href="{{route('job.edit', $listing->id)}}" class="btn btn-dark mt-4"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i> Sửa bài</a>
            @endif

            @if(auth()->user()->user_type == "employee")
                @if($listing->application_close_date < now())
                    <button class="btn btn-danger mt-4" disabled><i class="fa-solid fa-plus" style="color: #ffffff;"></i> Đã Hết Hạn</button>
                @else
                    <button class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#applyModal"><i class="fa-solid fa-plus" style="color: #ffffff;" ></i> Ứng Tuyển</button>
                @endif
            @endif
        @endif
    @else

        @if($listing->application_close_date < now())
            <button class="btn btn-danger mt-4" disabled><i class="fa-solid fa-plus" style="color: #ffffff;"></i> Đã Hết Hạn</button>
        @else
            <button  class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#applyModal2"><i class="fa-solid fa-plus" style="color: #ffffff;" ></i> Ứng Tuyển</button>
        @endif
    @endif

{{--    modal xác nhận ứng tuyển--}}
    <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
        <form action="{{route('application.submit', [$listing->id])}}" method="POST">@csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title" id="applyModalLabel">Thông Báo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Xác Nhận Ứng Tuyển Vị Trí: {{$listing->title}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                        <button type="submit" class="btn btn-primary">Xác Nhận</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="applyModal2" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title" id="applyModalLabel">Thông Báo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn Cần Đăng Nhập Để Ứng Tuyển Vị Trí: {{$listing->title}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Không</button>
                        <a href="{{route('login')}}" class="btn btn-dark">Xác nhận</a>
                    </div>
                </div>
            </div>
    </div>

</div>


@endsection
