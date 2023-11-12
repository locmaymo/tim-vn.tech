@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            Hello,  {{auth()->user()->name}}
            @if(auth()->user()->user_trial == null && auth()->user()->billing_ends > now())
                <p>Gói thành viên của bạn sẽ hết hạn vào {{auth()->user()->billing_ends}}</p>
            @endif
{{--            show trial date--}}
            @if(auth()->user()->user_trial != null && auth()->user()->user_trial > now())
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Thông Báo</div>
                        <div class="card-body">
                            <p>Hạn đăng ký dùng thử của bạn tới ngày {{auth()->user()->user_trial}}.</p>
                            <p>Bạn còn  ngày để sử dụng toàn bộ dịch vụ của chúng tôi.</p>
                            <p>Nếu bạn muốn tiếp tục sử dụng dịch vụ toàn bộ của chúng tôi, vui lòng đăng ký thành viên.</p>
                            <a href="{{route('subscribe')}}" class="btn btn-primary">Đăng Ký Thành Viên</a>
                        </div>
                    </div>
                </div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger mt-5">
                    {{Session::get('error')}}
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success mt-5">
                    {{Session::get('success')}}
                </div>
            @endif

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
