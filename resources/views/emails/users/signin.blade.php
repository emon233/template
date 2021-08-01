@component('mail::message')
# Signin Detected

# {{ $user }}

@component('mail::button', ['url' => route('welcome')])
Visit
@endcomponent

Thanks,<br>
{{ SITE_NAME }}
@endcomponent
