<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 mb-4">
            <a href="{{route('job.index')}}" class="btn btn-primary">Quay lại</a>
        </div>
{{----}}
        <div class="col-md-10">
            <div class="row justify-content-start">
                <div class="col-md-10">
                    <h1>Sửa Bài đăng</h1>
                    @if(Session::has('message'))
                        <div class="alert alert-success">{{Session::get('message')}}</div>
                    @endif
                    <form action="{{route('job.update', [$listing->id])}}" method="POST" enctype="multipart/form-data">@csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Ảnh bìa (Bỏ qua để giữ ảnh cũ)</label>
                            <input type="file" name="feature_image" id="feature_image" class="form-control-file">
                            @if($errors->has('feature_image'))
                                <div class="error"> {{$errors->first('feature_image')}}  </div>
                            @endif
{{--                            lấy ảnh bìa từ model Listing nếu có ở trong public/storage--}}
                            @if($listing->feature_image)
                                <div class="img-fluid mt-4">
                                    <img src="{{asset('storage/'.$listing->feature_image)}}" height="auto" width="100%" alt="">
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{$listing->title}}">
                            @if($errors->has('title'))
                                <div class="error"> {{$errors->first('title')}}  </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="predes">Mô Tả Ngắn</label>
                            <input type="text" name="predes" id="predes" class="form-control" value="{{$listing->predes}}">
                            @if($errors->has('predes'))
                                <div class="error"> {{$errors->first('predes')}}  </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea id="summernote2" name="description" class="form-control summernote">{{$listing->description}}</textarea>
                            @if($errors->has('description'))
                                <div class="error"> {{$errors->first('description')}}  </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="roles">Vị trí và Yêu cầu</label>
                            <textarea id="summernote" name="roles" class="form-control summernote">{{$listing->roles}}</textarea>
                            @if($errors->has('roles'))
                                <div class="error"> {{$errors->first('roles')}}  </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Việc làm</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="job_type" id="Fulltime" value="Fulltime"
                                    {{$listing->job_type == 'Fulltime' ? 'checked' : ''}}
                                >
                                <label for="Fulltime" class="form-check-label">Fulltime</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="job_type" id="Parttime" value="Parttime"
                                    {{$listing->job_type == 'Parttime' ? 'checked' : ''}}
                                >
                                <label for="Parttime" class="form-check-label">Parttime</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="job_type" id="Remote" value="Từ Xa"
                                    {{$listing->job_type == 'Từ Xa' ? 'checked' : ''}}
                                >
                                <label for="Remote" class="form-check-label">Từ Xa</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="job_type" id="Contract" value="Hợp Đồng"
                                    {{$listing->job_type == 'Hợp Đồng' ? 'checked' : ''}}
                                >
                                <label for="Contract" class="form-check-label">Hợp đồng</label>
                            </div>
                            @if($errors->has('job_type'))
                                <div class="error"> {{$errors->first('job_type')}}  </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{$listing->address}}">
                            @if($errors->has('address'))
                                <div class="error"> {{$errors->first('address')}}  </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Mức lương</label>
                            <input type="text" name="salary" id="salary" class="form-control" value="{{$listing->salary}}">
                            @if($errors->has('salary'))
                                <div class="error"> {{$errors->first('salary')}}  </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="date">Ngày kết thúc</label>
{{--                            format value application_close_date from d-m-Y to Y-m-d--}}
                            <input type="text" name="date" id="datepicker" class="form-control" value="{{Carbon\Carbon::parse($listing->application_close_date)->format('m/d/Y')}}">
                            @if($errors->has('date'))
                                <div class="error"> {{$errors->first('date')}}  </div>
                            @endif
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success">Lưu Bài</button>
                            <a href="/job/show/{{$listing->slug}}" class="btn btn-info ml-2" target="_blank">Xem Bài</a>
                        </div>

                    </form>
                </div>
            </div>
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
