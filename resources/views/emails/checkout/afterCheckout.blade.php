@component('mail::message')
# Register Camp : {{ $checkout->Camp->title }}

Hi, {{ $checkout->User->name }}

Thank You for registering on <b>{{ $checkout->Camp->tile }}</b>, please see the payment instructions by click the button below.


@component('mail::button', ['url' => route('user.checkout.invoice', $checkout->id)])
Get Invoice
@endcomponent

Thanks,<br>
Admin Laracamps
@endcomponent
