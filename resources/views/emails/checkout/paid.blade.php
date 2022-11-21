@component('mail::message')
# Your Transaction Has Been Confrimed.

Hi, {{ $checkout->User->name }}
<br />

Your Transaction Has Been Confrimed, Now You Can Enjoy Benefits Of <b>{{ $checkout->Camp->title }}</b> camp.

@component('mail::button', ['url' => route('user.dashboard')])
My Dashboard
@endcomponent

Thanks,<br>
Admin {{ config('app.name') }}.
@endcomponent
