@extends('auth.layouts')


@section('content')

<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{ route('welcome') }}" class="h1">
                <b>{{ SITE_NAME }}</b>
            </a>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @elseif(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
            @endif
            <p class="login-box-msg">
                <a href="{{ route('signin') }}" class="text-center">{{ __('Signin') }}</a>
            </p>
        </div>
    </div>
</div>

@endsection
