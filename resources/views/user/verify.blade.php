@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            @include('message')
            <div class="card">
                <div class="card-header">Xác nhận địa chỉ email</div>
                <div class="card-body">
                    <p>Hãy xác nhận địa chỉ email trong hộp thư của bạn trước</p>

                    <a href="{{route('resend.email')}}">Gửi lại email xác minh</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
