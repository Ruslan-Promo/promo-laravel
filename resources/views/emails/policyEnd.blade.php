@component('mail::message')

{{$order->customer->surname.' '.$order->customer->name.' '.$order->customer->patronymic}},<br>
Ваш полис заканчивается {{$order->date_end}}

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
