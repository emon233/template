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
                        @can('viewAny', \App\Models\Role::class)
                        <a href="{{ route('system.roles.index') }}" class="btn btn-list btn-sm"></a>
                        @endcan

                        @can('update', $role)
                        <a href="{{ route('system.roles.edit', $role) }}" class="btn btn-edit btn-sm"></a>
                        @endcan

                        @can('viewAny', \App\Models\AccessRole::class)
                        <a href="{{ route('system.roles.accesses.index', $role) }}" class="btn btn-access btn-sm"></a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group row">
                            <label for="title" class="col-12">{{ __('Title') }}</label>
                            <div class="col-12">
                                <input type="text" name="title" id="title" class="form-control" value="{{ $role->title }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="priority" class="col-12">{{ __('Priority Level') }}</label>
                            <div class="col-12">
                                <input type="number" name="priority" id="priority" class="form-control" value="{{ $role->priority }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>{{ __('All Access') }} : <label>{{ $role->all_access ? 'YES':'NO' }}</label></p>
                            </div>
                            <div class="col-12">
                                <p>{{ __('Admin Access') }} : <label>{{ $role->has_admin_access ? 'YES':'NO' }}</label></p>
                            </div>
                            <div class="col-12">
                                <p>{{ __('Default') }} : <label>{{ $role->is_default_role ? 'YES':'NO' }}</label></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('control-bar')

@endsection
