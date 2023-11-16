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
        <a class="navbar-brand" href="{{route('homepage')}}"><img style="width: auto; height: 71px " src="{{asset('image/logo-tim.png')}}" alt=""></a>
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
                        <a href="{{route('register')}}" class="btn btn-danger">Đăng Ký</a>
                    </li>
                    <li class="nav-item mx-lg-2 my-2 my-lg-0">
                        <a href="{{route('login')}}" class="btn btn-primary">Đăng Nhập</a>
                    </li>
                @endif
                @if(Auth::check())
                    <li class="nav-item mx-lg-2 my-2 my-lg-0">
                        <div class="dropdown">
                            @if(auth()->user()->profile_pic)
                            <img type="button" data-bs-toggle="dropdown" aria-expanded="false" class="rounded-circle border border-primary" src="{{asset('storage/'.auth()->user()->profile_pic)}}" height="45" alt="">
                            @else
                                <img type="button" data-bs-toggle="dropdown" aria-expanded="false" class="rounded-circle border border-primary" src="{{asset('img/undraw_profile.svg')}}" height="45" alt="">
                            @endif
                            <ul class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{route('user.profile')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cá Nhân
                                </a>
                                <a class="dropdown-item" href="{{route('dashboard')}}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Bảng điều khiển
                                </a>
                                @if(auth()->user()->user_type === 'employer')
                                    <a class="dropdown-item" href="{{route('subscribe')}}">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Gói đăng ký
                                    </a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <form id="form-logout" action="{{route('logout')}}" method="post">@csrf
                                    <button id="logout" type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Đăng Xuất
                                    </button>
                                    </a>
                                </form>
                            </ul>
                        </div>
                    </li>
                @endif

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
{{----}}
</body>
</html>
