@component('mail::message')
# Welcome

Welcome to ## {{ SITE_NAME }} ##.

@component('mail::button', ['url' => route('welcome')])
Visit
@endcomponent

Thanks,<br>
{{ SITE_NAME }}
@endcomponent
