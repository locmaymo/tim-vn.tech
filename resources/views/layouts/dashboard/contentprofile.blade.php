<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{----}}
            <h1>Cập Nhật Thông Tin Cá Nhân</h1>
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
            <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    @if(auth()->user()->user_type == 'employer')
                        <label for="logo">Logo Công Ty</label>
                    @else
                        <label for="logo">Ảnh Đại Diện</label>
                    @endif
                    <input type="file" name="profile_pic" id="logo" class="form-control-file">
                    @if($errors->has('logo'))
                        <div class="error"> {{$errors->first('logo')}}  </div>
                    @endif

                    @if(auth()->user()->profile_pic)
                        <div class="mt-4">
                            <img src="{{asset('storage/'.auth()->user()->profile_pic)}}" height="200" alt="">
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input readonly type="text" name="email" id="email" class="form-control" value="{{auth()->user()->email}}">

                </div>
                <div class="form-group">
                    @if(auth()->user()->user_type == 'employer')
                        <label for="name">Tên Công Ty</label>
                    @else
                        <label for="name">Họ và Tên</label>
                    @endif
                    <input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name}}">
                    @if($errors->has('name'))
                        <div class="error"> {{$errors->first('name')}}  </div>
                    @endif
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-success">Cập Nhật Thông Tin</button>
                </div>
            </form>
                <div class="dropdown-divider"></div>
                <h1>Cập Nhật Mật Khẩu</h1>
            <form action="{{route('user.profile.password')}}" method="post">@csrf
                <div class="form-group">
                    <label for="current_password">Mật Khẩu Cũ</label>
                    <input type="password" name="current_password" id="current_password" class="form-control">
                    <input class="mt-2 " type="checkbox" onclick="show1()"> Hiển Thị
                    @if($errors->has('current_password'))
                        <div class="error"> {{$errors->first('current_password')}}  </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Mật Khẩu Mới</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <input class="mt-2 " type="checkbox" onclick="show2()"> Hiển Thị
                    @if($errors->has('password'))
                        <div class="error"> {{$errors->first('password')}}  </div>
                    @endif
                </div>
{{--                <div class="form-group">--}}
{{--                    <label for="confirm_password">Xác Nhận Mật Khẩu</label>--}}
{{--                    <input type="password" name="confirm_password" id="password" class="form-control">--}}
{{--                </div>--}}
{{--                @if($errors->has('confirm_password'))--}}
{{--                    <div class="error"> {{$errors->first('confirm_password')}}  </div>--}}
{{--                @endif--}}

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-success">Cập Nhật Mật Khẩu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function show1() {
        var x = document.getElementById("current_password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    function show2() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<style>
    .note-insert {
        display: none!important;
    }
    .error {
        margin-top: 10px;
        color: red;
        font-size: 15px;
        font-weight: bold;
    }
</style>
