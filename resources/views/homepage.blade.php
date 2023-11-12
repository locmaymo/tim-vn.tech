@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mt-5">TRANG CHU =)))</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi assumenda atque beatae consequatur
            consequuntur cumque delectus deserunt doloremque doloribus eligendi eos error esse ex exercitationem facere
            fugiat fugit harum id illo illum impedit inventore ipsa ipsum iste itaque laboriosam laborum libero magnam
            maiores maxime molestias mollitia nam natus necessitatibus nemo nesciunt nisi nobis non nostrum nulla odio
            officiis pariatur perferendis perspiciatis porro possimus quae quia quibusdam quisquam quod repellat rerum
            saepe sed similique, sunt tempora tenetur ullam unde velit veniam voluptas voluptatibus voluptatum. Accusamus
            accusantium aliquid architecto asperiores aspernatur atque autem, blanditiis commodi consequatur consequuntur
            deleniti dicta distinctio dolor dolore doloremque doloribus ducimus eius eos error esse est exercitationem
            explicabo facere facilis fugiat fugit harum hic id illum impedit in incidunt iusto labore laborum libero
            magnam maiores maxime molestiae molestias natus necessitatibus nesciunt nihil nisi nobis non nostrum nulla
            numquam obcaecati odio omnis pariatur perferendis perspiciatis placeat praesentium provident quae quas qui
            quibusdam quidem quis, quod quos reiciendis repellat repellendus reprehenderit rerum saepe sapiente similique
            sit tempora temporibus tenetur totam ullam unde vel voluptas voluptate voluptatum. Accusantium ad alias
            aperiam, architecto asperiores aspernatur atque aut consequatur consequuntur cupiditate debitis deleniti
            distinctio dolorum ducimus eius eos esse est et eveniet ex excepturi exercitationem explicabo facilis fuga
            fugit harum hic id impedit in ipsa iure laboriosam laborum libero magnam maxime minima minus modi molestias
            mollitia nam natus nemo neque nihil nisi non nostrum numquam obcaecati officiis optio
        </p>
{{--        button dến dashboard--}}
        <a href="{{route('dashboard')}}" class="btn btn-primary">Dashboard</a>
{{--        button đến create job--}}
        <a href="{{route('job.create')}}" class="btn btn-primary">Create Job</a>
        {{--    button đến đăng ký tim--}}
        <a href="{{route('create.tim')}}" class="btn btn-primary">Đăng Ký Tim</a>
        {{--    button đến đăng ký employer--}}
         <a href="{{route('create.employer')}}" class="btn btn-primary">Đăng Ký Employer</a>
          {{--    button đến plan--}}
        <a href="{{route('subscribe')}}" class="btn btn-primary">Plan</a>
    </div>
@endsection
