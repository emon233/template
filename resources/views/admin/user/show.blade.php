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
                    <div class="col-12 col-md-6 col-lg-4">
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
                                        @if ($user->email_verified_at)
                                        <i class="fas fa-check-circle"></i>
                                        @endif
                                        <b>{{ $user->email }}</b>
                                        @if(!$user->email_verified_at)
                                        <a href="{{ route('admin.users.verify.email', $user) }}" class="verify">{{ __('Verify') }}</a>
                                        @endif
                                    </li>
                                    @endif

                                    @if ($user->phone_no)
                                    <li class="list-group-item">
                                        @if ($user->phone_no_verified_at)
                                        <i class="fas fa-check-circle"></i>
                                        @endif
                                        <b>{{ $user->phone_no }}</b>
                                        @if(!$user->phone_no_verified_at)
                                        <a href="{{ route('admin.users.verify.phone_no', $user) }}" class="verify">{{ __('Verify') }}</a>
                                        @endif
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <form id="form-verify" action="#" method="post">
                        @csrf
                        @method('put')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('control-bar')

@endsection

@section('content-scripts')

<script>
    $(document).ready(function(){
        $('.verify').on('click', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            $('#form-verify').attr('action', url);

            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Verify!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-verify').submit();
                } else {
                    cancelOperation("error", "Operation Canceled");
                }
            })
        })
    })
</script>

@endsection
