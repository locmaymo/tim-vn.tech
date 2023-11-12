@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            Hello,  {{auth()->user()->name}}
{{--            show trial date--}}
            @if(auth()->user()->user_trial != null)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Thông Báo</div>
                        <div class="card-body">
                            <p>Bạn đã đăng ký dùng thử tới ngày {{auth()->user()->user_trial}}.</p>
                            <p>Bạn còn 2 ngày để sử dụng dịch vụ của chúng tôi.</p>
                            <p>Nếu bạn muốn tiếp tục sử dụng dịch vụ của chúng tôi, vui lòng thanh toán để trở thành thành viên.</p>
                            <p>Chúng tôi sẽ gửi mail cho bạn để thông báo trước 1 ngày về việc kết thúc thời gian dùng thử.</p>
                        </div>
                    </div>
                </div>
                <div class="container mt-5">
                    <div class="row justify-content-center">

                        <div class="col-md-3">
                            <div class="card-counter primary">
                                <p class="text-center mt-3 lead">
                                    User profile
                                </p>
                                <button class="btn btn-primary float-end">View</button>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card-counter danger">
                                <p class="text-center mt-3 lead">
                                    Post job
                                </p>
                                <button class="btn btn-primary float-end">View</button>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card-counter success">
                                <p class="text-center mt-3 lead">
                                    All jobs
                                </p>
                                <button class="btn btn-primary float-end">View</button>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card-counter info">
                                <p class="text-center mt-3 lead">
                                    Item
                                </p>
                                <button class="btn btn-primary float-end">View</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <style>
        .card-counter {
            box-shadow: 2px 2px 10px #DADADA;
            margin: 5px;
            padding: 20px 10px;
            background-color: #fff;
            height: 130px;
            border-radius: 5px;
            transition: .3s linear all;
        }
        .card-counter.primary {
            background-color: #007bff;
            color: #FFF;
        }
        .card-counter.danger {
            background-color: #ef5350;
            color: #FFF;
        }
        .card-counter.success {
            background-color: #66bb6a;
            color: #FFF;
        }
        .card-counter.info {
            background-color: #26c6da;
            color: #FFF;
        }
    </style>
@endsection
