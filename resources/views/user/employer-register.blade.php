@extends('layouts.app')

@section('content')
{{----}}
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Bạn muốn tìm Ứng Viên tiềm năng?</h1>
                <p>Đăng ký tài khoản cho nhà tuyển dụng ngay.</p>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Đăng Ký</div>
                    <form action="{{route('store.employer')}}" method="post">@csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Công Ty</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên">
                                @if($errors->has('name'))
                                    <p class="text-danger">{{$errors->first('name')}}</p>
                                @else<br>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Địa chỉ email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Nhập địa chỉ email">
                            </div>
                            @if($errors->has('name'))
                                <p class="text-danger">{{$errors->first('email')}}</p>
                            @else<br>
                            @endif
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
                            </div>
                            @if($errors->has('name'))
                                <p class="text-danger">{{$errors->first('password')}}</p>
                            @else<br>
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Đăng ký</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
