@extends('adminLte.master', ['menu' => 'profile'])

@section('page-title', 'Profile')

@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ auth()->user()->image_path }}"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ auth()->user()->full_name }}</h3>

                <?php
                    $role = auth()->user()->role;
                    ?>
                <p class="text-muted text-center">{{ $role->title }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>{{ __('All Access') }}</b> <a class="float-right">{{ $role->all_access ? 'Yes' : 'No' }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>{{ __('Admin Access') }}</b> <a
                            class="float-right">{{ $role->has_admin_access ? 'Yes' : 'No' }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>{{ __('Mates') }}</b> <a class="float-right">{{ count($role->users) - 1 }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <form method="post" action="{{ route('admin.profile.update') }}">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="first_name" class="col-12">{{ __('First Name') }}</label>
                                <div class="col-12">
                                    <input type="text" id="first_name" name="first_name"
                                        class="form-control @error('first_name') is-invalid @enderror"
                                        value="{{ old('first_name') ?? (auth()->user()->first_name ?? '') }}"
                                        required />
                                    @error('first_name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-12">{{ __('Last Name') }}</label>
                                <div class="col-12">
                                    <input type="text" id="last_name" name="last_name"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        value="{{ old('last_name') ?? (auth()->user()->last_name ?? '') }}" required />
                                    @error('last_name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm float-right">
                                {{ __('Update Profile') }}
                            </button>
                        </form>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <form method="post" action="{{ route('admin.profile.update.email') }}">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row">
                                        <label for="email" class="col-12">{{ __('Email') }}</label>
                                        <div class="col-12">
                                            <input type="email" id="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') ?? (auth()->user()->email ?? '') }}" required />
                                            @error('email')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning btn-sm float-right">
                                        {{ __('Update Email') }}
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('admin.profile.update.phone') }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row">
                                        <label for="phone_no" class="col-12">{{ __('Phone No') }}</label>
                                        <div class="col-12">
                                            <input type="text" name="phone_no" id="phone_no"
                                                class="form-control @error('phone_no') is-invalid @enderror"
                                                value="{{ old('phone_no') ?? auth()->user()->phone_no ?? '' }}">
                                            @error('phone_no')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning btn-sm float-right">
                                        {{ __('Update Phone No') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <form action="{{ route('admin.profile.update.password') }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group row">
                                        <label for="password" class="col-12">{{ __('New Password') }}</label>
                                        <div class="col-12">
                                            <input type="password" id="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                value="{{ old('password') }}" required />
                                            @error('password')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group row">
                                        <label for="c_password" class="col-12">{{ __('Confirm New Password') }}</label>
                                        <div class="col-12">
                                            <input type="password" id="c_password" name="c_password"
                                                class="form-control @error('c_password') is-invalid @enderror"
                                                required />
                                            @error('c_password')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger btn-sm float-right">
                                {{ __('Update Password') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
