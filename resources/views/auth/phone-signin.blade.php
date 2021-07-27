@extends('auth.layouts')

@section('content')

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{ route('welcome') }}" class="h1">
                <b>{{ SITE_NAME }}</b>
            </a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">{{ __('Sign in to start your session') }}</p>

            <form action="{{ route('signin.phone.post') }}" method="post" autocomplete="off">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            {{ __('+880') }}
                        </div>
                    </div>
                    <input type="tel" id="phone_no" name="phone_no" value="{{ old('phone_no') }}"
                        class="form-control @error('phone_no') is-invalid @enderror" placeholder="Phone No">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-mobile-alt"></span>
                        </div>
                    </div>
                    @error('phone_no')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password"
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
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-sm float-right">Signin</button>
                    </div>
                </div>
            </form>
            <p class="mb-0">
                <a href="{{ route('signin') }}" class="text-center">
                    <i class="fas fa-envelope"></i> {{ __('Signin with Email') }}
                </a>
                <br />
                <a href="{{ route('signup') }}" class="text-center">
                    <i class="fas fa-user-plus"></i> {{ __('Register a new membership') }}
                </a>
            </p>
        </div>
    </div>
</div>

@endsection
