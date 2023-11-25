<x-mail::message>
# Chúc Mừng! Bạn đã là thành viên của chúng tôi.

<p>Thanh toán của bạn:</p>
<p>Gói thành viên:
    @if($plan == 'monthly')
        <b>Gói tháng</b>
    @elseif($plan == 'yearly')
        <b>Gói năm</b>
        <br>Ngày hết hạn: <b>{{ $billingEnds->format('d-m-Y') }}</b></p>
    @endif
<x-mail::button :url="'https://tim-vn.tech/dashboard'">
Truy cập bảng điều khiển
</x-mail::button>

Trân trọng,<br>
{{ config('app.name') }}
</x-mail::message>
{{----}}
