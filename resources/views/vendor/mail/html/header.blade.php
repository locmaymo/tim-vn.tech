@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Tim')
<img src="https://raw.githubusercontent.com/locmaymo/tim-vn/1ccc96e1d71b828889a10d40302e4278eb287d98/public/image/logo-tim.png" class="logo" alt="Tim Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
