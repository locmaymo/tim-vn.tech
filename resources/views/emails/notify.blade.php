<x-mail::message>
# Chúc Mừng! Bạn đã là thành viên của chúng tôi.

<p>Thanh toán của bạn:</p>
<p>Gói thành viên: {{ $plan }} <br>Ngày hết hạn: {{ $billingEnds }}</p>

<x-mail::button :url="'https://tim-vn.tech/dashboard'">
Truy cập bảng điều khiển
</x-mail::button>

Trân trọng,<br>
{{ config('app.name') }}
</x-mail::message>
{{----}}