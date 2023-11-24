<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=900, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('image/logo-tim.png')}}" type="image/x-icon">

    <title>Trình tạo CV</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    {{--    summernote--}}
    {{--    <link href="{{asset('css/summernote.min.css')}}" rel="stylesheet">--}}
    {{--    <link rel="stylesheet" href="{{asset('css/summernote-bs4.min.css')}}">--}}
    <!-- include libraries(jQuery, bootstrap) -->
    {{--    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">--}}

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    {{--    datepicker--}}

    <link href="{{asset('css/bootstrap-datepicker.min.css')}}" rel="stylesheet">


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.dashboard.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('layouts.dashboard.topbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container">
                <form action="{{route('preview.pdf')}}" method="POST" enctype="multipart/form-data">@csrf
                    @method('GET')
                <div class="row">
                    <div class="col-10">
                        <div class="card shadow mb-4" style="width:595px ;height: 842px" >

{{--                            left--}}
{{--                            avatar--}}
                            <div style="width:207px ;height: 842px; background-color: #fbf0d5">

                                <input type="file" name="img" >
                                @if(auth()->user()->profile_pic)
                                <img src="{{Storage::url(auth()->user()->profile_pic)}}" class="shadow-sm" alt="" style="height: 139px; width: 139px;border-radius: 50%;top: 30px;position: absolute; left: 32px; border: white solid">
                                @else
                                    <img src="{{asset('img/undraw_profile.svg')}}" alt=""class="shadow-sm" alt="" style="height: 139px; width: 139px;border-radius: 50%;top: 30px;position: absolute; left: 32px; border: white solid">
                                @endif


{{--                                tên--}}

                                    <input name="name"  type="text" style="border: solid 1px #0C3149;width: 207px;text-align: center; background-color: #fbf0d5; font-weight: bold;font-size: 17px; font-family: Inter, sans-serif; color:#0C3149; margin-top: 200px;" value="{{auth()->user()->name}}">

                                <div style="height: 2px; background-color: #0C3149FF; width: 139px; position: absolute; left: 32px; top: 270px;"></div>

{{--                                thông tin--}}

                                <textarea name="des" class="p-4" style="text-align: justify;width: 207px; height: 280px;margin-top: 50px;font-size: 11px; font-family: Inter, sans-serif; color:#0C3149;background-color: #fbf0d5;" >Tôi là [Tên của bạn], một người đam mê với việc tạo ra sự thay đổi tích cực thông qua công việc của mình. Với [số năm] kinh nghiệm trong ngành [ngành nghề hoặc lĩnh vực].

                                    Sự đam mê của tôi không chỉ dừng lại ở việc xây dựng sản phẩm hay chiến lược, mà còn chạm đến việc xây dựng và phát triển mối quan hệ giữa con người.

                                    Tôi rất mong được có cơ hội gặp gỡ và chia sẻ thêm với bạn về cách tôi có thể đóng góp vào [tên công ty hoặc ngành nghề] của bạn.</textarea>

                                <div style="height: 2px; background-color: #0C3149FF; width: 139px; position: absolute; left: 32px; top: 580px;"></div>

{{--                                liên hệ--}}
                                <i class="fa-solid fa-phone fa-lg" style="color: #0C3149FF; position: absolute; top: 630px; left: 30px"></i> <input name="phone" class=" " style="font-weight: bold;font-size: 12px; font-family: Inter, sans-serif; color:#0C3149; top: 622px; position: absolute; left: 60px; background-color: transparent;border: solid 1px #0C3149;" value="097.643.9319">
                                <i class="fa-solid fa-envelope fa-lg" style="color: #0C3149FF; position: absolute; top: 670px; left: 30px"></i> <input name="mail" class=" " style="font-weight: bold;font-size: 12px; font-family: Inter, sans-serif; color:#0C3149; top: 662px; position: absolute; left: 60px; background-color: transparent;border: solid 1px #0C3149;" value="phamloc@gmail">
                                <i class="fa-brands fa-facebook fa-lg" style="color: #0C3149FF; position: absolute; top: 710px; left: 30px"></i> <input name="social" class=" " style="font-weight: bold;font-size: 12px; font-family: Inter, sans-serif; color:#0C3149; top: 702px; position: absolute; left: 60px; background-color: transparent;border: solid 1px #0C3149;" value="fb.phamloc">
                                <i class="fa-solid fa-map-marker-alt fa-lg" style="color: #0C3149FF; position: absolute; top: 750px; left: 32px"></i> <input name="address" class=" " style="font-weight: bold;font-size: 12px; font-family: Inter, sans-serif; color:#0C3149; top: 742px; position: absolute; left: 60px; background-color: transparent;border: solid 1px #0C3149;" value="Hà Nội">


                            </div>
{{--phải--}}
                            <div style="position: absolute;right: 0; width:388px ;height: 842px; background-color: white; padding: 31px">

{{--                                Học vấn--}}
                                <i class="fa-solid fa-graduation-cap fa-xl" style="color: #0C3149FF; position: absolute; top: 50px"></i>
                                <p class="text-nowrap " style="font-weight: bold;font-size: 25px; font-family: Inter, sans-serif; color:#0C3149; top: 32px; position: absolute; left: 75px">Học Vấn</p>
                                <div style="height: 2px; background-color: #0C3149FF; width: 139px; position: absolute; left: 200px; top: 50px;"></div>

                                <div style="width: 252px; height: 71px; margin-top: 45px; position: absolute" > <p style=" font-size: 9.8pt; color: #0C3149"><span style="font-family: Nunito;"><b><input name="school-1" value="Tốt Nghiệp PTIT"></b><textarea name="des-school-1"> - Học Viện Công Nghệ Bưu Chính Viễn Thông</textarea></span><br><span style="font-family: Nunito;"><b><input name="school-2" value="Tốt Nghiệp PTIT"></b><textarea name="des-school-2">- Học Viện Công Nghệ Bưu Chính Viễn Thông</textarea> </span></p></div>



{{--                                    kinh nghiệm--}}
                                <i class="fa-solid fa-briefcase fa-xl" style="color: #0C3149FF; position: absolute; top: 230px"></i>
                                <p class="text-nowrap " style="font-weight: bold;font-size: 25px; font-family: Inter, sans-serif; color:#0C3149; top: 213px; position: absolute; left: 75px">Kinh Nghiệm</p>
                                <div style="height: 2px; background-color: #0C3149FF; width: 90px; position: absolute; left: 249px; top: 230px;"></div>

                                <div style="width: 252px; height: 71px; margin-top: 240px; position: absolute" > <p style=" font-size: 9.8pt; color: #0C3149; text-align: justify;"><span style="font-family: Nunito; "><b><input name="company-name-1" value="DEF Tech Solutions"></b><br><input name="position-1" value="Vị trí: Kỹ sư phần mềm"><br><textarea name="pos-des-1" >- Phát triển ứng dụng web và mobile: Tham gia vào quá trình phát triển từ việc lập kế hoạch, thiết kế, triển khai đến duy trì và nâng cấp các ứng dụng web và di động sử dụng các ngôn ngữ như JavaScript, ReactJS, React Native và Node.js.</textarea></span><br><br><span style="font-family: Nunito;"><b><input name="company-name-2" value="GHI Solutions"></b><br><input name="position-2" value="Vị trí: Quản lý Dự án IT"><br><textarea name="pos-des-2" >- Quản lý Dự án và Tài nguyên: Đảm bảo tiến độ dự án, phân chia và quản lý tài nguyên, điều chỉnh kế hoạch dự án.</textarea>  </span></p></div>

{{--                                    Kỹ Năng--}}
                                <i class="fa-solid fa-bolt fa-xl" style="color: #0C3149FF; position: absolute; top: 580px"></i>
                                <p class="text-nowrap " style="font-weight: bold;font-size: 25px; font-family: Inter, sans-serif; color:#0C3149; top: 560px; position: absolute; left: 75px">Kỹ Năng</p>
                                <div style="height: 2px; background-color: #0C3149FF; width: 140px; position: absolute; left: 200px; top: 580px;"></div>

                                <div style="width: 252px; height: 71px; margin-top: 590px; position: absolute" > <p style=" font-size: 9.8pt; color: #0C3149"><span style="font-family: Nunito;"><b><input name="skill-1" value="Kỹ năng quản lý thời gian"> <br> <input name="skill-2" value="Kỹ năng làm việc theo nhóm">  </b></span></p></div>

{{--                                    Thành Tưu--}}
                                <i class="fa-solid fa-award fa-xl" style="color: #0C3149FF; position: absolute; top: 700px"></i>
                                <p class="text-nowrap " style="font-weight: bold;font-size: 25px; font-family: Inter, sans-serif; color:#0C3149; top: 681px; position: absolute; left: 75px">Thành Tựu</p>
                                <div style="height: 2px; background-color: #0C3149FF; width: 110px; position: absolute; left: 230px; top: 700px;"></div>

                                <div style="width: 252px; height: 71px; margin-top: 710px; position: absolute" > <p style=" font-size: 9.8pt; color: #0C3149"><span style="font-family: Nunito;"><b><input name="certificate" value="Đạt 9.0 Ielts"></b></span></p></div>

                            </div>

{{--                            footer--}}
                            <div style="position: absolute; bottom: 0; width:594px ;height: 20px; background-color: #720000"></div>

                        </div>
                    </div>
                </div>


                    <button type="submit" class="btn btn-success">Tạo pdf</button>


</form>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('layouts.dashboard.footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>

{{--summernote--}}
<script src="{{asset('js/summernote.min.js')}}"></script>
{{--datepicker--}}

<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="https://kit.fontawesome.com/5f924928fd.js" crossorigin="anonymous"></script>
{{----}}
<script>
    $(document).ready(function () {
        $('#summernote').summernote();
        $('#summernote2').summernote();
        $( "#datepicker" ).datepicker();
    });
</script>


</body>

</html>
