@extends('layouts.app')

@section('content')
{{----}}
@include('message')
<div class="container mt-5">
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-md-6">
            <div class="card shadow border-0" style="border-radius: 55px">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-3 text-center">
                            <h2 class="fw-bold">Xác Nhận Địa Chỉ Email</h2>
                        </div>
                        <div class="col-11 mb-4 text-center">
                                <p class="text-danger">Hãy xác nhận địa chỉ email trong hộp thư của bạn trước!</p>
                            <a class="btn btn-primary container-fluid" href="{{route('resend.email')}}" style="border-radius: 40px" >Gửi lại email xác minh</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
