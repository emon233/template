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
            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success btn-sm float-right">
                    {{ __('Request Link') }}
                </button>
            </form>
            <br>
            <br>
            <p class="login-box-msg">
                <a href="{{ route('signin') }}" class="text-center">
                    <i class="fas fa-sign-in-alt"></i> {{ __('Account Signin') }}
                </a>
            </p>
        </div>
    </div>
</div>

@endsection
