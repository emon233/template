@extends('auth.layouts')

@section('content')

<div class="login-box" style="width:75%;">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{ route('welcome') }}" class="h1">
                <b>{{ SITE_NAME }}</b>
            </a>
        </div>
        <div class="card-body">
            @if (Session::has('notice'))
            <p class="login-box-msg">
                {{ Session::get('notice') }}
            </p>
            <p class="login-box-msg">
                <a href="#" id="resend">{{ __('Resend Verification Email') }}</a>
            </p>
            <form id="form-resend" action="{{ route('verification.send') }}" method="post">
                @csrf
            </form>
            @elseif(Session::has('resend'))
            <p class="login-box-msg">
                {{ Session::get('resend') }}
            </p>
            <p class="login-box-msg">
                <a href="{{ route('verification.notice') }}">{{ __('Reload') }}</a>
            </p>
            @endif
        </div>
    </div>
</div>

@endsection

@section('content-scripts')

<script>
    $(document).ready(function(){
        $('#resend').on('click', function(e) {
            e.preventDefault();
            $('#form-resend').submit();
        })
    })
</script>

@endsection
