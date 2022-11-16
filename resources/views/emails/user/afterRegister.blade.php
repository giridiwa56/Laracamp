@component('mail::message')
# Welcome 

Hi {{ $user->name }}
<br/>
<br/>
Selamat Datang Di Laracamps, Terimakasih Telah Membuat Akun di Laracamps Sekarang Kamu bisa langsung
memilih kelas bootcamp yang sesuai dengan Minatmu.

@component('mail::button', ['url' => route('login')])
Login Here
@endcomponent

Terimakasih,<br>
Admin {{ config('app.name') }}
@endcomponent
