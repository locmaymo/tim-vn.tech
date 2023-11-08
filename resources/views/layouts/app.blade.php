<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tim</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('image/logo-tim.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg bg-white  border-body shadow-sm" data-bs-theme="light">
    <div class="container">
        <a class="navbar-brand" href="#"><img style="width: auto; height: 71px " src="{{asset('image/logo-tim.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link" href="#">Công Việc</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Công Ty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" >Giới Thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên Hệ</a>
                </li>
                @if(!Auth::check())
                    <li class="nav-item mx-lg-2 my-2 my-lg-0">
                        <button type="button" class="btn btn-danger ">
                            <a href="{{route('create.tim')}}" style="color: white; text-decoration: none;">Đăng Ký</a>
                        </button>
                    </li>
                    <li class="nav-item mx-lg-2 my-2 my-lg-0">
                        <button type="button" class="btn btn-outline-primary">
                            <a href="{{route('login')}}" style="color: darkblue; text-decoration: none">Đăng Nhập</a>
                        </button>
                    </li>
                @endif
                @if(Auth::check())
                    <li class="nav-item mx-lg-2 my-2 my-lg-0">
                        <button id="logout" type="button" class="btn btn-outline-primary">Đăng Xuất</button>
                    </li>
                @endif
                <form id="form-logout" action="{{route('logout')}}" method="post">@csrf</form>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<script>
    let logout = document.getElementById('logout');
    let formLogout = document.getElementById('form-logout');
    logout.addEventListener('click', function () {
        formLogout.submit();
    })
</script>

</body>
</html>
