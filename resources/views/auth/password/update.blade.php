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
            <form action="{{ route('password.update') }}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" value="{{ old('password') }}"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="c_password" name="c_password"
                        class="form-control @error('c_password') is-invalid @enderror" placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('c_password')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success btn-sm float-right">
                    {{ __('Request Password') }}
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
