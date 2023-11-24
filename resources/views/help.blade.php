@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center fw-bold mt-5 ">Hướng Dẫn</h1>
        <h2>Hướng Dẫn Sử Dụng</h2>

        <p>Xin chào và chào mừng bạn đến với trang hướng dẫn của tim-vn.tech! Dưới đây là một số hướng dẫn cơ bản để bạn bắt đầu:</p>

        <h3>1. Tạo Hồ Sơ CV</h3>
        <p>Để bắt đầu tạo CV của bạn, hãy truy cập vào phần "Tạo CV" trên trang chủ của chúng tôi. Bạn có thể chọn mẫu CV phù hợp và điền thông tin cá nhân, kinh nghiệm làm việc và học vấn của bạn.</p>

        <h3>2. Tìm Việc Làm</h3>
        <p>Để tìm kiếm việc làm, hãy sử dụng chức năng tìm kiếm trên trang web của chúng tôi. Bạn có thể nhập từ khóa, vị trí công việc hoặc vị trí địa lý để tìm ra các công việc phù hợp với bạn.</p>

        <h3>3. Liên Hệ Nhà Tuyển Dụng</h3>
        <p>Khi bạn tìm thấy công việc phù hợp, bạn có thể liên hệ trực tiếp với nhà tuyển dụng thông qua thông tin liên hệ được cung cấp trong mỗi bài đăng việc làm.</p>

        <h3>4. Sử Dụng Trợ Lý AI</h3>
        <p>Chúng tôi cung cấp trợ lý AI để hỗ trợ bạn trong quá trình tạo CV và tìm kiếm việc làm. Trợ lý AI sẽ giúp bạn hoàn thành mọi thứ nhanh chóng và dễ dàng.</p>

        <h3>5. Tham Gia Cộng Đồng</h3>
        <p>Chúng tôi có một cộng đồng mạnh mẽ của ứng viên và nhà tuyển dụng. Hãy tham gia để trao đổi thông tin, chia sẻ kinh nghiệm và tạo cơ hội mới.</p>

        <h3>6. Hỗ Trợ</h3>
        <p>Nếu bạn gặp bất kỳ vấn đề nào hoặc cần hỗ trợ, vui lòng liên hệ với chúng tôi qua trang Liên Hệ. Chúng tôi sẵn lòng hỗ trợ bạn.</p>

        <p>Đây chỉ là những hướng dẫn cơ bản. Chúng tôi hy vọng rằng trang hướng dẫn này sẽ giúp bạn có một trải nghiệm tốt khi sử dụng tim-vn.tech!</p>
        {{--        button dến dashboard--}}
        <a href="{{route('dashboard')}}" class="btn btn-primary">Dashboard</a>
        {{--        button đến create job--}}
        <a href="{{route('job.create')}}" class="btn btn-secondary">Create Job</a>
        {{--    button đến đăng ký tim--}}
        <a href="{{route('create.tim')}}" class="btn btn-info">Đăng Ký Tim</a>
        {{--    button đến đăng ký employer--}}
        <a href="{{route('create.employer')}}" class="btn btn-dark">Đăng Ký Employer</a>
        {{--    button đến plan--}}
        <a href="{{route('subscribe')}}" class="btn btn-danger">Plan</a>
        {{--    button đến profile--}}
        <a href="{{route('user.profile')}}" class="btn btn-success">Profile</a>
        {{--    button đến suggestion--}}
        <a href="{{route('suggest')}}" class="btn btn-warning">Trợ Lý AI</a>
        {{--    button đến trình tạo cv--}}
        <a href="{{route('create.cv')}}" class="btn btn-primary">Tạo CV</a>
        {{--    button đến trang tìm kiếm--}}

    </div>
@endsection
