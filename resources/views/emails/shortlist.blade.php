<x-mail::message>

    # Chúc mừng, {{$name}}! <br>

   <p>Bạn đã được công ty <b>{{$company_name}}</b> chọn vào danh sách tiếp tục của bài tuyển dụng <b>{{ $title }}</b> trên Tim-vn.tech <br>
       <br>
    Hãy liên hệ với nhà tuyển dụng của <b>{{$company_name}}</b> có email liên hệ là <b>{{$company_email}} </b>để chuẩn bị cho các bước tiếp theo.</p>

<p>Trân trọng,</p>
{{ config('app.name') }}
</x-mail::message>
