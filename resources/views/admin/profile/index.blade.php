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
                            <b>{{ __('All Access') }}</b> <a
                                class="float-right">{{ $role->all_access ? 'Yes' : 'No' }}</a>
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
    </div>

@endsection
