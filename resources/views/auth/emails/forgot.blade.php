@component('mail::message')
<p>Hey,</p>
<h2>Welcome {{$user->email}}</h2>
<p>If you  think Reset your Password by clicking the button below.</p>
@component('mail::button',['url' => url('password/reset/'.$user->remember_token)])
Reset Password
@endcomponent
<p>If you have any issus please contact our contact page.</p>
<p>Thanks</p>
{{config('app.name')}}
@endcomponent