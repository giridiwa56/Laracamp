@component('mail::message')
# Register Camp : {{ $checkout->Camp->title }}

Hi, {{ $checkout->User->name }}

Thank You for registering on <b>{{ $checkout->Camp->tile }}</b>, please see the payment instructions by click the button below.


@component('mail::button', ['url' => route('dashboard')])
My Dashboard
@endcomponent

Thanks,<br>
Admin {{ config('app.name') }}
@endcomponent
