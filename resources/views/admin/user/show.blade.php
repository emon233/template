@extends('adminLte.master', ['menu' => 'users'])

@section('page-title', 'User Manager')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <div class="card-title">{{ __('User Info - ') . $user->full_name }}</div>
                <div class="card-tools">
                    <div class="btn-group">
                        @can('viewAny', \App\Models\User::class)
                        <a href="{{ route('admin.users.index') }}" class="btn btn-list btn-sm"></a>
                        @endcan
                        @can('create', \App\Models\User::class)
                        <a href="{{ route('admin.users.create') }}" class="btn btn-new btn-sm"></a>
                        @endcan
                        @can('update', $user)
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-edit btn-sm"></a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ $user->image_path }}"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $user->full_name }}</h3>

                                <p class="text-muted text-center">{{ $user->role->title }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    @if ($user->email)
                                    <li class="list-group-item">
                                        <b>{{ $user->email }}</b>
                                    </li>
                                    @endif

                                    @if ($user->phone_no)
                                    <li class="list-group-item">
                                        <b>{{ $user->phone_no }}</b>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('control-bar')

@endsection
