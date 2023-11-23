@extends('layouts.app')

@section('content')
{{--    <div class="bgnew" style="--}}
{{--				background-image: linear-gradient(to right bottom, #fdf7f0, #f6d8c2, #f2b69b, #ee9181, #e76972);--}}

{{--			"></div>--}}
    <div class="container ">
        <div class="row mt-5 ">
            @if(Session::has('message'))
                <div class="alert alert-warning">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="row d-flex justify-content-center m-0">
                <div class="col-11 col-md-7 col-lg-5 col-xl-3 mt-4">
                    <div class="card shadow-none" style="border-radius: 30px">
                        <div class="row m-4 ">
                            <div class="col-md-12 p-3">
                                <i class="fa-solid fa-user fa-2xl"></i>
                            </div>
                            <div class="col-md-12">
                                <h3 class="fw-bold" style="font-family: Inter, sans-serif">Miễn Phí</h3>
                            </div>
                            <div class="col-md-12">
                                <p>Gói cho người mới</p>
                            </div>

                            <div class="col-3 ">
                                <p class=" mb-0 " style="font-size: 50px;">0</p>
                            </div>
                            <div class="col-5 p-0 d-flex align-items-end">
                                <p class="mb-4">vnđ</p><p class=" mb-0" style="font-family:'Calibri Light',sans-serif ;font-size: 40px;">/</p> <p class=" mb-1" style="font-size: 25px">Tháng</p>
                            </div>

                            <hr class="mt-4">


{{--                            các benefit--}}
                            <div class="col-md-12 mt-3">
                                <i class="fa-solid fa-check" style="color: #15b96c; margin-right: 5px" ></i> <span class="fw-bold">Tặng 7 ngày dùng thử</span>
                            </div>
                            <div class="col-md-12 mt-3">
                                <i class="fa-solid fa-check" style="color: #15b96c; margin-right: 5px"></i> <span class="fw-bold">Người dùng ứng viên</span>
                            </div>
                            <div class="col-md-12 mt-3">
                                <i class="fa-solid fa-check" style="color: #15b96c; margin-right: 5px"></i> <span class="fw-bold">Sử dụng cơ bản</span>
                            </div>

                            <div class="col-md-12 mt-4 p-0 pt-2">
                                <a class="btn  disabled  container-fluid" style="border-color: #7e8085;background-color: #e0dada;border-radius: 300px">Miễn Phí</a>
                            </div>
                        </div>
                    </div>
                </div>
{{--    gói tháng   --}}
                <div class="col-11 col-md-7 col-lg-5 col-xl-3 mt-4">
                    <div class="card cardstand" style="border-radius: 30px">
                        <div class="row m-4 ">
                            <div class="col-md-12 p-3">
                                <i class="fa fa-bolt fa-2xl"></i>
                            </div>
                            <div class="col-md-12">
                                <h3 class="fw-bold" style="font-family: Inter, sans-serif">Tiêu Chuẩn</h3>
                            </div>
                            <div class="col-md-12">
                                <p>Gói chuyên nghiệp</p>
                            </div>

                            <div class="col-7 ">
                                <p class=" mb-0" style="font-size: 50px">100K</p>
                            </div>
                            <div class="col-5 p-0 d-flex align-items-end">
                                <p class="mb-4">vnđ</p><p class=" mb-0" style="font-family:'Calibri Light',sans-serif ;font-size: 40px;">/</p> <p class=" mb-1" style="font-size: 20px">Tháng</p>
                            </div>

                            <hr class="mt-4">


                            {{--                            các benefit--}}
                            <div class="col-md-12 mt-3">
                                <i class="fa-solid fa-check" style="color: #15b96c; margin-right: 5px"></i> <span class="fw-bold">30 ngày sử dụng</span>
                            </div>
                            <div class="col-md-12 mt-3">
                                <i class="fa-solid fa-check" style="color: #15b96c; margin-right: 5px" ></i> <span class="fw-bold">Toàn bộ chức năng</span>
                            </div>
                            <div class="col-md-12 mt-3">
                                <i class="fa-solid fa-check" style="color: #15b96c; margin-right: 5px"></i> <span class="fw-bold">Không giới hạn bài đăng</span>
                            </div>

                            <div class="col-md-12 mt-4 p-0 pt-2">
                                <form action="{{route('pay.monthly')}}" method="post">@csrf
                                <button class="btn btn-success container-fluid" name="redirect" type="submit" style="border-radius: 300px">100.000 vnđ/Tháng</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

{{--    gói năm   --}}
                <div class="col-11 col-md-7 col-lg-5 col-xl-3 mt-4">
                    <div class="card bg-dark  border-0  cardpre" style="border-radius: 30px; color: #e4ebef;}">
                        <div class="row m-4 ">
                            <div class="col-md-12 p-3">
                                <i class="fa-solid fa-crown fa-2xl"></i>
                            </div>
                            <div class="col-md-12">
                                <h3 class="fw-bold" style="font-family: Inter, sans-serif">Cao Cấp</h3>
                            </div>
                            <div class="col-md-12">
                                <p>Gói dành cho doanh nghiệp</p>
                            </div>

                            <div class="col-7 ">
                                <p class=" mb-0" style="font-size: 50px">799K</p>
                            </div>
                            <div class="col-5 p-0 d-flex align-items-end">
                                <p class="mb-4">vnđ</p><p class=" mb-0" style="font-family:'Calibri Light',sans-serif ;font-size: 40px;">/</p> <p class=" mb-1" style="font-size: 25px">Năm</p>
                            </div>

                            <hr class="mt-4">


                            {{--                            các benefit--}}
                            <div class="col-md-12 mt-3">
                                <i class="fa-solid fa-check" style="color: #15b96c; margin-right: 5px" ></i> <span class="fw-bold">1 năm sử dụng cao cấp</span>
                            </div>
                            <div class="col-md-12 mt-3">
                                <i class="fa-solid fa-check" style="color: #15b96c; margin-right: 5px"></i> <span class="fw-bold">Toàn bộ chức năng</span>
                            </div>
                            <div class="col-md-12 mt-3">
                                <i class="fa-solid fa-check" style="color: #15b96c; margin-right: 5px"></i> <span class="fw-bold">Không giới hạn bài đăng</span>
                            </div>
                            <div class="col-md-12 mt-3">
                                <i class="fa-solid fa-check" style="color: #15b96c; margin-right: 5px"></i> <span class="fw-bold">Nhân viên hỗ trợ 24/7</span>
                            </div>
                            <div class="col-md-12 mt-3">
                                <i class="fa-solid fa-check" style="color: #15b96c; margin-right: 5px"></i> <span class="fw-bold">Dấu tick độc quyền</span>
                                <i class="fa-solid fa-diamond fa-lg" style="color: #ffffff;  position: absolute; bottom: 107px; left: 218px"></i>
                                <i class="fa-solid fa-circle-check fa-lg" style="color: #5084dc;  position: absolute; bottom: 107px; left: 218px"></i>
                            </div>
                            <div class="col-md-12 mt-4 p-0 pt-2">
                                <form action="{{route('pay.yearly')}}" method="post">@csrf
                                <button name="redirect" class="btn btn-info  container-fluid" style="border-radius: 300px">799.000 vnđ/Năm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
