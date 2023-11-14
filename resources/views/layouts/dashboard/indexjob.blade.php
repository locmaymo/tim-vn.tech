<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách bài đăng</h1>
{{--    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.--}}
{{--        For more information about DataTables, please visit the <a target="_blank"--}}
{{--                                                                   href="https://datatables.net">official DataTables documentation</a>.</p>--}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bài đăng</h6>
        </div>
        @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Ngày đăng</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Ngày đăng</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
{{--                            auto increment td--}}
                            <td>{{$loop->iteration}}</td>
                            <td>{{$job->title}}</td>
                            <td>{{$job->created_at->format('d-m-Y')}}</td>
                            <td><a class="btn btn-outline-primary container-fluid" href="{{route('job.edit',$job->id)}}">Sửa Bài</a></td>
                            <td><a class="btn btn-outline-danger container-fluid" href="#" data-bs-toggle="modal" data-bs-target="#delpost{{$job->id}}" >Xóa Bài</a></td>
{{--                        modal--}}
                            <div class="modal fade" id="delpost{{$job->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form action="{{route('job.delete',[$job->id])}}"  method="GET">@csrf
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

