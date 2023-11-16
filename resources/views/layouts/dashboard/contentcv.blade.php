<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            {{----}}
            <h1>CV của bạn</h1>
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif


            <form action="{{route('user.cv.update')}}" method="POST" enctype="multipart/form-data">@csrf
                <div class="form-group">

                   <input type="file" name="resume" id="resume" class="form-control-file">
                </div>


                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-success">Tải Lên</button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <h1>CV hiện tại</h1>
            @if(auth()->user()->resume)
                <div class="form-group ">
                    <iframe class="container-fluid" src="{{asset('storage/'.auth()->user()->resume)}}"  height="670" ></iframe>
                </div>
                <div class="form-group">
                    <a class="btn btn-primary container-fluid" href="{{asset('storage/'.auth()->user()->resume)}}" target="_blank"> Xem trong tab mới</a>
                </div>
            @endif
        </div>
    </div>
</div>

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
