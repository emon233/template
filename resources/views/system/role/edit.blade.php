@extends('adminLte.master', ['menu' => 'roles'])

@section('page-title', 'Role Manager')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <div class="card-title">{{ __('Role Info - ') . $role->title }}</div>
                <div class="card-tools">
                    <div class="btn-group">
                        <a href="{{ route('system.roles.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-list"></i>
                        </a>
                        <a href="{{ route('system.roles.show', $role) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('system.roles.update', $role) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group row">
                                <label for="title" class="col-12">{{ __('Title') }}</label>
                                <div class="col-12">
                                    <input type="text" name="title" id="title" class="form-control" value="{{ $role->title }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group row">
                                <label for="priority" class="col-12">{{ __('Priority Level') }}</label>
                                <div class="col-12">
                                    <input type="number" name="priority" id="priority" class="form-control" value="{{ $role->priority }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input custom-control-input-danger" type="checkbox" id="all_access" name="all_access" {{ $role->all_access ? 'checked':'' }}>
                                <label for="all_access" class="custom-control-label">{{ __('Allow All Access') }}</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input custom-control-input-warning" type="checkbox" id="has_admin_access" name="has_admin_access" {{ $role->has_admin_access? 'checked':'' }}>
                                <label for="has_admin_access" class="custom-control-label">{{ __('Allow Admin Access') }}</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input custom-control-input-success" type="checkbox" id="is_default_role"
                                    name="is_default_role" {{ $role->is_default_role ? 'checked':'' }}>
                                <label for="is_default_role" class="custom-control-label">{{ __('Default Role for Registration') }}</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm float-right">
                        {{ __('Update Role') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('control-bar')

@endsection
