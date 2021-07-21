@extends('adminLte.master', ['menu' => 'users'])

@section('page-title', 'User Manager')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <div class="card-title">{{ __('All Users') }}</div>
                <div class="card-tools">
                    <div class="btn-group">
                        @can('create', \App\Models\User::class)
                        <a href="{{ route('admin.users.create') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-plus-square"></i>
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <th>{{ __('#') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email/Phone') }}</th>
                            <th>{{ __('Role') }}</th>
                            <th>{{ __('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>
                                    {{ $user->email }}<br />
                                    {{ $user->phone_no }}
                                </td>
                                <td>{{ $user->role->title }}</td>
                                <td>
                                    <div class="btn-group">
                                        @can('view', $user)
                                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        @endcan
                                        @can('update', $user)
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-success btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $users->onEachSide(1)->links() !!}
            </div>
        </div>
    </div>
</div>

@endsection

@section('control-bar')

@endsection
