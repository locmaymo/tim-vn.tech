
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Danh sách ứng viên cho: <b> {{$listing->title}} </b></h1>

    <div class="dropdown-divider"></div>
@if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>
@endif

    <div class="row" >
    @foreach($users as $user)
            <div class="col-lg-6 col-xl-4   mt-4">
                @if($user->pivot->shortlisted)
                    <div class="card bg border-bottom-success  pt-2 mt-4">
                @else
                    <div class="card bg border-bottom-primary shadow  pt-2 mt-4">
                @endif
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-12 d-flex justify-content-center">
                                @if($user->profile_pic)
                                    <img class="img-profile rounded-circle " src="{{asset('storage/'.$user->profile_pic)}}" alt="" width="150px" height="150px">
                                @else
                                    <img class="img-profile rounded-circle " src="{{asset('img/undraw_profile.svg')}}" alt="" width="150px" height="150px">
                                @endif
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="text font-weight-bold text-primary text-uppercase mt-3 mr-2">
                                        ứng viên:</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 mt-3 d-flex">{{$user->name}}</div>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="text font-weight-bold text-primary text-uppercase mt-3 mr-2">
                                        Email:</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 mt-3">{{$user->email}}</div>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="text font-weight-bold text-primary text-uppercase mt-3 mr-2">
                                        ứng tuyển:</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 mt-3">{{$user->pivot->created_at->format('d/m/Y')}}</div>
                                </div>

                                <div class="col-6 mt-4 d-flex justify-content-start">
                                    <a class="btn btn-info mb-4" href="{{asset('storage/'.$user->resume)}}" target="_blank">Xem CV</a>
                                </div>

                                <div class="col-6 mt-4 d-flex justify-content-end">
                                    <form action="{{route('applicant.shortlist',[$listing->id,$user->id])}}" method="POST">@csrf
                                        @if($user->pivot->shortlisted == '1')
                                            <button class="btn btn-dark mb-4" disabled >Đã thêm</button>
                                        @else
                                            <button type="submit" class="btn btn-success mb-4" data-toggle="modal" data-target=".shortlist">thêm</button>
                                        @endif
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>

    @endforeach
                    <div class="row  mt-5 ml-1" >
                        <div class="col-12 ">
                            {{$users->links('vendor.pagination.bootstrap-5')}}
                        </div>
                    </div>


</div>



</div>


