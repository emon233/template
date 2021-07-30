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
                        <a href="{{ route('admin.users.create') }}" class="btn btn-new btn-sm"></a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.index') }}" method="get">
                    <div class="row filter">
                        <div class="col-12 col-lg-1">
                            <select name="per_page" id="per_page" class="form-control">
                                <?php $paginate = app('request')->has('per_page') ? app('request')->input('per_page') : DEFAULT_PAGINATE; ?>
                                @foreach (paginationNumbers() as $item)
                                <option value="{{ $item }}" @if($paginate == $item) selected @endif>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-lg-7"></div>
                        <div class="col-12 col-lg-4">
                            <div class="input-group mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="{{ __('Keywords') }}"
                                    id="keywords" name="keywords"
                                    value="{{ app('request')->input('keywords') }}"
                                />
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-search" type="button"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
                                    @if($user->email_verified_at)
                                        <i class="fas fa-check-circle"></i>
                                    @endif
                                    {{ $user->email }}<br />
                                    @if($user->phone_no_verified_at)
                                    <i class="fas fa-check-circle"></i>
                                    @endif
                                    {{ $user->phone_no }}
                                </td>
                                <td>{{ $user->role->title }}</td>
                                <td>
                                    <div class="btn-group">
                                        @can('view', $user)
                                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-show btn-sm"></a>
                                        @endcan
                                        @can('update', $user)
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-edit btn-sm"></a>
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
