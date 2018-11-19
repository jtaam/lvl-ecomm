@component('mail::message')
# Introduction

Order has been shipped.
Your order's total price ${{$order->total}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
