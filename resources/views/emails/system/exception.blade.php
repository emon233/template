@component('mail::message')
# {{ __('Exception Occured') }}

{!! $exception !!}

@component('mail::button', ['url' => route('system.logs')])
System Log
@endcomponent

Thanks,<br>
{{ SITE_NAME }}
@endcomponent
