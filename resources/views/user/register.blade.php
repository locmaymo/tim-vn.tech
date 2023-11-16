@extends('layouts.app')

@section('content')
    {{----}}
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h1>Bạn là nhà tuyển dụng?</h1>
                <a href="{{route('create.employer')}}" class="btn btn-success">Đăng ký nhà tuyển dụng</a>
            </div>
            <div class="col-md-6 text-center">
                <h1>Bạn là ứng viên?</h1>
                <a href="{{route('create.tim')}}" class="btn btn-success">Đăng ký ứng viên</a>
            </div>
        </div>
    </div>
@endsection
