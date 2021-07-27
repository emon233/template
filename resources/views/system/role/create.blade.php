@extends('adminLte.master', ['menu' => 'roles'])

@section('page-title', 'Role Manager')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <div class="card-title">{{ __('Create New Role') }}</div>
                <div class="card-tools">
                    <div class="btn-group">
                        @can('create', \App\Models\Role::class)
                        <a href="{{ route('system.roles.index') }}" class="btn btn-list btn-sm"></a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('system.roles.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group row">
                                <label for="title" class="col-12">{{ __('Title') }}</label>
                                <div class="col-12">
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title') ?? '' }}">
                                    @error('title')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group row">
                                <label for="priority" class="col-12">{{ __('Priority Level') }}</label>
                                <div class="col-12">
                                    <input type="number" name="priority" id="priority" class="form-control @error('priority') is-invalid @enderror"
                                        min="{{ ROLE_PRIORITY_MIN }}" max="{{ ROLE_PRIORITY_MAX }}"
                                        value="{{ old('priority') ?? ROLE_PRIORITY_MIN }}">
                                    @error('priority')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input custom-control-input-danger" type="checkbox"
                                    id="all_access" name="all_access">
                                <label for="all_access"
                                    class="custom-control-label">{{ __('Allow All Access') }}</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input custom-control-input-warning" type="checkbox"
                                    id="has_admin_access" name="has_admin_access">
                                <label for="has_admin_access"
                                    class="custom-control-label">{{ __('Allow Admin Access') }}</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input custom-control-input-success" type="checkbox"
                                    id="is_default_role" name="is_default_role">
                                <label for="is_default_role"
                                    class="custom-control-label">{{ __('Default Role for Registration') }}</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-save btn-sm float-right">
                        {{ __('Save Role') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('control-bar')

@endsection
