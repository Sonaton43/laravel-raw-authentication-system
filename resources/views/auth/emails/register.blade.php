@component('mail::message')
Hey, welcome to Mailtrap! 

<h2>Welcome {{$user->email}}</h2>
<p>Thank you for signing up for Mailtrap.</p>
<p>Verify your email address by clicking the button below.</p>
@component('mail::button',['url' => url('mailcheck/'.$user->remember_token)])
Verify
@endcomponent
<p>Thanks</p>
{{config('app.name')}}
@endcomponent