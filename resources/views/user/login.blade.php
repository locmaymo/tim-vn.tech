@extends('layouts.app')

@section('content')
{{----}}
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @include('message')
                <div class="card">
                    <div class="card-header">Đăng Nhập</div>
                    <form action="" method="post">@csrf
                        <div class="card-body">
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
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
