<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
{{----}}
            <h1>Đăng Bài</h1>
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <form action="{{route('job.store')}}" method="POST" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="title">Ảnh bìa</label>
                    <input type="file" name="feature_image" id="feature_image" class="form-control-file">
                    @if($errors->has('feature_image'))
                        <div class="error"> {{$errors->first('feature_image')}}  </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input type="text" name="title" id="title" class="form-control">
                    @if($errors->has('title'))
                        <div class="error"> {{$errors->first('title')}}  </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="predes">Mô Tả Ngắn</label>
                    <input type="text" name="predes" id="predes" class="form-control">
                    @if($errors->has('predes'))
                        <div class="error"> {{$errors->first('predes')}}  </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea id="summernote2" name="description" class="form-control summernote"></textarea>
                    @if($errors->has('description'))
                        <div class="error"> {{$errors->first('description')}}  </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Vị trí và Yêu cầu</label>
                    <textarea id="summernote" name="roles" class="form-control summernote"></textarea>
                    @if($errors->has('roles'))
                        <div class="error"> {{$errors->first('roles')}}  </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Việc làm</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="job_type" id="Fulltime" value="Fulltime">
                        <label for="Fulltime" class="form-check-label">Fulltime</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="job_type" id="Parttime" value="Parttime">
                        <label for="Parttime" class="form-check-label">Parttime</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="job_type" id="Remote" value="Từ Xa">
                        <label for="Remote" class="form-check-label">Từ Xa</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="job_type" id="Contract" value="Hợp Đồng">
                        <label for="Contract" class="form-check-label">Hợp đồng</label>
                    </div>
                    @if($errors->has('job_type'))
                        <div class="error"> {{$errors->first('job_type')}}  </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" name="address" id="address" class="form-control">
                    @if($errors->has('address'))
                        <div class="error"> {{$errors->first('address')}}  </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="address">Mức lương</label>
                    <input type="text" name="salary" id="salary" class="form-control">
                    @if($errors->has('salary'))
                        <div class="error"> {{$errors->first('salary')}}  </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="date">Ngày kết thúc</label>
                    <input type="text" name="date" id="datepicker" class="form-control">
                    @if($errors->has('date'))
                        <div class="error"> {{$errors->first('date')}}  </div>
                    @endif
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-success">Đăng bài</button>
                </div>

            </form>
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
