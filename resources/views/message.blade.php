@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
        <strong>Thành Công!</strong> {{Session::get('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
        <strong>Thất Bại!</strong> {{Session::get('error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{----}}
