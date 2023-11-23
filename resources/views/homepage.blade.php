@extends('layouts.app')

@section('content')
    <div class="container">
{{--        hero--}}
        <div class="card bg-secondary border-0 mt-5 shadow-none " style="border-radius: 50px" >
                <img class="img-fluid float-right"  src="{{asset('img/banner.png')}}" alt="">
            <div class="row  p-4 p-sm-5" style=" position: absolute;">
                <div class=" col-7 mt-lg-4 mx-lg-5 mx-3 my-sm-0 my-3 mb-sm-5 mb-0">
{{--                    tiêu đề to font chữ Inter--}}
                    <p class="fw-bold" style="font-family: Inter, sans-serif; font-size: 4vw;">Kết Nối Với Sự Thành Công</p>
                    <p style=" font-size: 2vw;" >Tự do chọn lựa công việc, khám phá sứ mệnh nghề nghiệp và tiến gần hơn đến mục tiêu sự nghiệp lớn lao của bạn.</p>

                </div>
                <div class="col-5 mb-lg-4 mx-lg-5 mx-3 ">
                    <a href="{{route('register')}}" class="btn btn-danger d-block fw-bold"  style="font-size: 4vw; border-radius: 30px">Đăng Ký</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card border-0 shadow-lg text-center" style="margin-top: -4vw; border-radius: 40px; height: 11vw">
                    <div class="card-body " style="padding-top: 2vw">

                        <div class="row justify-content-around">

                            <div class="col-3 text-start ">
                                <p class="m-0" style="font-size: 2vw; color: #838180">
                                    Ứng viên
                                </p>
                                <p class="text-dark fw-bold" style="font-family: Inter, sans-serif;font-size: 3vw">{{$countEmployee}}</p>

                            </div>



                            <div class="col-3 text-start">
                                <p class="m-0" style="font-size: 2vw; color: #838180">
                                    Công Việc
                                </p>
                                <p class="text-dark fw-bold" style="font-family: Inter, sans-serif;font-size: 3vw">{{$count}}</p>
                            </div>

                            <div class="col-3 text-start">
                                <p class="m-0" style="font-size: 2vw; color: #838180">
                                    Công Ty
                                </p>
                                <p class="text-dark fw-bold"  style="font-family: Inter, sans-serif;font-size: 3vw">{{$countCompany}}</p>
                            </div>

                        </div>
                    </div>
            </div>
        </div>


    </div>

{{--        công việc--}}
        <h1 class="fw-bold mt-5" id="res" >Công Việc Mới Nhất</h1>


