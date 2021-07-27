@extends('adminLte.master', ['menu' => 'users'])

@section('page-title', 'User Manager')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <div class="card-title">{{ __('Update User Data - ') . $user->full_name }}</div>
                <div class="card-tools">
                    <div class="btn-group">
                        @can('viewAny', \App\Models\User::class)
                        <a href="{{ route('admin.users.index') }}" class="btn btn-list btn-sm"></a>
                        @endcan
                        @can('create', \App\Models\User::class)
                        <a href="{{ route('admin.users.create') }}" class="btn btn-new btn-sm"></a>
                        @endcan
                        @can('view', $user)
                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-show btn-sm"></a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.update', $user) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group row">
                                <label for="first_name" class="col-12">{{ __('validation.attributes.first_name') }}</label>
                                <div class="col-12">
                                    <input type="text" name="first_name" id="first_name"
                                        class="form-control @error('first_name') is-invalid @enderror"
                                        value="{{ old('first_name') ?? $user->first_name ?? '' }}" required />
                                    @error('first_name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group row">
                                <label for="last_name" class="col-12">{{ __('validation.attributes.last_name') }}</label>
                                <div class="col-12">
                                    <input type="text" name="last_name" id="last_name"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        value="{{ old('last_name') ?? $user->last_name ?? '' }}" required />
                                    @error('last_name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group row">
                                <label for="email" class="col-12">{{ __('validation.attributes.email') }}</label>
                                <div class="col-12">
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $user->email ?? '' }}"
                                        required />
                                    @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group row">
                                <label for="phone_no" class="col-12">{{ __('validation.attributes.phone_no') }}</label>
                                <div class="col-12">
                                    <input type="text" name="phone_no" id="phone_no"
                                        class="form-control @error('phone_no') is-invalid @enderror"
                                        value="{{ old('phone_no') ?? $user->phone_no ?? '' }}" />
                                    @error('phone_no')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group row">
                                <label for="role_id" class="col-12">{{ __('validation.attributes.role_id') }}</label>
                                <div class="col-12">
                                    <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                        <option value="" disabled>{{ __('Select Any') }}</option>
                                        @foreach (getRolesOnUser() as $role)
                                        <option value="{{ $role->id }}" @if(old('role_id') == $role->id || $user->role_id == $role->id) selected
                                            @endif>{{ $role->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group row">
                                <label for="password" class="col-12">{{ __('validation.attributes.password') }}</label>
                                <div class="col-12">
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" value="{{ old('password') ?? '' }}" />
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
                                <label for="c_password" class="col-12">{{ __('validation.attributes.c_password') }}</label>
                                <div class="col-12">
                                    <input type="password" name="c_password" id="c_password"
                                        class="form-control @error('c_password') is-invalid @enderror" />
                                    @error('c_password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-save btn-sm float-right">
                        {{ __('Save User') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('control-bar')

@endsection
