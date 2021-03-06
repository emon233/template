@extends('adminLte.master', ['menu' => 'roles'])

@section('page-title', 'Role Manager')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <div class="card-title">{{ __('All Roles') }}</div>

                <div class="card-tools">
                    @can('create', \App\Models\Role::class)
                    <a href="{{ route('system.roles.create') }}" class="btn btn-new btn-sm"></a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <th>{{ __('#') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Priority') }}</th>
                            <th>{{ __('Access') }}</th>
                            <th>{{ __('Users') }}</th>
                            <th>{{ __('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->title }}</td>
                                <td>{{ $role->priority }}</td>
                                <td>
                                    @if ($role->all_access)
                                        <label>{{ __('All Access') }}</label>
                                    @elseif ($role->has_admin_access)
                                        <label>{{ __('Admin Access') }}</label>
                                    @else
                                        <label>{{ __('No Access') }}</label>
                                    @endif

                                    @if ($role->is_default_role)
                                        <br />
                                        <label>{{ __('Default Role') }}</label>
                                    @endif
                                </td>
                                <td>{{ count($role->users) }}</td>
                                <td>
                                    <div class="btn-group">
                                        @can('view', $role)
                                        <a href="{{ route('system.roles.show', $role) }}" class="btn btn-show btn-sm"></a>
                                        @endcan

                                        @can('update', $role)
                                        <a href="{{ route('system.roles.edit', $role) }}" class="btn btn-edit btn-sm"></a>
                                        @endcan

                                        @can('viewAny', \App\Models\AccessRole::class)
                                        <a href="{{ route('system.roles.accesses.index', $role) }}" class="btn btn-access btn-sm"></a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('control-bar')

@endsection
