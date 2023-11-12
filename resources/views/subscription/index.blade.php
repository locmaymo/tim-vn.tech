@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row mt-5 ">
            @if(Session::has('message'))
                <div class="alert alert-warning">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="col-md-4 align-self-center d-flex ">
                <div class="card shadow" style="width: 18rem;">
                    <img class="card-img-top" src="https://raw.githubusercontent.com/locmaymo/tim-vn/master/public/image/logo-tim-white.png" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Cơ Bản</h5>
                        <p class="card-text">Sử dụng miễn phí với tính năng cơ bản của Tim-vn.tech</p>
                        <a href="#" class="btn btn-primary disabled">Miễn Phí</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 align-self-center d-flex ">
                <div class="card shadow" style="width: 22rem;">
                    <img class="card-img-top" src="https://raw.githubusercontent.com/locmaymo/tim-vn/master/public/image/logo-tim-white.png" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Cao Cấp</h5>
                        <p class="card-text">Sử dụng full chức năng không giới hạn và được hỗ trợ kĩ thuật 24/7</p>
                        <form action="{{route('pay.yearly')}}" method="post">
                            @csrf
                            <button type="submit" name="redirect" class="btn btn-warning text-white">799.000 VNĐ/Năm</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 align-self-center ">
                <div class="card shadow" style="width: 18rem;">
                    <img class="card-img-top" src="https://raw.githubusercontent.com/locmaymo/tim-vn/master/public/image/logo-tim-white.png" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Tiêu Chuẩn</h5>
                        <p class="card-text">Sử dụng full chức năng không giới hạn</p>
                        <form action="{{route('pay.monthly')}}" method="post">
                            @csrf
                            <button type="submit" name="redirect" class="btn btn-success">100.000 VNĐ/tháng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
