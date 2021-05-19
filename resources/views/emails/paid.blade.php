@component('mail::message')

{{$order->customer->surname.' '.$order->customer->name.' '.$order->customer->patronymic}},<br>
Ваш покупка успешно оплачена!

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
