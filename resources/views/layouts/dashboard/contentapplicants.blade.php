<div class="container-fluid">
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Bảng Theo dõi</h1>
    {{--    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.--}}
    {{--        For more information about DataTables, please visit the <a target="_blank"--}}
    {{--                                                                   href="https://datatables.net">official DataTables documentation</a>.</p>--}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Trạng thái</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th >STT</th>
                        <th>Bài đăng</th>
                        <th>Tổng số ứng viên</th>
                        <th>Số ứng viên chưa duyệt</th>
                        <th>Ngày đăng</th>
                        <th>Xem ứng viên</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Bài đăng</th>
                        <th>Tổng số ứng viên</th>
                        <th>Số ứng viên chưa duyệt</th>
                        <th>Ngày đăng</th>
                        <th>Xem ứng viên</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($listings as $listing)
                        <tr>
                            {{--                            auto increment td--}}
                            <td >{{$loop->iteration}}</td>
                            <td>{{$listing->title}}</td>
                            <td>{{$listing->users_count}}</td>
                            <td>{{$listing->count}}</td>
                            <td>{{$listing->created_at->format('d-m-Y')}}</td>
                            <td><a href="{{route('applicants.view',$listing->slug)}}" class="btn btn-success">Xem ứng viên</a></td>
                            {{--                        modal--}}
                            <div class="modal fade" id="" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form action=""  method="GET">@csrf
                                    Method('GET')
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Thông Báo</h5>
                                                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc chắn muốn xóa Bài?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                                                <button type="submit" class="btn btn-primary">Chắc chắn</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{----}}
</div>

<!-- /.container-fluid -->

