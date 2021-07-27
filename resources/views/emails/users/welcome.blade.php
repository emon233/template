@component('mail::message')
# Welcome

Welcome to ## {{ SITE_NAME }} ##.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
