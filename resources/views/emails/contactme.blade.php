@component('mail::message')

{{$user->email}},<br>
Ваш покупка успешно оплачена!

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
