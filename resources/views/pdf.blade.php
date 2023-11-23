<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="{{asset('image/logo-tim.png')}}" type="image/x-icon">

    <title>Đăng Bài</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->

    {{--    summernote--}}
    {{--    <link href="{{asset('css/summernote.min.css')}}" rel="stylesheet">--}}
    {{--    <link rel="stylesheet" href="{{asset('css/summernote-bs4.min.css')}}">--}}
    <!-- include libraries(jQuery, bootstrap) -->
    {{--    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">--}}

    <!-- include summernote css/js -->


    {{--    datepicker--}}
<style>
    #cv-container {
        transform-origin: 0 0;
        position: relative;
        transform: scale(1.9);

    }

    #cv-container > * {
        position: absolute;
        top: 0;
        left: 0;
    }
    #cv-wrapper {
        width: 100%;
    }
</style>


</head>

<body id="cv-container" style="margin: 0; ">

<div id="cv-wrapper">
<div class="card " style="width:595px ;height: 842px; position: relative;
  display: flex;
  flex-direction: column;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid #e3e6f0;
  border-radius: 0.35rem;" >

    {{--                            left--}}
    {{--                            avatar--}}
    <div style="width:207px ;height: 842px; background-color: #fbf0d5">

        @if(!empty($path))

            <img src="{{Storage::url($path)}}" class="shadow-sm" alt="" style="height: 139px; width: 139px;border-radius: 50%;top: 30px;position: absolute; left: 32px; border: white solid">

        @else
            @if(auth()->user()->profile_pic)
                <img src="{{Storage::url(auth()->user()->profile_pic)}}" class="shadow-sm" alt="" style="height: 139px; width: 139px;border-radius: 50%;top: 30px;position: absolute; left: 32px; border: white solid">
            @else
                <img src="{{asset('img/undraw_profile.svg')}}" alt=""class="shadow-sm" alt="" style="height: 139px; width: 139px;border-radius: 50%;top: 30px;position: absolute; left: 32px; border: white solid">
            @endif
        @endif
        {{--                                tên--}}
        <p class="text-center " style="text-align: center;font-weight: bold;font-size: 17px; font-family: Inter, sans-serif; color:#0C3149; margin-top: 200px">{{$data['name']}}</p>

        <div style="height: 2px; background-color: #0C3149FF; width: 139px; position: absolute; left: 32px; top: 270px;"></div>

        {{--                                thông tin--}}
        <p class=" p-4 " style="padding: 1.5rem;text-align: justify;;margin-top: 50px;font-size: 11px; font-family: Inter, sans-serif; color:#0C3149;">{{$data["des"]}}</p>

        <div style="height: 2px; background-color: #0C3149FF; width: 139px; position: absolute; left: 32px; top: 580px;"></div>

        {{--                                liên hệ--}}
        <i class="fa-solid fa-phone fa-lg" style="color: #0C3149FF; position: absolute; top: 630px; left: 30px"></i> <p class="text-nowrap " style="font-weight: bold;font-size: 12px; font-family: Inter, sans-serif; color:#0C3149; top: 622px; position: absolute; left: 60px">{{$data['phone']}}</p>
            <i class="fa-solid fa-envelope fa-lg" style="color: #0C3149FF; position: absolute; top: 670px; left: 30px"></i> <p class="text-nowrap " style="font-weight: bold;font-size: 12px; font-family: Inter, sans-serif; color:#0C3149; top: 662px; position: absolute; left: 60px"> {{$data['mail']}}</p>
            <i class="fa-brands fa-facebook fa-lg" style="color: #0C3149FF; position: absolute; top: 710px; left: 30px"></i> <p class="text-nowrap " style="font-weight: bold;font-size: 12px; font-family: Inter, sans-serif; color:#0C3149; top: 702px; position: absolute; left: 60px">  {{$data['social']}}</p>
            <i class="fa-solid fa-map-marker-alt fa-lg" style="color: #0C3149FF; position: absolute; top: 750px; left: 32px"></i> <p class="text-nowrap " style="font-weight: bold;font-size: 12px; font-family: Inter, sans-serif; color:#0C3149; top: 742px; position: absolute; left: 60px"> {{$data['address']}}</p>


    </div>
    {{--phải--}}
    <div style="position: absolute;right: 0; width:388px ;height: 840px; background-color: white; padding: 31px">

        {{--                                Học vấn--}}
        <i class="fa-solid fa-graduation-cap fa-xl" style="color: #0C3149FF; position: absolute; top: 50px"></i>
        <p class="text-nowrap " style="font-weight: bold;font-size: 25px; font-family: Inter, sans-serif; color:#0C3149; top: 32px; position: absolute; left: 75px">Học Vấn</p>
        <div style="height: 2px; background-color: #0C3149FF; width: 139px; position: absolute; left: 200px; top: 51px;"></div>

        <div style="width: 252px; height: 71px; margin-top: 45px; position: absolute" > <p style=" font-size: 9.8pt; color: #0C3149"><span style="font-family: Nunito;"><b>{{$data["school-1"]}}</b><br>{{$data["des-school-1"]}}</span><br><br><span style="font-family: Nunito;"><b>{{$data["school-2"]}}</b><br>{{$data["des-school-2"]}}</span></p></div>

        {{--                                Sở thích--}}



        {{--                                    kinh nghiệm--}}
        <i class="fa-solid fa-briefcase fa-xl" style="color: #0C3149FF; position: absolute; top: 240px"></i>
        <p class="text-nowrap " style="font-weight: bold;font-size: 25px; font-family: Inter, sans-serif; color:#0C3149; top: 223px; position: absolute; left: 75px">Kinh Nghiệm</p>
        <div style="height: 2px; background-color: #0C3149FF; width: 90px; position: absolute; left: 249px; top: 241px;"></div>

        <div style="width: 252px; height: 71px; margin-top: 250px; position: absolute" > <p style=" font-size: 9.8pt; color: #0C3149; text-align: justify;"><span style="font-family: Nunito; "><b>{{$data["company-name-1"]}}</b><br>{{$data["position-1"]}}<br>{{$data["pos-des-1"]}}</span><br><br><span style="font-family: Nunito;"><b>{{$data["company-name-2"]}}</b><br>{{$data["position-2"]}}<br>{{$data["pos-des-2"]}}</span></p></div>

        {{--                                    Kỹ Năng--}}
        <i class="fa-solid fa-bolt fa-xl" style="color: #0C3149FF; position: absolute; top: 580px"></i>
        <p class="text-nowrap " style="font-weight: bold;font-size: 25px; font-family: Inter, sans-serif; color:#0C3149; top: 560px; position: absolute; left: 75px">Kỹ Năng</p>
        <div style="height: 2px; background-color: #0C3149FF; width: 140px; position: absolute; left: 200px; top: 580px;"></div>

        <div style="width: 252px; height: 71px; margin-top: 590px; position: absolute" > <p style=" font-size: 9.8pt; color: #0C3149"><span style="font-family: Nunito;"><b>{{$data["skill-1"]}}<br>{{$data["skill-2"]}}</b></span></p></div>

        {{--                                    Thành Tưu--}}
        <i class="fa-solid fa-award fa-xl" style="color: #0C3149FF; position: absolute; top: 700px"></i>
        <p class="text-nowrap " style="font-weight: bold;font-size: 25px; font-family: Inter, sans-serif; color:#0C3149; top: 681px; position: absolute; left: 75px">Thành Tựu</p>
        <div style="height: 2px; background-color: #0C3149FF; width: 110px; position: absolute; left: 230px; top: 700px;"></div>

        <div style="width: 252px; height: 71px; margin-top: 710px; position: absolute" > <p style=" font-size: 9.8pt; color: #0C3149"><span style="font-family: Nunito;"><b>{{$data["certificate"]}}</b></span></p></div>

    </div>

    {{--                            footer--}}
    <div style="position: absolute; bottom: 0; width:594px ;height: 20px; background-color: #720000"></div>

</div>
    </div>
<script src="https://kit.fontawesome.com/5f924928fd.js" crossorigin="anonymous"></script>
<script>
    window.onload = function() {
        window.print();
    };
</script>
</body>

</html>
