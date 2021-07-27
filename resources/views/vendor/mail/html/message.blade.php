@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => SITE_URL])
{{ SITE_NAME }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ SITE_NAME }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
