<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('image/logo-tim.png')}}" type="image/x-icon">

    <title>Trợ lý AI</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset("css/main.css")}}" rel="stylesheet">

    {{--    summernote--}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    {{--    boostrap css--}}
    {{--    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">--}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
    <style>

    </style>

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
                <h1>Trợ Lý AI</h1>
                @if(auth()->user()->user_type == 'employee')
                    <form class="pt-4"action="{{route('suggest')}}" method="post">
                        @csrf
                        <label for="message">Gợi ý nội dung CV:</label>
                        <div class="row">
                            <div class="col-10">
                                <input id="message" type="text" name="cv" autocomplete="off" class="form-control p-4 shadow-sm" style="border-radius: 40px; height: 30px ; border: solid 0px grey; width:100%" placeholder="Ví dụ: Phạm Quang Lộc, học Bưu Chính Viễn Thông từ 2019, thích chơi game, thạo photoshop, làm web laravel">
                            </div>
                            <div class="col-2 d-flex justify-content-center">
                                <button class="btn btn-success px-4" style="border-radius: 40px" type="submit">Xem Gợi Ý</button>
                            </div>
                        </div>
                    </form>
                    <form class="pt-4"action="{{route('suggest')}}" method="post">
                        @csrf
                        <label for="message">Gợi ý nội dung email viết cho nhà tuyển dụng:</label>
                        <div class="row">
                            <div class="col-10">
                                <input id="message" type="text" name="mail" autocomplete="off" class="form-control p-4 shadow-sm" style="border-radius: 40px; height: 30px ; border: solid 0px grey; width:100%" placeholder="Ví dụ: Phạm Quang Lộc mong muốn được hợp tác với công ty">
                            </div>
                            <div class="col-2 d-flex justify-content-center">
                                <button class="btn btn-success px-4" style="border-radius: 40px" type="submit">Xem Gợi Ý</button>
                            </div>
                        </div>
                    </form>
                @else
                    <form class="pt-4"action="{{route('suggest')}}" method="post">
                        @csrf
                        <label for="message">Gợi ý nội Bài đăng tuyển dụng:</label>
                        <div class="row">
                            <div class="col-10">
                                <input id="message" type="text" name="post" autocomplete="off" class="form-control p-4 shadow-sm" style="border-radius: 40px; height: 30px ; border: solid 0px grey; width:100%" placeholder="Ví dụ: UX UI designer Thiết kế trải nghiệm người dùng và giao diện đồ họa tương tác.">
                            </div>
                            <div class="col-2 d-flex justify-content-center">
                                <button class="btn btn-success px-4" style="border-radius: 40px" type="submit">Xem Gợi Ý</button>
                            </div>
                        </div>
                    </form>
                    <form class="pt-4"action="{{route('suggest')}}" method="post">
                        @csrf
                        <label for="message">Gợi ý nội dung email viết cho nhà tuyển dụng:</label>
                        <div class="row">
                            <div class="col-10">
                                <input id="message" type="text" name="mail2" autocomplete="off" class="form-control p-4 shadow-sm" style="border-radius: 40px; height: 30px ; border: solid 0px grey; width:100%" placeholder="Ví dụ: Công Ty Tim rất ấn tượng với Lộc. Bạn có thể đến công ty tôi phỏng vấn">
                            </div>
                            <div class="col-2 d-flex justify-content-center">
                                <button class="btn btn-success px-4" style="border-radius: 40px" type="submit">Xem Gợi Ý</button>
                            </div>
                        </div>
                    </form>
                @endif
                @if(isset($result->choices[0]->message->content))
                <p>{!!$result->choices[0]->message->content!!}</p>
                @endif
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
<a class="scroll-to-top rounded"  href="#page-top">
    <i class="fas fa-angle-up" ></i>
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
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

{{--bootstrap--}}
<script src="{{asset('js/bootstrap.min.js')}}"></script>
{{--summernote--}}
{{--fa fa--}}
<script src="https://kit.fontawesome.com/5f924928fd.js" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#summernote').summernote();
    });
</script>
</body>
{{----}}
</html>
