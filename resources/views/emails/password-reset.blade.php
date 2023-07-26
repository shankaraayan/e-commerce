@component('mail::message')
# Password Reset
Hello {{ $user->name }},
We received a request to reset the password for your account. If you made this request, please click on the following link to reset your password:

@component('mail::button', ['url' => $resetPasswordLink])

Reset
@endcomponent

If you did not request a password reset, no further action is required. The password for your account remains unchanged..

Thanks,<br>
{{ config('app.name') }}
@endcomponent