{{--        tìm kiếm công việc và lọc theo địa chỉ--}}
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-10">
                <div class="card shadow border-0" style="border-radius: 55px">
                    <div class="card-body">
                        <form action="{{route('job.search')}}#res" method="get">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-4 col-11 mt-3 mt-lg-0">
                                <input type="text" name="search" class="form-control shadow-none" placeholder="Tìm Kiếm Công Việc" style="border-radius: 30px" value="{{ $search }}">
                            </div>
                            <div class="col-lg-3 col-11 mt-3 mt-lg-0">
                                <input type="text" name="address" class="form-control shadow-none" placeholder="Lọc Theo địa chỉ" style="border-radius: 30px" value="{{ $address }}">
                            </div>
                            <div class="col-lg-2 col-11 mt-3 mt-lg-0"><div class="form-group">
                                    <select name="job_type" class="form-control shadow-none" style="border-radius: 30px">
                                        <option value="">Loại công việc</option>
                                        <option {{ $jobType == 'Fulltime' ? 'selected' : '' }}>Fulltime</option>
                                        <option {{ $jobType == 'Parttime' ? 'selected' : '' }}>Parttime</option>
                                        <option {{ $jobType == 'Từ Xa' ? 'selected' : '' }}>Từ Xa</option>
                                        <option {{ $jobType == 'Hợp Đồng' ? 'selected' : '' }}>Hợp Đồng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-11 mt-3 mt-lg-0"><div class="form-group">
                                    <select name="salary_range" class="form-control shadow-none" style="border-radius: 30px">
                                        <option value="">Mức lương</option>
                                        <option {{ $salaryRange == 'Dưới 5 triệu' ? 'selected' : '' }}>Dưới 5 triệu</option>
                                        <option {{ $salaryRange == '5 - 10 triệu' ? 'selected' : '' }}>5 - 10 triệu</option>
                                        <option {{ $salaryRange == '10 - 15 triệu' ? 'selected' : '' }}>10 - 15 triệu</option>
                                        <option {{ $salaryRange == 'Trên 15 triệu' ? 'selected' : '' }}>Trên 15 triệu</option>
                                        <option {{ $salaryRange == 'Thỏa Thuận' ? 'selected' : '' }}>Thỏa Thuận</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-1 d-flex justify-content-center mt-3 mt-lg-0">
                                <button type="submit"  class="btn btn-primary shadow-none" style="border-radius: 30px"><i class="fa-solid fa-search fa-xs"></i></button>
                            </div>




                        </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
{{--        hiển thị công việc--}}

        <div class="row d-flex justify-content-center">

            @foreach($jobs as $job)

                <div class="col-10 col-md-6 col-lg-3 mt-4 " >
                    <div class="card " style="border-radius: 55px; padding: 15px">

                        <div class="card-body">
                            <a href="{{route('job.show', $job->slug)}}" style="text-decoration: none; color: #0C3149">
                                <div class="square">
                                    <div class="row " >
                                        <div class="col-4">
                                            <img class="mb-2" src="{{asset('storage/'.$job->profile->profile_pic)}}" style="width: 53px; border-radius: 15px; border: 1px solid black" alt="">

                                            @if($job->profile->plan == "yearly")
                                                <i class="fa-solid fa-circle fa-lg " style="color: #ffffff; position: absolute; top: 77px; left: 70px"></i>
                                                <i class="fa-solid fa-circle-check fa-lg " style="color: #5084dc; position: absolute; top:77px; left: 70px"></i>
                                            @endif
                                            <button class="btn btn-success py-0 " style="height: 27px; border-radius: 4px; font-size: 15px" >  <p class="text-truncate m-0 p-0">
                                                    <i class="fa-solid fa-coins fa-sm m-0"></i>
{{--                                                    Nếu salary là dạng dữ liệu number--}}
                                                    @if(is_numeric($job->salary))
{{--                                                       sư dụng if hiển thị nhiều nhất là 6 chữ số nếu hơn sáu 6 chữ số thì xóa 6 chữ số cuối đi sau đó thêm chữ "Tr" vào sau cùng--}}
                                                        @if(strlen($job->salary) > 7)
                                                            {{number_format(substr($job->salary, 0, -6))}} Tr vnđ
                                                        @else
                                                            {{number_format($job->salary)}} vnđ
                                                        @endif
                                                    @else
                                                        Thỏa Thuận
                                                    @endif

                                                </p>  </button>
                                        </div>
                                        <div class="col-8 text-end">
                                            <p class="fw-bold mb-1">{{$job->profile->name}}</p>
                                            <p class="mb-1"><i class="fa-solid fa-location-dot fa-xs"></i> {{$job->address}} </p>

                                            @if($job->job_type == 'Fulltime')
                                                <button class="btn btn-primary py-0 " style="height: 27px; border-radius: 4px; font-size: 15px" > <i class="fa-solid fa-calendar fa-xs"></i> {{$job->job_type}} </button>
                                            @elseif($job->job_type == 'Parttime')
                                                <button class="btn btn-dark py-0 " style="height: 27px; border-radius: 4px; font-size: 15px" > <i class="fa-solid fa-calendar fa-xs"></i> {{$job->job_type}} </button>
                                            @elseif($job->job_type == 'Từ Xa')
                                                <button class="btn btn-info py-0 " style="height: 27px; border-radius: 4px; font-size: 15px" > <i class="fa-solid fa-calendar fa-xs"></i> {{$job->job_type}} </button>
                                            @elseif($job->job_type == 'Hợp Đồng')
                                                <button class="btn btn-danger py-0 " style="height: 27px; border-radius: 4px; font-size: 15px" > <i class="fa-solid fa-calendar fa-xs"></i> {{$job->job_type}} </button>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                                <div class="row mt-4 align-content-end " style=" padding-left: 29px; padding-right: 29px; padding-bottom: 10px; position: absolute; bottom: 0; left: 0; right: 0">
                                    <div class="col ">
                                        <p class="fw-bold">{{$job->title}}</p>
                                        <p class="" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;">
                                            {{$job->predes}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
{{--        phân trang sử dụng file bootstrap-5.blade.php nếu đang ở chế độ lọc và tìm kiếm thì phải next page đúng link kèm lọc với tìm kiếm--}}
        <div class="d-flex justify-content-center mt-5">
            @if($search || $address || $jobType || $salaryRange)
                {{$jobs->appends(['search' => $search, 'address' => $address, 'job_type' => $jobType, 'salary_range' => $salaryRange])->links('vendor.pagination.bootstrap-5')}}
            @else
                {{$jobs->links('vendor.pagination.bootstrap-5')}}
            @endif
        </div>
    </div>
@endsection
