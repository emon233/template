@extends('adminLte.master', ['menu' => 'accesses'])

@section('page-title', 'Access Manager')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <div class="card-title">{{ __('All Accesses') }}</div>

                <div class="card-tools">

                    @can('create', \App\Models\Access::class)
                    <a href="{{ route('system.accesses.auto') }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-sync"></i>
                    </a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <th>{{ __('#') }}</th>
                            <th>{{ __('Model Title') }}</th>
                            <th>{{ __('Method Name') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($accesses as $access)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $access->model_name }}</td>
                                <td>{{ $access->method_name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $accesses->onEachSide(1)->links() !!}
            </div>
        </div>
    </div>
</div>

@endsection

@section('control-bar')

@endsection
