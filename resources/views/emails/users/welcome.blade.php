@component('mail::message')
# Welcome

Welcome to ## {{ SITE_NAME }} ##.

@component('mail::button', ['url' => route('welcome')])
Button Text
@endcomponent

Thanks,<br>
{{ SITE_NAME }}
@endcomponent
