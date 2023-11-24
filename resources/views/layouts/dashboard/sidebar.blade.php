{{--if user auth employer--}}
@if(auth()->user()->user_type == 'employer')
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('homepage')}}">
            <div class="sidebar-brand-icon mx-4">
                <img class="img-fluid" src="https://raw.githubusercontent.com/locmaymo/tim-vn.tech/test/public/image/logo-tim-white-trans.png" alt="">
            </div>
            <div class="sidebar-brand-text mx-3">Trang Chủ</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Bảng Điều Khiển</span></a>
        </li>
        {{----}}
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Công Cụ
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('job.create')}}">
                <i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg></i>
                <span>Đăng Bài Mới</span>
            </a>

            <a class="nav-link" href="{{route('job.index')}}">
                <i class="fa-solid fa-folder-closed"></i>
                <span>Quản Lý Bài</span>
            </a>

            <a class="nav-link" href="{{route('applicants.index')}}">
                <i class="fa-solid fa-user-check"></i>
                <span>Quản Lý Ứng Viên</span>
            </a>

            <a class="nav-link" href="{{route('suggest.index')}}">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
                <span>Trợ Lý AI</span>
            </a>




        </li>



{{--        <!-- Divider -->--}}
{{--        <hr class="sidebar-divider">--}}

{{--        <!-- Heading -->--}}
{{--        <div class="sidebar-heading">--}}
{{--            Addons--}}
{{--        </div>--}}

{{--        <!-- Nav Item - Pages Collapse Menu -->--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"--}}
{{--               aria-expanded="true" aria-controls="collapsePages">--}}
{{--                <i class="fas fa-fw fa-folder"></i>--}}
{{--                <span>Pages</span>--}}
{{--            </a>--}}
{{--            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    <h6 class="collapse-header">Login Screens:</h6>--}}
{{--                    <a class="collapse-item" href="login.html">Login</a>--}}
{{--                    <a class="collapse-item" href="register.html">Register</a>--}}
{{--                    <a class="collapse-item" href="forgot-password.html">Forgot Password</a>--}}
{{--                    <div class="collapse-divider"></div>--}}
{{--                    <h6 class="collapse-header">Other Pages:</h6>--}}
{{--                    <a class="collapse-item" href="404.html">404 Page</a>--}}
{{--                    <a class="collapse-item" href="blank.html">Blank Page</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}

{{--        <!-- Nav Item - Charts -->--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="charts.html">--}}
{{--                <i class="fas fa-fw fa-chart-area"></i>--}}
{{--                <span>Charts</span></a>--}}
{{--        </li>--}}

{{--        <!-- Nav Item - Tables -->--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="tables.html">--}}
{{--                <i class="fas fa-fw fa-table"></i>--}}
{{--                <span>Tables</span></a>--}}
{{--        </li>--}}

{{--        <!-- Divider -->--}}
{{--        <hr class="sidebar-divider d-none d-md-block">--}}

{{--        <!-- Sidebar Toggler (Sidebar) -->--}}
{{--        <div class="text-center d-none d-md-inline">--}}
{{--            <button class="rounded-circle border-0" id="sidebarToggle"></button>--}}
{{--        </div>--}}



    </ul>
@endif

{{--if user auth employee--}}
@if(auth()->user()->user_type == 'employee')
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('homepage')}}">
            <div class="sidebar-brand-icon mx-4">
                <img class="img-fluid" src="https://raw.githubusercontent.com/locmaymo/tim-vn.tech/master/public/image/logo-tim-white-trans.png" alt="">
            </div>
            <div class="sidebar-brand-text mx-3">Trang Chủ</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Bảng Điều Khiển</span></a>
        </li>
        {{----}}
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Công Cụ
        </div>

{{--        <!-- Nav Item - Pages Collapse Menu -->--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"--}}
{{--               aria-expanded="true" aria-controls="collapseTwo">--}}
{{--                <i class="fas fa-fw fa-cog"></i>--}}
{{--                <span>Quản Lý Bài Đăng</span>--}}
{{--            </a>--}}
{{--            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    <h6 class="collapse-header">Tính năng:</h6>--}}
{{--                    <a class="collapse-item" href="{{route('job.create')}}">Đăng Bài Mới</a>--}}
{{--                    <a class="collapse-item" href="{{route('job.index')}}" >Quản Lý Bài</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}


        <li class="nav-item">
            <a class="nav-link" href="{{route('user.cv')}}">
                <i class="fa-solid fa-file-arrow-up"></i>
                <span>CV Của Bạn</span>
            </a>
            <a class="nav-link" href="{{route('create.cv')}}">
                <i class="fa-solid fa-palette"></i>
                <span>Trình Tạo CV</span>
            </a>
            <a class="nav-link" href="{{route('suggest.index')}}">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
                <span>Trợ Lý AI</span>
            </a>
        </li>
    </ul>
{{--        <!-- Divider -->--}}
{{--        <hr class="sidebar-divider">--}}

{{--        <!-- Heading -->--}}
{{--        <div class="sidebar-heading">--}}
{{--            Addons--}}
{{--        </div>--}}

{{--        <!-- Nav Item - Pages Collapse Menu -->--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"--}}
{{--               aria-expanded="true" aria-controls="collapsePages">--}}
{{--                <i class="fas fa-fw fa-folder"></i>--}}
{{--                <span>Pages</span>--}}
{{--            </a>--}}
{{--            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    <h6 class="collapse-header">Login Screens:</h6>--}}
{{--                    <a class="collapse-item" href="login.html">Login</a>--}}
{{--                    <a class="collapse-item" href="register.html">Register</a>--}}
{{--                    <a class="collapse-item" href="forgot-password.html">Forgot Password</a>--}}
{{--                    <div class="collapse-divider"></div>--}}
{{--                    <h6 class="collapse-header">Other Pages:</h6>--}}
{{--                    <a class="collapse-item" href="404.html">404 Page</a>--}}
{{--                    <a class="collapse-item" href="blank.html">Blank Page</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}

{{--        <!-- Nav Item - Charts -->--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="charts.html">--}}
{{--                <i class="fas fa-fw fa-chart-area"></i>--}}
{{--                <span>Charts</span></a>--}}
{{--        </li>--}}

{{--        <!-- Nav Item - Tables -->--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="tables.html">--}}
{{--                <i class="fas fa-fw fa-table"></i>--}}
{{--                <span>Tables</span></a>--}}
{{--        </li>--}}

{{--        <!-- Divider -->--}}
{{--        <hr class="sidebar-divider d-none d-md-block">--}}






    <script src="https://kit.fontawesome.com/5f924928fd.js" crossorigin="anonymous"></script>
@endif

