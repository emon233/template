@component('mail::message')
# {{ __('New User Signup') }}

<table>
    <tr>
        <td>{{ __('First Name') }}</td>
        <td># {{ $user->first_name }}</td>
    </tr>
    <tr>
        <td>{{ __('Last Name') }}</td>
        <td># {{ $user->last_name }}</td>
    </tr>
    <tr>
        <td>{{ __('Email') }}</td>
        <td># {{ $user->email ?? '' }}</td>
    </tr>
    <tr>
        <td>{{ __('Phone No') }}</td>
        <td># {{ $user->phone_no ?? '' }}</td>
    </tr>
    <tr>
        <td>{{ __('Role') }}</td>
        <td># {{ $user->role->title ?? '' }}</td>
    </tr>
</table>

@component('mail::button', ['url' => route('admin.users.show', $user->id)])
User Info
@endcomponent
@component('mail::button', ['url' => SITE_URL_SIGNIN])
Visit Now
@endcomponent

Thanks,<br>
{{ SITE_NAME }}
@endcomponent
